<?php

namespace App\Imports;

use App\Models\Book;
use App\Models\Author;
use App\Models\Section;
use App\Models\Publisher;
use Illuminate\Support\Str;
use App\Models\SectionShelf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BooksImport implements ToCollection, WithChunkReading, WithStartRow, WithBatchInserts
{
  protected $authors = [];
  protected $publishers = [];
  protected $sections = [];
  protected $shelves = [];
  protected $existingCodes = [];
  protected $userId;

  public function __construct()
  {
    $this->userId = Auth::id();

    $this->authors = Author::all()
      ->pluck('id', 'name')
      ->mapWithKeys(fn($id, $name) => [$this->normalize($name) => $id])
      ->toArray();

    $this->publishers = Publisher::all()
      ->pluck('id', 'name')
      ->mapWithKeys(fn($id, $name) => [$this->normalize($name) => $id])
      ->toArray();

    $this->sections = Section::all()
      ->pluck('id', 'title')
      ->mapWithKeys(fn($id, $title) => [$this->normalize($title) => $id])
      ->toArray();

    $this->shelves = SectionShelf::all()
      ->mapWithKeys(fn($shelf) => [
        $this->normalize($shelf->section_id . '_' . $shelf->title) => $shelf->id
      ])
      ->toArray();

    $this->existingCodes = Book::pluck('code')->flip()->toArray();
  }

  public function collection(Collection $rows)
  {
    $insertData = [];

    foreach ($rows as $row) {
      if ($this->isNotValidRow($row)) {
        continue;
      }

      $code = $this->checkRow($row[9]) . $this->checkRow($row[10]) . $this->checkRow($row[11]);

      if (isset($this->existingCodes[$code])) {
        continue;
      }

      $this->existingCodes[$code] = true;

      $sectionId = $this->getSectionId($row[7]);
      $shelfId   = $this->getShelfId($row[8], $sectionId);

      $insertData[] = [
        'uuid'                => Str::uuid(),
        'user_id'             => $this->userId,
        'code'                => $code,
        'title'               => $this->checkRow($row[0]),
        'author_id'           => $this->getAuthorId($row[1]),
        'series'              => $this->checkRow($row[2]),
        'publisher_id'        => $this->getPublisherId($row[3]),
        'copies'              => $this->checkRow($row[4]) ?? 1,
        'papers'              => $this->checkRow($row[5]) ?? 1,
        'part_number'         => $this->checkRow($row[6]) ?? 1,
        'section_id'          => $sectionId,
        'shelf_id'            => $shelfId,
        'current_unit_number' => $this->checkRow($row[9]),
        'row'                 => $this->checkRow($row[10]),
        'position_book'       => $this->checkRow($row[11]),
        'subjects'            => $this->checkRow($row[12]),
        'content'             => $this->checkRow($row[13]),
      ];

      if (count($insertData) >= $this->batchSize()) {
        DB::table('books')->insert($insertData);
        $insertData = [];
      }
    }

    if (!empty($insertData)) {
      DB::table('books')->insert($insertData);
    }
  }


  private function normalize($value)
  {
    return mb_strtolower(trim($value ?? ''));
  }

  private function checkRow($row)
  {
    return isset($row) && trim($row) !== '' ? trim($row) : null;
  }

  protected function isNotValidRow($row)
  {
    return empty($row[0]) || empty($row[9]) || empty($row[10]) || empty($row[11]);
  }

  protected function getAuthorId($name)
  {
    $key = $this->normalize($name);

    if (!$key) return null;

    if (!isset($this->authors[$key])) {
      $author = Author::firstOrCreate(['name' => trim($name)]);
      $this->authors[$key] = $author->id;
    }

    return $this->authors[$key];
  }

  protected function getPublisherId($name)
  {
    $key = $this->normalize($name);

    if (!$key) return null;

    if (!isset($this->publishers[$key])) {
      $publisher = Publisher::firstOrCreate(['name' => trim($name)]);
      $this->publishers[$key] = $publisher->id;
    }

    return $this->publishers[$key];
  }

  protected function getSectionId($title)
  {
    $key = $this->normalize($title);

    if (!$key) return null;

    if (!isset($this->sections[$key])) {
      $section = Section::firstOrCreate(['title' => trim($title)]);
      $this->sections[$key] = $section->id;
    }

    return $this->sections[$key];
  }

  protected function getShelfId($title, $sectionId)
  {
    if (!$title || !$sectionId) return null;

    $key = $this->normalize($sectionId . '_' . $title);

    if (!isset($this->shelves[$key])) {
      $shelf = SectionShelf::firstOrCreate([
        'title'      => trim($title),
        'section_id' => $sectionId,
      ]);

      $this->shelves[$key] = $shelf->id;
    }

    return $this->shelves[$key];
  }

  public function chunkSize(): int
  {
    return 500;
  }

  public function batchSize(): int
  {
    return 500;
  }

  public function startRow(): int
  {
    return 2;
  }
}
