<?php
   return [
      // Digunakan untuk audit mahasiswa

      'unavailable_audits' => 'No Article Audits available',

      'updated' => [
         'metadata' => 'On ' . date("d-m-Y", strtotime(':audit_created_at')) . ':user_name [:audit_ip_address] updated this record via :audit_url',
         'modified' => [
            'title'  => 'Nama <strong>:audit_tags</strong> dari',
            'nama'   => 'Data <strong>Nama</strong> Dimodifikasi dari <strong>:old</strong> ke <strong>:new</strong>',
            'kelas'  => 'Data <strong>Kelas</strong> Dimodifikasi dari <strong>:old</strong> ke <strong>:new</strong>',
            'jk'     => 'Data <strong>Jenis Kelamin</strong> Dimodifikasi dari <strong>:old</strong> ke <strong>:new</strong>',
            'alamat' => 'Data <strong>Alamat</strong> Dimodifikasi dari <strong>:old</strong> ke <strong>:new</strong>',
            
         ],
      ],
      'created' => [
         'metadata' => 'On ' . date("d-m-Y", strtotime(':audit_created_at')) . ':user_name [:audit_ip_address] updated this record via :audit_url',
         'modified' => [
            'nama'   => 'Menambahkan data mahasiswa <strong>:new</strong>',
            
         ],
      ],
      'deleted' => [
         'metadata' => 'On ' . date("d-m-Y", strtotime(':audit_created_at')) . ':user_name [:audit_ip_address] updated this record via :audit_url',
         'modified' => [
            'nama'  => 'Data dengan Nama <strong>:old</strong> dihapus',
            
         ],
      ]
   ];