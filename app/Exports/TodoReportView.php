<?php

namespace App\Exports;

use App\Todo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class TodoReportView implements FromView
{
   use Exportable;

   /**
    * Adalah fungsi untuk menentukan tampilan/tabel apa yang akan diexport
    *
    * @return View
    */
   public function view() : View
   {
      $todo_data = Todo::all();

      return view('bulk-excel.print-view', compact('todo_data'));
   }
}