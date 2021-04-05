let project = {
   init: function () {
      $('#mahasiswa_table').DataTable({
         'dom': '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
         // 'dom': '<lf<t>ip>',
         processing: true,
         serverSide: true,
         scrollX: true,
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
         $('#simpan').removeClass('btn-warning')
         $('#simpan').addClass('add-mahasiswa')
         $('#simpan').addClass('btn-success')
         $('#simpan').html('Simpan')
      }

      // Fungsi ini digunakan untuk mengubah tombol ke tampilan ediyt
      let edit = function () {
         $('#simpan').removeClass('add-mahasiswa')
         $('#simpan').removeClass('btn-success')
         $('#simpan').addClass('edit-mahasiswa')
         $('#simpan').addClass('btn-warning')
         $('#simpan').html('Update')
      }

      // KEadaan ketika tombol tambah mahasiswa ditekan
      $('#mahasiswa_table_wrapper').on('click', '.add-mahasiswa', function() {
         tambah();
      });

      // Keadaan ketika tombol edit ditekan
      $('#mahasiswa_table_wrapper').on('click', '.edit-mahasiswa', function() {
         edit();
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