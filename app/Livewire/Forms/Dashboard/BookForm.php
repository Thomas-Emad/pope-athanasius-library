<?php

namespace App\Livewire\Forms\Dashboard;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Form;
use App\Traits\UpdateAttachmentTrait;

class BookForm extends Form
{
  use UpdateAttachmentTrait;

  public $id;
  public $code, $title, $section, $shelf, $series, $publisher, $author, $subjects, $content, $copies, $part_number,
    $papers, $current_unit_number, $row, $position_book, $markup;

  public $photo, $pdf, $oldPhoto, $oldPdf;

  /**
   * Set the form's attributes from the provided book.
   */
  public function setAllAttribute($book)
  {
    $this->id = $book->id;
    $this->code = $book->code;
    $this->title = $book->title;
    $this->section = $book->section_id;
    $this->shelf = $book->shelf_id;
    $this->series = $book->series;
    $this->publisher = $book->publisher_id;
    $this->author = $book->author_id;
    $this->subjects = $book->subjects;
    $this->content = $book->content;
    $this->copies = $book->copies;
    $this->part_number = $book->part_number;
    $this->papers = $book->papers;
    $this->current_unit_number = $book->current_unit_number;
    $this->row = $book->row;
    $this->position_book = $book->position_book;
    $this->oldPhoto = $book->photo;
    $this->oldPdf = $book->pdf;
    $this->markup = $book->markup;
  }

  /**
   * Validation rules for the book form.
   */
  public function rules()
  {
    return [
      'code' => ['unique:books,code,' . $this->id],
      'title' => ['required', 'string', 'min:10', 'max:255'],
      'section' => ['required', 'exists:sections,id'],
      'shelf' => ['required', 'exists:section_shelves,id'],
      'series' => ['nullable', 'string', 'max:100'],
      'publisher' => ['required', 'exists:publishers,id'],
      'author' => ['required', 'exists:authors,id'],
      'subjects' => ['required', 'string', 'min:3'],
      'content' => ['nullable', 'string'],
      'copies' => ['required', 'integer', 'min:1'],
      'part_number' => ['required', 'integer', 'min:1'],
      'papers' => ['required', 'integer', 'min:1'],
      'current_unit_number' => ['required', 'integer', 'min:1'],
      'row' => ['required', 'integer', 'min:1'],
      'position_book' => ['required', 'integer', 'min:1'],
      'photo' => ['nullable', 'image', 'max:2048'],
      'pdf' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
      'markup' => ['boolean'],
    ];
  }

  /**
   * Custom attribute names for validation error messages.
   */
  private function attributeRules()
  {
    return [
      'title' => 'اسم الكتاب',
      'section' => 'اسم القسم',
      'shelf' => 'اسم الرف',
      'series' => 'السلسلة',
      'publisher' => 'الناشر',
      'author' => 'المؤلف',
      'subjects' => 'الموضوعات',
      'copies' => 'عدد النسخ',
      'part_number' => 'رقم الجزء',
      'current_unit_number' => 'رقم الوحدة الحالي',
      'row' => 'رقم الصف',
      'position_book' => 'مكان الكتاب في الصف',
      'photo' => 'صورة الكتاب',
      'pdf' => 'ملف PDF',
      'papers' => 'عدد الصفحات',
    ];
  }

  /**
   * Set the book's code based on the section, row, and position.
   */
  private function setCodeBook()
  {
    $this->code = $this->current_unit_number . $this->row . $this->position_book;
  }

  /**
   * Store the book in the database.
   */
  public function store()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );
    $this->setCodeBook();

    Book::create([
      'code' => $this->code,
      'user_id' => Auth::id(),
      'section_id' => $this->section,
      'shelf_id' => $this->shelf,
      'author_id' => $this->author,
      'publisher_id' => $this->publisher,
      'title' => $this->title,
      'content' => $this->content,
      'subjects' => $this->subjects,
      'series' => $this->series,
      'copies' => $this->copies,
      'papers' => $this->papers,
      'part_number' => $this->part_number,
      'current_unit_number' => $this->current_unit_number,
      'row' => $this->row,
      'position_book' => $this->position_book,
      'photo' => $this->photo ? $this->photo->store('book/photos', 'public') : null,
      'pdf' => $this->pdf ? $this->pdf->store('book/pdfs', 'public') : null,
      'markup' => $this->markup,
    ]);
  }

  /**
   * Update the existing book in the database.
   */
  public function update()
  {
    $this->validate(
      $this->rules(),
      [],
      $this->attributeRules()
    );
    $this->setCodeBook();

    Book::where('id', $this->id)->update([
      'code' => $this->code,
      'user_id' => Auth::id(),
      'section_id' => $this->section,
      'shelf_id' => $this->shelf,
      'author_id' => $this->author,
      'publisher_id' => $this->publisher,
      'title' => $this->title,
      'content' => $this->content,
      'subjects' => $this->subjects,
      'series' => $this->series,
      'copies' => $this->copies,
      'papers' => $this->papers,
      'part_number' => $this->part_number,
      'current_unit_number' => $this->current_unit_number,
      'row' => $this->row,
      'position_book' => $this->position_book,
      'photo' => $this->uploadAttachment($this->oldPhoto, $this->photo, 'book/photos'),
      'pdf' => $this->uploadAttachment($this->oldPdf, $this->pdf, 'book/pdfs'),
      'markup' => $this->markup,
    ]);
  }

  /**
   * Delete All Attachment For this Book, Then Delete it.
   */
  public function destory()
  {
    if (Auth::user()->can('delete_book')) {
      $book = Book::where('id', $this->id)->first();
      if ($book->pdf) {
        $this->deleteAttachment($book->pdf);
      }
      if ($book->photo) {
        $this->deleteAttachment($book->photo);
      }
      $book->delete();
    }
  }

  /**
   * Delete the PDF file of a book.
   */
  public function deletePdf($id)
  {
    $book = Book::where('id', $id)->select('pdf')->first();
    $this->deleteAttachment($book->pdf);
    $book->update([
      'pdf' => null
    ]);
    $this->oldPdf = null;
    $this->pdf = null;
  }


  /**
   * Download the PDF of the book.
   */
  public function downloadPdf()
  {
    return Storage::disk('public')->download($this->oldPdf, $this->title);
  }
}
