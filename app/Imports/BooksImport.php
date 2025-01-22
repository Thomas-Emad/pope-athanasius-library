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
    $user = Auth::id();

    $getAuthors = Author::pluck('id', 'name')->toArray();
    $getPublishers = Publisher::pluck('id', 'name')->toArray();
    $getSections = Section::pluck('id', 'title')->toArray();
    $getShelfs = SectionShelf::pluck('id', 'title')->toArray();

    $section = Section::firstOrCreate(['title' => $row[8]]);
    return new Book([
      'user_id' => $user,
      'code' => $row[0],
      'title' => $row[1],
      'author_id' => $getAuthors[$row[2]] ?? Author::firstOrCreate(['name' => $row[2]])->id,
      'series' => $row[3],
      'publisher_id' => $getPublishers[$row[4]] ?? Publisher::firstOrCreate(['name' => $row[4]])->id,
      'copies' => $row[5],
      'papers' => $row[6],
      'part_number' => $row[7],
      'section_id' => $getSections[$row[8]] ??  $section->id,
      'shelf_id' => $getShelfs[$row[9]] ?? SectionShelf::firstOrCreate(['title' => $row[9], 'section_id' => $section->id])->id,
      'current_unit_number' => $row[10],
      'row' => $row[11],
      'position_book' => $row[12],
      'content' => $row[13],
      'subjects' => $row[14],
    ]);
  }

  public function chunkSize(): int
  {
    return 1000;
  }


  public function startRow(): int
  {
    return 2;
  }
}
