<?php

namespace App\Livewire\Forms\Dashboard;

use Livewire\Form;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use App\Actions\ExportCodeBooksPdf;
use Maatwebsite\Excel\Facades\Excel;

class MoreFeaturesBookForm extends Form
{
  /**
   * Multiple Excel files
   */
  public array $importExcel = [];

  public bool $selectAllCodes = false;
  public $from_code;
  public $to_code;

  /**
   * Validation rules (CORRECT way for arrays)
   */
  public function rules(): array
  {
    return [
      'importExcel' => ['required', 'array'],
      'importExcel.*' => [
        'file',
        'max:10240',
        'mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xlsx,csv',
      ],
    ];
  }

  /**
   * Custom attribute names (Arabic)
   */
  protected function validationAttributes(): array
  {
    return [
      'importExcel' => 'ملفات الاكسيل',
      'importExcel.*' => 'ملف الاكسيل',
    ];
  }

  /**
   * Export books to Excel
   */
  public function export()
  {
    return Excel::download(new BooksExport, 'books.xlsx');
  }

  /**
   * Import books from multiple Excel files
   */
  public function import()
  {
    $this->validate();

    foreach ($this->importExcel as $file) {
      $path = $file->store('imports');

      Excel::import(new BooksImport, $path);
    }

    $this->reset('importExcel');
  }

  /**
   * Export book codes as PDF
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
      },
    ]);

    $pdf = (new ExportCodeBooksPdf)->handle(
      $this->selectAllCodes,
      $this->from_code,
      $this->to_code
    );

    $this->reset('from_code', 'to_code');
    $this->resetErrorBag('from_code', 'to_code', 'selectAllCodes');

    return $pdf;
  }
}
