let project = {
   init: function () {
      let dataTabel = $('#mahasiswa_table').DataTable({
         dom: '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
         // 'dom': '<lf<t>ip>', 
         processing: true,
         serverSide: true,
         scrollX: true,
         // stateSave: true,
         ordering: false,
         lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
         pageLength: 5,
         oLanguage: {
            sLengthMenu: "_MENU_",
         },
         language: {
            search: "Search",
            searchPlaceholder: "Nama mahasiswa",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span>',
         },
         ajax: '/datatables/mahasiswa',
         columns: [
            { data: 'nama', name: 'nama', orderable: true },
            { data: 'kelas', name: 'kelas', searchable: false},
            { data: 'jk', name: 'jk', searchable: false },
            { data: 'alamat', name: 'alamat', searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false}
         ],
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
      $('#mahasiswa_table_wrapper').on('click', '.add-mahasiswa', function(event) {
         tambah();
         event.preventDefault();
         // event.stopImmediatePropagation();

         // Untuk tombol simpan pada modal
         $('.modal-footer').on('click', '.add', (event) => {
            event.preventDefault();
            event.stopImmediatePropagation(); // agar tidak mengeksekusi ajax 2x
            $.blockUI();

            let mahasiswaFormCreate = $('#mahasiswaForm');
            let formData = new FormData(mahasiswaFormCreate[0]);

            // console.log(...formData);
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
               },
               type        : 'POST',
               url         : '/datatables/mahasiswa',
               data        : formData,
               cache       : false,
               contentType : false,
               processData : false,
               success: function (data, statusCode, jqXhr) {
                  $.unblockUI();
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

                        toast.fire({
                           title: 'Tambah mahasiswa berhasil',
                           timer: 3000,
                        });

                        let table = dataTabel;

                        table.originalDataSet = [];
                        table.ajax.reload(null, false);
                     }
                  }
               },
               error: function (data, textStatus) {
                  $.unblockUI();
               },
               complete: function (data) {
                  toast.fire({
                     title: 'Tambah mahasiswa berhasil',
                     timer: 3000,
                  });
                  return false;

               },
               async:   false,
            });
         });
      });

      // Keadaan ketika tombol edit ditekan
      $('#mahasiswa_table_wrapper').on('click', '.edit-mahasiswa', function() {
         edit();
         $.blockUI();

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
               $.unblockUI();

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

               console.log(data);
            },
            error: (jqXhr, json, errorThrown) => {
               $.unblockUI();
            }
         });

         // Untuk tombol update pada modal
         $('.modal-footer').on('click', '.update', (event) => {
            // event.stopImmediatePropagation();
            $.blockUI();
            event.preventDefault();

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
               url         : '/datatables/mahasiswa/' + uuid_mahasiswa,
               data        : formData,
               cache       : false,
               contentType : false,
               processData : false,
               success: function (data, json, errorThrown) {
                  $.unblockUI();

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

                     toast.fire({
                        title: 'Update mahasiswa berhasil',
                        timer: 3000,
                     });
                     
                     // console.log(data);
                     // console.log(mahasiswa_uuid);
                     let table = dataTabel;

                     table.clear()
                     table.originalDataSet = [];
                     table.ajax.reload(null, false)
                  }
               },
               error: function (data, json, errorThrown) {
                  // displayErrors(data, textStatus, jqXhr);
                  $.unblockUI();

                  console.log(data)
               },
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
                  success: function (data, textStatus) {
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