<?php

namespace App\Exports;

use App\Todo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TodoReportQuery implements FromQuery, WithHeadings, WithMapping
{
   // Jika menggunakan custom maka diatur pada bagian construktor
   public function __construct(String $status)
   {
      $this->status = $status;
   }

   // fungsi turunan dari implementari FromQuery
   // Dibuat custom, mencari/import data yang berstatus SHOW
   public function query()
   {
      return Todo::query()->where('status', '=', $this->status);
   }

   // Menentukan data yang akan ditampilkan/diexport pada excel
   public function map($todo) : array
   {
      return [
         $todo->id,
         $todo->todo,
         date('d-M-Y H:i:s', strtotime($todo->created_at))
      ];
   }

   // Menambahkan heading pada excel yang di export
   public function headings() : array
   {
      return [
         '#',
         'Todo',
         'Tanggal Buat'
      ];
   }
}