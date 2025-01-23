<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Book, Author, Publisher, Section, SectionShelf};
use Illuminate\Support\Facades\Http;
use Exception;

class SyncTablesService
{
  private $endpoint, $password, $internal_api;
  /**
   * Create a new class instance.
   */
  public function __construct(Request $request)
  {
    $this->authorize($request);
    $this->endpoint = config('app.sync_database.external_api');
    $this->internal_api = config('app.sync_database.internal_api');
    $this->password = config('app.sync_database.password');
  }

  private function authorize(Request $request)
  {
    if ($request->password == $this->password) {
      return true;
    } else {
      return response()->json(['error' => 'Unauthorized'], 403);
    }
  }

  public function sender()
  {
    $books = Book::where('is_synced', false)->get();
    return $this->formatData($books);
  }
  private function formatData($books)
  {
    $lists = [];
    foreach ($books as $book) {
      $list[] = [
        'code' => $book->code,
        'title' => $book->title,
        'author_id' => $book->author_id,
        'author_name' =>  $book->author->name,
        'series' => $book->series,
        'publisher_id' =>  $book->publisher_id,
        'publisher_name' =>  $book->publisher->name,
        'copies' => $book->copies,
        'papers' => $book->papers,
        'part_number' => $book->part_number,
        'section_id' =>  $book->section_id,
        'section_name' =>  $book->section->title,
        'section_number' =>  $book->section->number,
        'shelf_id' =>  $book->shelf_id,
        'shelf_name' =>  $book->shelf->title,
        'shelf_number' =>  $book->shelf->number,
        'shelf_section_id' =>  $book->shelf->section_id,
        'current_unit_number' => $book->current_unit_number,
        'row' => $book->row,
        'position_book' => $book->position_book,
        'content' => $book->content,
        'subjects' => $book->subjects,
      ];
    }
    return $lists;
  }

  public function receiver(Request $request)
  {
    if ($request->url() == $this->endpoint) {
      try {
        $user = Auth::id();

        if (isset($request->books) && is_array($request->books)) {
          foreach ($request->books as $book) {
            $this->store($user, $book);
          }
          $this->feedback('done');
        }
      } catch (Exception $e) {
        $this->feedback('fail');
      }
    }
  }

  public function receiverFeedback(Request $request)
  {
    if ($request->url() == $this->internal_api && $request->status == 'done') {
      Book::where('is_synced', false)->update(['is_synced' => true]);
    }
  }

  private function store($user, $book)
  {
    $getAuthors = Author::pluck('id', 'name')->toArray();
    $getPublishers = Publisher::pluck('id', 'name')->toArray();
    $getSections = Section::pluck('id', 'title')->toArray();
    $getShelfs = SectionShelf::pluck('id', 'title')->toArray();

    $authorId = $getAuthors[$book['author_id']] ?? Author::firstOrCreate(['name' => $book['author_name']])->id;
    $publisherId = $getPublishers[$book['publisher_id']] ?? Publisher::firstOrCreate(['name' => $book['publisher_name']])->id;
    $sectionId = $getSections[$book['section_id']] ?? Section::firstOrCreate(['title' => $book['section_title'], 'number' => $book['section_number']])->id;
    $shelfId = $getShelfs[$book['shelf_id']] ?? SectionShelf::firstOrCreate(['title' => $book['shelf_title'], 'number' => $book['shelf_number'], 'section_id' => $book['shelf_section_id']])->id;

    Book::create([
      'user_id' => $user,
      'code' => $book['code'],
      'title' => $book['title'],
      'author_id' => $authorId,
      'series' => $book['series'],
      'publisher_id' => $publisherId,
      'copies' => $book['copies'],
      'papers' => $book['papers'],
      'part_number' => $book['part_number'],
      'section_id' => $sectionId,
      'shelf_id' => $shelfId,
      'current_unit_number' => $book['current_unit_number'],
      'row' => $book['row'],
      'position_book' => $book['position_book'],
      'content' => $book['content'],
      'subjects' => $book['subjects'],
    ]);
  }

  private function feedback($status)
  {
    Http::post($this->endpoint, [
      'status' => $status,
      'password' => $this->password
    ]);
  }
}
