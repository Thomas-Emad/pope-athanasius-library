<?php

namespace App\Imports;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Section;
use App\Models\SectionShelf;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BooksImport implements ToModel, WithSkipDuplicates, WithChunkReading, WithStartRow
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
    if (!$this->isValidRow($row) || !isset($row[9]) || !isset($row[10]) || !isset($row[11])  || $this->uniqueCode($code)) {
      return null;
    }

    $user = Auth::id();

    // Use pluck to minimize queries
    $authors = Author::pluck('id', 'name')->toArray();
    $publishers = Publisher::pluck('id', 'name')->toArray();
    $sections = Section::pluck('id', 'title')->toArray();
    $shelves = SectionShelf::pluck('id', 'title')->toArray();

    // Handle section creation or lookup
    $section = $this->getSection($row[8], $sections);

    // Return the Book creation model
    return Book::create([
      'user_id'             => $user,
      'code'                => $code,
      'title'               => $this->checkRow($row[0]),
      'author_id'           => $this->getAuthorId($row[1], $authors),
      'series'              => $this->checkRow($row[2]),
      'publisher_id'        => $this->getPublisherId($this->checkRow($row[3]), $publishers),
      'copies'              => $this->checkRow($row[4]),
      'papers'              => $this->checkRow($row[5]),
      'part_number'         => $this->checkRow($row[6]),
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
  protected function isValidRow(array $row)
  {
    return !empty($row[0]) && !empty($row[1]);
  }

  protected function uniqueCode($code)
  {
    return Book::where('code', $code)->exists();
  }

  /**
   * Get the author ID, create if not exists.
   */
  protected function getAuthorId($authorName, $authors)
  {
    return $authors[$authorName] ?? Author::firstOrCreate(['name' => $authorName])->id;
  }

  /**
   * Get the publisher ID, create if not exists.
   */
  protected function getPublisherId($publisherName, $publishers)
  {
    return $publishers[$publisherName] ?? Publisher::firstOrCreate(['name' => $publisherName])->id;
  }

  /**
   * Get the section ID or create a new one.
   */
  protected function getSection($sectionTitle, $sections)
  {
    return $sections[$sectionTitle] ?? Section::firstOrCreate(['title' => $sectionTitle])->id;
  }

  /**
   * Get the shelf ID, create if not exists.
   */
  protected function getShelfId($shelfTitle, $sectionId, $shelves)
  {
    return $shelves[$shelfTitle] ?? SectionShelf::firstOrCreate(['title' => $shelfTitle, 'section_id' => $sectionId])->id;
  }

  /**
   * The number of rows per chunk
   */
  public function chunkSize(): int
  {
    return 1000;
  }

  /**
   * Specify which column should be used to identify duplicates.
   */
  public function uniqueBy()
  {
    return 'code';
  }

  /**
   * Define the row where data starts
   */
  public function startRow(): int
  {
    return 2;
  }
}
