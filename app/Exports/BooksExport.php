<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BooksExport implements FromCollection, WithHeadings, WithMapping
{
  public function collection()
  {
    return Book::with(['author', 'publisher', 'section', 'shelf'])->get();
  }

  public function headings(): array
  {
    return [
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

  public function map($book): array
  {
    return [
      $book->code,
      $book->title,
      $book->author?->name,
      $book->series,
      $book->publisher?->name,
      $book->copies,
      $book->papers,
      $book->part_number,
      $book->section?->title,
      $book->shelf?->title,
      $book->current_unit_number,
      $book->row,
      $book->position_book,
      $book->subjects,
      $book->content,
    ];
  }
}
