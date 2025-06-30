<?php

namespace App\Imports;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Section;
use App\Models\SectionShelf;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BooksImport implements ToModel, WithChunkReading, WithStartRow
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    // Skip rows with missing critical data or empty rows
    $code = $this->checkRow($row[9]) . $this->checkRow($row[10]) . $this->checkRow($row[11]);
    if ($this->isNotValidRow($row) || $this->uniqueCode($code)) {
      return null;
    }

    $user = Auth::id();

    // Use pluck to minimize queries
    $authors = Author::pluck('id', 'name')->toArray();
    $publishers = Publisher::pluck('id', 'name')->toArray();
    $sections = Section::pluck('id', 'title')->toArray();
    $shelves = SectionShelf::pluck('id', 'title')->toArray();

    // Handle section creation or lookup
    $section = $this->getSection($row[7], $sections);

    // Return the Book creation model
    return Book::create([
      'user_id'             => $user,
      'code'                => $code,
      'title'               => $this->checkRow($row[0]),
      'author_id'           => $this->getAuthorId($row[1], $authors),
      'series'              => $this->checkRow($row[2]),
      'publisher_id'        => $this->getPublisherId($this->checkRow($row[3]), $publishers),
      'copies'              => $this->checkRow($row[4]) ?? 1,
      'papers'              => $this->checkRow($row[5]) ?? 1,
      'part_number'         => $this->checkRow($row[6]) ?? 1,
      'section_id'          => $section,
      'shelf_id'            => $this->getShelfId($this->checkRow($row[8]), $section, $shelves),
      'current_unit_number' => $this->checkRow($row[9]),
      'row'                 => $this->checkRow($row[10]),
      'position_book'       => $this->checkRow($row[11]),
      'subjects'            => $this->checkRow($row[12]),
      'content'             => $this->checkRow($row[13]),
    ]);
  }


  private function checkRow($row)
  {
    if (isset($row)) {
      return $row;
    }
    return null;
  }

  /**
   * Check if the row contains valid data.
   */
  protected function isNotValidRow(array $row)
  {
    return !isset($row[0]) || !isset($row[9]) || !isset($row[10]) || !isset($row[11]);
  }

  protected function uniqueCode($code)
  {
    return Book::where('code', $code)->exists();
  }

  /**
   * Get the author ID, create if not exists.
   */
  protected function getAuthorId($authorName, &$authors)
  {
    if (isset($authorName)) {
      if (!isset($authors[$authorName])) {
        $author = Author::firstOrCreate(['name' => $authorName]);
        $authors[$authorName] = $author->id;
      }

      return $authors[$authorName];
    }
    return null;
  }

  /**
   * Get the publisher ID, create if not exists.
   */
  protected function getPublisherId($publisherName, &$publishers)
  {
    if (isset($publisherName)) {
      if (!isset($publishers[$publisherName])) {
        $publisher = Publisher::firstOrCreate(['name' => $publisherName]);
        $publishers[$publisherName] = $publisher->id;
      }

      return $publishers[$publisherName];
    }
    return null;
  }

  /**
   * Get the section ID or create a new one.
   */
  protected function getSection($sectionTitle, &$sections)
  {
    if (isset($sectionTitle)) {
      if (!isset($sections[$sectionTitle])) {
        $section = Section::firstOrCreate(['title' => $sectionTitle]);
        $sections[$sectionTitle] = $section->id;
      }

      return $sections[$sectionTitle];
    }
    return null;
  }


  /**
   * Get the shelf ID, create if not exists.
   */
  protected function getShelfId($shelfTitle, $sectionId, &$shelves)
  {
    if (isset($shelfTitle)) {
      if (!isset($shelves[$shelfTitle])) {
        $shelf = SectionShelf::firstOrCreate([
          'title'      => $shelfTitle,
          'section_id' => $sectionId
        ]);
        $shelves[$shelfTitle] = $shelf->id;
      }

      return $shelves[$shelfTitle];
    }
    return null;
  }


  /**
   * The number of rows per chunk
   */
  public function chunkSize(): int
  {
    return 1000;
  }

  /**
   * Define the row where data starts
   */
  public function startRow(): int
  {
    return 2;
  }
}
