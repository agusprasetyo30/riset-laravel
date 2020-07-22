<?php

namespace App\Exports;
use App\Todo;

use Maatwebsite\Excel\Concerns\FromCollection;

class TodoReport implements FromCollection {
   
   /**
    * fungsi yang merupakan turunan dari FormCollection
    *
    * @return void
    */
   public function collection()
   {
      return Todo::all();
   }
}