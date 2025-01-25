<?php

namespace App\Services\SyncWebsite;

use Illuminate\Http\Request;
use App\Models\{Book, Author, DeletedBookSyncSkip, Publisher, Section, SectionShelf};
use Illuminate\Support\Facades\Http;
use Exception;
use Illuminate\Support\Facades\Log;

class SyncDatabaseService
{
  private $endpoint;
  private $password;

  public function __construct()
  {
    $this->endpoint = config('app.sync_database.external_api');
    $this->password = config('app.sync_database.password');
  }

  public function authorize($currentHost,  $password)
  {
    if ($this->password == $password && $currentHost ==  $this->endpoint) {
      return false;
    }
    return true;
  }

  public function sync()
  {
    $statusFetch = $this->fetchFromExternal();
    $statusPush = $this->pushToExternal();

    if ($statusFetch['status'] == 'success' && $statusPush['status'] == 'success') {
      return [
        'status' => 'success'
      ];
    } else {
      return [
        'status' => 'fail'
      ];
    }
  }

  private function fetchFromExternal()
  {
    try {
      $response = Http::post("{$this->endpoint}/api/sync/get-from-extrnal", [
        'password' => $this->password,
      ]);
      Log::info($response);
      if ($response->successful()) {
        $books = $response->json('books');
        $syncStatus = $this->processFetchedBooks($books);
        $this->processDeletedBooks($response->json('deleted_books'));
        $this->sendFeedbackToExternal($syncStatus);
      } else {
        Log::error("Fetch Error in method (fetchFromExternal): Failed to fetch books. Status Code: " . $response->status());
      }
      return [
        'status' => 'success'
      ];
    } catch (Exception $e) {
      Log::error("Fetch Error in method (fetchFromExternal): " . $e->getMessage());
      return [
        'status' => 'fail'
      ];
    }
  }

  private function pushToExternal()
  {
    try {
      $books = $this->getUnsyncedBooks();
      $response = Http::post("{$this->endpoint}/api/sync/save-in-extrnal", [
        'password' => $this->password,
        'local_books' => $books,
      ]);

      if ($response->json('status') === 'success') {
        $this->markBooksAsSynced();
      }
      return [
        'status' => 'success'
      ];
    } catch (Exception $e) {
      Log::error("Fetch Error in method (pushToExternal): " . $e->getMessage());
      return [
        'status' => 'fail'
      ];
    }
  }

  public function getFromExtrnal(): array
  {
    return  $this->getUnsyncedBooks();
  }

  private function getUnsyncedBooks(): array
  {
    $books = Book::where('is_synced', false)->get();
    return [
      'status' => 'success',
      'books' => $this->formatBooks($books),
      'deleted_books' => DeletedBookSyncSkip::pluck('uuid')->toArray()
    ];
  }

  public function markBooksAsSynced()
  {
    Book::where('is_synced', false)->update(['is_synced' => true]);
    DeletedBookSyncSkip::query()->delete();
    return [
      'status' => 'success',
    ];
  }

  private function skipDeletedBooks($books)
  {
    $deleteBooks = DeletedBookSyncSkip::pluck('uuid')->toArray();
    return array_filter($books, function ($book) use ($deleteBooks) {
      return !in_array($book, $deleteBooks);
    });
  }

  public function processDeletedBooks($ids)
  {
    Book::whereIn('uuid', $ids)->delete();
  }

  private function formatBooks($books): array
  {
    return $books->map(function ($book) {
      return [
        'uuid' => $book->uuid,
        'user_id' => $book->user_id,
        'code' => $book->code,
        'title' => $book->title,
        'author_id' => $book->author_id,
        'author_name' => $book->author->name,
        'series' => $book->series,
        'publisher_id' => $book->publisher_id,
        'publisher_name' => $book->publisher->name,
        'copies' => $book->copies,
        'papers' => $book->papers,
        'part_number' => $book->part_number,
        'section_id' => $book->section_id,
        'section_title' => $book->section->title,
        'section_number' => $book->section->number,
        'shelf_id' => $book->shelf_id,
        'shelf_title' => $book->shelf->title,
        'shelf_number' => $book->shelf->number,
        'shelf_section_id' => $book->shelf->section_id,
        'current_unit_number' => $book->current_unit_number,
        'row' => $book->row,
        'position_book' => $book->position_book,
        'content' => $book->content,
        'subjects' => $book->subjects,
        'updated_at' => $book->updated_at,
      ];
    })->toArray();
  }

  public function processFetchedBooks(array $books): string
  {
    $books = $this->skipDeletedBooks($books);
    try {
      foreach ($books as $book) {
        $userId = $book['user_id'];
        $this->syncBook($userId, $book);
      }
      return 'success';
    } catch (Exception $e) {
      Log::error("Processing Error: " . $e->getMessage());
      return 'fail';
    }
  }

  private function sendFeedbackToExternal(string $status): void
  {
    try {
      Http::post("{$this->endpoint}/api/sync/feedback", [
        'status' => $status,
        'password' => $this->password,
      ]);
    } catch (Exception $e) {
      Log::error("Feedback Error: " . $e->getMessage());
    }
  }

  private function syncBook(int $userId, array $bookData): void
  {
    $currentBook = Book::where('uuid', $bookData['uuid'])->first();
    $entity = $this->resolveEntityIds($bookData);

    if ($currentBook && $currentBook->updated_at < $bookData['updated_at']) {
      $this->updateBook($currentBook, $userId, $bookData, $entity);
    } elseif (!$currentBook) {
      $this->createBook($userId, $bookData, $entity);
    }
  }

  private function createBook(int $userId, array $bookData, array $entity): void
  {
    Book::create(array_merge($bookData, [
      'uuid' => $bookData['uuid'],
      'user_id' => $userId,
      'author_id' => $entity['authorId'],
      'publisher_id' => $entity['publisherId'],
      'section_id' => $entity['sectionId'],
      'shelf_id' => $entity['shelfId'],
      'is_synced' => true
    ]));
  }

  private function updateBook(Book $currentBook, int $userId, array $bookData, array $entity): void
  {
    $currentBook->update(array_merge($bookData, [
      'user_id' => $userId,
      'author_id' => $entity['authorId'],
      'publisher_id' => $entity['publisherId'],
      'section_id' => $entity['sectionId'],
      'shelf_id' => $entity['shelfId']
    ]));
  }

  private function resolveEntityIds(array $bookData): array
  {
    return [
      'authorId' => $this->syncEntity(Author::class, $bookData['author_name'], 'name'),
      'publisherId' => $this->syncEntity(Publisher::class, $bookData['publisher_name'], 'name'),
      'sectionId' => $this->syncEntity(Section::class, $bookData['section_title'], 'title'),
      'shelfId' => $this->syncEntity(SectionShelf::class, $bookData['shelf_title'], 'title', [
        'number' => $bookData['shelf_number'],
        'section_id' => $bookData['shelf_section_id'],
      ]),
    ];
  }

  private function syncEntity(string $model, string $value, string $field, array $extraAttributes = []): int
  {
    $entity = $model::firstOrNew([$field => $value], $extraAttributes);
    $entity->save();
    return $entity->id;
  }
}
