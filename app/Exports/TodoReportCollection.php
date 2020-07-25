<?php

namespace App\Exports;
use App\Todo;

use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Untuk laporan dengan ukuran standart/tidak terlalu banyak
 */
class TodoReportCollection implements FromCollection {
   
   /**
    * fungsi yang merupakan turunan dari FormCollection
    * fungsi ini digunakan untuk penggunaaan data yang tidak terlalu banyak
    *
    * @return void
    */
   public function collection()
   {
      return Todo::all();
   }
}