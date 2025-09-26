<?php

namespace App\Imports;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Section;
use App\Models\SectionShelf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Illuminate\Support\Str;

class BooksImport implements ToModel, WithChunkReading, WithStartRow, WithBatchInserts
{
  protected $authors;
  protected $publishers;
  protected $sections;
  protected $shelves;
  protected $userId;

  public function __construct()
  {
    // جلب البيانات مرة واحدة فقط
    $this->authors    = Author::pluck('id', 'name')->toArray();
    $this->publishers = Publisher::pluck('id', 'name')->toArray();
    $this->sections   = Section::pluck('id', 'title')->toArray();
    $this->shelves    = SectionShelf::pluck('id', 'title')->toArray();

    $this->userId = Auth::id();
  }

  public function model(array $row)
  {
    $code = $this->checkRow($row[9]) . $this->checkRow($row[10]) . $this->checkRow($row[11]);

    if ($this->isNotValidRow($row) || $this->uniqueCode($code)) {
      return null;
    }

    $section = $this->getSection($row[7], $this->sections);

    return new Book([
      'uuid'                => Str::uuid(),
      'user_id'             => $this->userId,
      'code'                => $code,
      'title'               => $this->checkRow($row[0]),
      'author_id'           => $this->getAuthorId($row[1], $this->authors),
      'series'              => $this->checkRow($row[2]),
      'publisher_id'        => $this->getPublisherId($this->checkRow($row[3]), $this->publishers),
      'copies'              => $this->checkRow($row[4]) ?? 1,
      'papers'              => $this->checkRow($row[5]) ?? 1,
      'part_number'         => $this->checkRow($row[6]) ?? 1,
      'section_id'          => $section,
      'shelf_id'            => $this->getShelfId($this->checkRow($row[8]), $section, $this->shelves),
      'current_unit_number' => $this->checkRow($row[9]),
      'row'                 => $this->checkRow($row[10]),
      'position_book'       => $this->checkRow($row[11]),
      'subjects'            => $this->checkRow($row[12]),
      'content'             => $this->checkRow($row[13]),
    ]);
  }

  private function checkRow($row)
  {
    return isset($row) ? $row : null;
  }

  protected function isNotValidRow(array $row)
  {
    return !isset($row[0]) || !isset($row[9]) || !isset($row[10]) || !isset($row[11]);
  }

  protected function uniqueCode($code)
  {
    return Book::where('code', $code)->exists();
  }

  protected function getAuthorId($authorName, &$authors)
  {
    if ($authorName) {
      if (!isset($authors[$authorName])) {
        $author = Author::firstOrCreate(['name' => $authorName]);
        $authors[$authorName] = $author->id;
      }
      return $authors[$authorName];
    }
    return null;
  }

  protected function getPublisherId($publisherName, &$publishers)
  {
    if ($publisherName) {
      if (!isset($publishers[$publisherName])) {
        $publisher = Publisher::firstOrCreate(['name' => $publisherName]);
        $publishers[$publisherName] = $publisher->id;
      }
      return $publishers[$publisherName];
    }
    return null;
  }

  protected function getSection($sectionTitle, &$sections)
  {
    if ($sectionTitle) {
      if (!isset($sections[$sectionTitle])) {
        $section = Section::firstOrCreate(['title' => $sectionTitle]);
        $sections[$sectionTitle] = $section->id;
      }
      return $sections[$sectionTitle];
    }
    return null;
  }

  protected function getShelfId($shelfTitle, $sectionId, &$shelves)
  {
    if ($shelfTitle) {
      if (!isset($shelves[$shelfTitle])) {
        $shelf = SectionShelf::firstOrCreate([
          'title'      => $shelfTitle,
          'section_id' => $sectionId,
        ]);
        $shelves[$shelfTitle] = $shelf->id;
      }
      return $shelves[$shelfTitle];
    }
    return null;
  }

  public function chunkSize(): int
  {
    return 100; // أصغر وأكتر أمان
  }

  public function batchSize(): int
  {
    return 100; // يعمل insert جماعي
  }

  public function startRow(): int
  {
    return 2;
  }
}
