<?php

namespace App\Livewire\Forms\Dashboard;

use Livewire\Form;
use App\Models\Book;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Livewire\Attributes\Validate;
use App\Actions\ExportCodeBooksPdf;
use Maatwebsite\Excel\Facades\Excel;

class MoreFeaturesBookForm extends Form
{
  #[Validate('required|max:10240|file|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xlsx,csv', 'ملف الاكسيل')]
  public $importExcel;
  public $selectAllCodes = false, $from_code, $to_code;

  public function export()
  {
    return Excel::download(new BooksExport, 'books.xlsx');
  }

  /**
   * Validate the import excel file and import the books to the database.
   *
   * After validating the file, it will be stored in the 'imports' directory
   * and then imported to the database using the BooksImport class.
   *
   * After importing, the importExcel property will be reset.
   */
  public function import()
  {
    $this->validate();
    $path = $this->importExcel->store('imports');

    Excel::import(new BooksImport, $path);

    $this->reset(['importExcel']);
  }

  /**
   * Export books codes to PDF.
   *
   * @return \Symfony\Component\HttpFoundation\StreamedResponse
   *
   * @param bool $isSelectAll Whether to select all codes or not.
   * @param int|null $start_from The start of the range.
   * @param int|null $end_to The end of the range.
   */
  public function exportCodesAsPdf()
  {
    $this->validate([
      'from_code' => function ($attr, $value, $fail) {
        if (!$this->selectAllCodes && !$value) {
          $fail('بداية النطاق مطلوب عندما يكون تحديد الكل غير مفعل.');
        }
      },
      'to_code' => function ($attr, $value, $fail) {
        if (!$this->selectAllCodes && !$value) {
          $fail('نهاية النطاق مطلوب عندما يكون تحديد الكل غير مفعل.');
        }
      }
    ]);

    $pdf = (new ExportCodeBooksPdf)->handle($this->selectAllCodes, $this->from_code, $this->to_code);

    $this->reset('from_code', 'to_code');
    $this->resetErrorBag('from_code', 'to_code', 'selectAllCodes');

    return $pdf;
  }
}
