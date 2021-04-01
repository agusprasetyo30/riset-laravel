let project = {
   init: function () {
      $('#mahasiswa_table').DataTable({
         'dom': '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
         // 'dom': '<lf<t>ip>',
         processing: true,
         serverSide: true,
         responsive: true,
         lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
         pageLength: 5,
         oLanguage: {
            sLengthMenu: "_MENU_",
         },
         ajax: '/datatables/mahasiswa',
         columns: [
            { data: 'nama', name: 'nama' },
            { data: 'kelas', name: 'kelas', orderable: false, searchable: false},
            { data: 'jk', name: 'jk' },
            { data: 'alamat', name: 'alamat' }
         ]
      });

      $('.dataTables_length').addClass('mr-2');
      $('.dataTables_length select').addClass('form-control');
      $('.dataTables_filter').addClass('text-left ');

      $('.toolbar').html('<a href="#" class="btn btn-sm btn-primary mt-3">Tambah Mahasiswa</a>');
      $('.toolbar').addClass('float-right');

   }
}

jQuery(document).ready(function () {
   project.init();
})