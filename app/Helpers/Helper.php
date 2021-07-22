<?php
   if (!function_exists('numberPagination')) {
      
      
      /**
       * Menampilkan nomer urut dalam tabel pagination
       *
       * @param integer $paginationCount
       * @return void
       */
      function numberPagination(int $paginationCount)
      {
         $number = 1;

         if (request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $paginationCount;
         }

         return $number;
      }

   }
?>