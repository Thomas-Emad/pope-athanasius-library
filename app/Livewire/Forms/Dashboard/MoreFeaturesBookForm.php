<?php

namespace App\Livewire\Forms\Dashboard;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BooksExport;
use App\Imports\BooksImport;


class MoreFeaturesBookForm extends Form
{
  #[Validate('required|max:10240|file|mimes:xls,xlm,xla,xlc,xlt,xlw,xlam,xlsb,xlsm,xlsx', 'ملف الاكسيل')]
  public $importExcel;


  public function export()
  {
    return Excel::download(new BooksExport, 'books.xlsx');
  }
  public function import()
  {
    $this->validate();
    Excel::import(new BooksImport, $this->importExcel);
    $this->reset(['importExcel']);
  }
}
