let project = {
   init: function () {
      $('#mahasiswa_table').DataTable({
         'dom': '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
         // 'dom': '<lf<t>ip>',
         processing: true,
         serverSide: true,
         scrollX: true,
         stateSave: true,
         lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
         pageLength: 5,
         oLanguage: {
            sLengthMenu: "_MENU_",
         },
         language: {
            search: "Search",
            searchPlaceholder: "Nama mahasiswa"
         },
         ajax: '/datatables/mahasiswa',
         columns: [
            { data: 'nama', name: 'nama' },
            { data: 'kelas', name: 'kelas', searchable: false},
            { data: 'jk', name: 'jk', searchable: false },
            { data: 'alamat', name: 'alamat', searchable: false, orderable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false}
         ]
      });

      $('.dataTables_length').addClass('mr-2');
      $('.dataTables_length select').addClass('form-control');
      $('.dataTables_filter').addClass('text-left ');

      $('.toolbar').html('<button type="button" id="add-mahasiswa" data-toggle="modal" data-target="#mahasiswa_modal" class="btn btn-sm btn-primary mt-4 float-right add-mahasiswa"> Tambah Mahasiswa</button >');
   
      // Fungsi ini digunakan untuk mengubah tombol ke tampilan tambah
      let tambah = function () {
         $('#simpan').removeClass('edit-mahasiswa')
         $('#simpan').addClass('add-mahasiswa')
         $('#simpan').html('Simpan')
      }

      // Fungsi ini digunakan untuk mengubah tombol ke tampilan ediyt
      let edit = function () {
         $('#simpan').removeClass('add-mahasiswa')
         $('#simpan').addClass('edit-mahasiswa')
         $('#simpan').html('Update')
      }

      // KEadaan ketika tombol tambah mahasiswa ditekan
      $('#mahasiswa_table_wrapper').on('click', '.add-mahasiswa', function() {
         tambah();
      });

      // Keadaan ketika tombol edit ditekan
      $('#mahasiswa_table_wrapper').on('click', '.edit-mahasiswa', function() {
         edit();

         let jkOptions = {
            'Laki-laki': 'L',
            'Perempuan': 'P',
         };

         let uuid = $(this).data('uuid');

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type  : 'GET',
            url   : '/datatables/mahasiswa/' + uuid + '/edit',
            success: (data) => {
               document.getElementById('nama').value = data.nama;
               document.getElementById('kelas').value = data.kelas;
               document.getElementById('alamat').value = data.alamat;
               document.getElementById('uuid').value = data.uuid;

               $('select[name="jk"]').empty();

               // untuk selected jenis kelamin edit
               $.each(jkOptions, function (index, value) {
                  if (data.jk == value) {
                     $('select[name="jk"]').append(new Option(index, value, true, true));
                     
                  } else {
                     $('select[name="jk"]').append(new Option(index, value));
                  }
               });

               // console.log(data);
            },
            error: (jqXhr, json, errorThrown) => {
               console.log(json);
            }

         });
      });

      // tombol close
      $('#mahasiswa_modal').on('click', '.clse, .close', function() {
         tambah();


      });
   }
}

jQuery(document).ready(function () {
   project.init();
})