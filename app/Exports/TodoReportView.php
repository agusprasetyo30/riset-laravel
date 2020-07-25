<?php

namespace App\Exports;

use App\Todo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class TodoReportView implements FromView
{
   use Exportable;

   public function view() : View
   {
      return view('bulk-excel.print-view', [
         'todo_data' => Todo::all()
      ]);
   }
}