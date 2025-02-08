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
    if (!$this->isValidRow($row) || $this->uniqueCode($row[0])) {
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
      'user_id' => $user,
      'code' => $row[0],
      'title' => $row[1],
      'author_id' => $this->getAuthorId($row[2], $authors),
      'series' => $row[3],
      'publisher_id' => $this->getPublisherId($row[4], $publishers),
      'copies' => $row[5],
      'papers' => $row[6],
      'part_number' => $row[7],
      'section_id' => $section,
      'shelf_id' => $this->getShelfId($row[9], $section, $shelves),
      'current_unit_number' => $row[10],
      'row' => $row[11],
      'position_book' => $row[12],
      'subjects' => $row[13],
      'content' => $row[14],
    ]);
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
