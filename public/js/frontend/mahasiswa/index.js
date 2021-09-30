let project = {
   init: function () {
      $('#mahasiswa_table').DataTable({
         'dom': '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
         // 'dom': '<lf<t>ip>',
         processing: true,
         serverSide: true,
         scrollX: true,
         stateSave: true,
         ordering: false,
         lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
         pageLength: 5,
         oLanguage: {
            sLengthMenu: "_MENU_",
         },
         language: {
            search: "Search",
            searchPlaceholder: "Nama mahasiswa",
            // processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading bro...</span> ',
         },
         ajax: '/datatables/mahasiswa',
         columns: [
            { data: 'nama', name: 'nama', orderable: true },
            { data: 'kelas', name: 'kelas', searchable: false},
            { data: 'jk', name: 'jk', searchable: false },
            { data: 'alamat', name: 'alamat', searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false}
         ]
      });

      $('.dataTables_length').addClass('mr-2');
      $('.dataTables_length select').addClass('form-control');
      $('.dataTables_filter').addClass('text-left ');
      $('.dataTables_filter input').unbind();
      $('.dataTables_filter input').bind('keyup', function (e) {
         if (e.keyCode == 13) {
            let table = $('#mahasiswa_table').DataTable();
            table.search(this.value).draw();
         }
      });

      $('.toolbar').html('<button type="button" id="add-mahasiswa" data-toggle="modal" data-target="#mahasiswa_modal" class="btn btn-sm btn-primary mt-4 float-right add-mahasiswa"> Tambah Mahasiswa</button >');
   
      // Fungsi ini digunakan untuk mengubah tombol ke tampilan tambah
      let tambah = function () {
         $('#simpan').removeClass('edit-mahasiswa')
         $('#simpan').addClass('add-mahasiswa')
         $('#simpan').removeClass('update')
         $('#simpan').addClass('add')
         $('#simpan').html('Simpan')
         $('#mahasiswa_uuid').remove();
         
         $("#mahasiswaForm").trigger("reset");

         //option kembali ke default
         $('select[name="jk"] option[value=L]').prop('selected', 'selected');
      }

      // Fungsi ini digunakan untuk mengubah tombol ke tampilan ediyt
      let edit = function () {
         $('#simpan').removeClass('add-mahasiswa')
         $('#simpan').addClass('edit-mahasiswa')
         $('#simpan').removeClass('add')
         $('#simpan').addClass('update')
         $('#simpan').html('Update')

         $('.modal-body').append('<input type="hidden" name="mahasiswa_uuid" id="mahasiswa_uuid">')
      }

      // Menghapus isi inputan 
      let del_error_text = () => {
         $('#nama-error').html('');
         $('#kelas-error').html('');
         $('#alamat-error').html('');
      }

      // Untuk menampilkan dan konfigurasi toast, nantinya ini akan dipisah menjadi file js sendiri
      let toast = Swal.mixin({
         toast             : true,
         icon              : 'success',
         position          : 'top-end',
         timer             : 3000,
         showConfirmButton : false,
         timerProgressBar  : true,
         didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
      })

      // Keadaan ketika tombol tambah mahasiswa ditekan
      $('#mahasiswa_table_wrapper').on('click', '.add-mahasiswa', function() {
         tambah();
         event.preventDefault();

         // Untuk tombol simpan pada modal
         $('.modal-footer').on('click', '.add', (event) => {
            event.preventDefault();
            event.stopImmediatePropagation(); // agar tidak mengeksekusi ajax 2x

            let mahasiswaFormCreate = $('#mahasiswaForm');
            let formData = new FormData(mahasiswaFormCreate[0]);

            // console.log(...formData);
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
               },
               type        : 'POST',
               url         : '/test/mahasiswa',
               data        : formData,
               cache       : false,
               contentType : false,
               processData : false,
               success: function (data, statusCode, jqXhr) {
                  if (data.errors) {
                     if (data.errors.nama) {
                        $('#nama-error').html(data.errors.nama[0]);
                     }
                     if (data.errors.kelas) {
                        $('#kelas-error').html(data.errors.kelas[0]);
                     }
                     if (data.errors.alamat) {
                        $('#alamat-error').html(data.errors.alamat[0]);
                     }
                  
                  } else {
                     console.log(data);
                     if (data.uuid) {
                        $('#mahasiswa_modal').modal('hide');

                        let table = $('#mahasiswa_table').DataTable();

                        table.originalDataSet = [];
                        table.ajax.reload(null, false);
                     }
                  }
               },
               error: function (data, textStatus, jqXhr) {
                  console.log(data);
               },
               complete: function (data) {
                  toast.fire({
                     title: 'Tambah mahasiswa berhasil',
                     timer: 3000,
                  });
                  // return false;

               },
               async:   false,
            });
         });
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
               document.getElementById('mahasiswa_uuid').value = data.uuid;
               document.getElementById('nama').value = data.nama;
               document.getElementById('kelas').value = data.kelas;
               document.getElementById('alamat').value = data.alamat;

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
               
            },
            complete: function (data) {
               toast.fire({
                  title: 'Update mahasiswa berhasil',
                  timer: 3000,
               });

            },
            async:   false,
         });

         // Untuk tombol update pada modal
         $('.modal-footer').on('click', '.update', (event) => {
            let mahasiswaFormCreate = $('#mahasiswaForm');
            let formData = new FormData(mahasiswaFormCreate[0]);
            let uuid_mahasiswa = $('input[name=mahasiswa_uuid]').val();

            formData.append('mahasiswa_uuid', uuid_mahasiswa);
            formData.append('_method', 'PUT');

            // console.log(...formData);

            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type        : 'POST',
               url         : '/test/mahasiswa/' + uuid_mahasiswa,
               data        : formData,
               cache       : false,
               contentType : false,
               processData : false,
               success: function (data) {
                  if (data.errors) {
                     if (data.errors.nama) {
                        $('#nama-error').html(data.errors.nama[0]);
                     }
                     if (data.errors.kelas) {
                        $('#kelas-error').html(data.errors.kelas[0]);
                     }
                     if (data.errors.alamat) {
                        $('#alamat-error').html(data.errors.alamat[0]);
                     }
                  
                  } else {
                     del_error_text();
                     tambah();
                     // location.reload();
                     $('#mahasiswa_modal').modal('hide');

                     console.log(data);
                     // console.log(mahasiswa_uuid);
                     let table = $('#mahasiswa_table').DataTable();

                     table.originalDataSet = [];
                     table.ajax.reload(null, false)
                     // console.log(data);
                  }
               },
               error: function (jqXhr, json, errorThrown) {
                  
               },
               complete: function (data) {
                  toast.fire({
                     title: 'Update mahasiswa berhasil',
                     timer: 3000,
                  });
               },
               async:   false,
            });
         });
      });

      // Untuk tombol hapus pada tabel
      $('#mahasiswa_table_wrapper').on('click', '.delete', function() {

         let mahasiswa_uuid = $(this).data('uuid');

         Swal.fire({
            title: 'Hapus data ini ?',
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Okay',
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  },
                  type: 'DELETE',
                  url: '/datatables/mahasiswa/' + mahasiswa_uuid,
                  success: function (data, textStatus, jqXhr) {
                     toast.fire({
                        title: 'Data berhasil dihapus'
                     })

                     let table = $('#mahasiswa_table').DataTable();

                     table.originalDataSet = [];
                     table.ajax.reload(null, false)
                  },
                  error: function (data, json, errorThrown) {
                     console.log(data);
                  }
               });
            }
         })
      })

      // tombol close
      $('#mahasiswa_modal').on('click', '.clse, .close', function() {
         tambah();

         $("#mahasiswaForm").trigger("reset");

         //option kembali ke default
         $('select[name="jk"] option[value=L]').prop('selected', 'selected');
      });
      
      
   }
}

jQuery(document).ready(function () {
   project.init();
})