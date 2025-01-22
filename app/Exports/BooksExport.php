<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromArray;

class BooksExport implements FromArray
{

  public function array(): array
  {
    $lists = [];
    $books = Book::all();
    $lists[] = $this->titlesRow();
    foreach ($books as $book) {
      $lists[] = [
        $book->code,
        $book->title,
        $book->author->name,
        $book->series,
        $book->publisher->name,
        $book->copies,
        $book->papers,
        $book->part_number,
        $book->section->title,
        $book->shelf->title,
        $book->current_unit_number,
        $book->row,
        $book->position_book,
        $book->subjects,
        $book->content,
      ];
    }
    return $lists;
  }

  private function titlesRow()
  {
    return  [
      'كود الكتاب',
      "أسم الكتاب",
      "المؤلف",
      "أسم السلسلة",
      "أسم الناشر",
      "عدد النسخ",
      "عدد الصفحات",
      "رقم الجزاء",
      "القسم",
      "الرف",
      "الوحده الحاليه",
      "رقم الرف الحالي",
      "الترتيب بالرف",
      "الموضوعات",
      "ملخص الكتاب"
    ];
  }
}
