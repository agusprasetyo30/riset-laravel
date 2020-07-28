<?php

namespace App\Imports;

use App\Todo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TodoImports implements ToModel, WithHeadingRow {

   /**
    * fungsi ini adalah turunan dari ToModel
    *
    * @param array $row
    * @return void
    */
   public function model(array $row) 
   {
      return new Todo([
         'todo'   => $row['todo'],
         'status' => $row['status'],
      ]);
   }

}