let Project = {
   init: function () {

         $('.simpan').on('click', function(event) {
            event.stopImmediatePropagation();
            // mApp.blockPage();
            // clearValidationError();

            // Get all data from input
            let data = new FormData();
            data.append("nama", $('input[name=nama]').val());
            data.append("kelas", $('input[name=kelas]').val());
            data.append("jk", $('#jk').val());
            data.append("alamat", $('#alamat').val());

            // console.log(...data);
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type: 'POST',
               url: '/test/mahasiswa',
               processData: false,
               contentType: false,
               cache: false,
               data: data,
               success: function(data) {
                  // mApp.unblockPage();
                  if (data.errors) {
                     if (data.errors.nama) {
                        $('#nama-error').html(data.errors.nama[0]);
                     } else {
                        $('#nama-error').html('');
                     }

                     if (data.errors.alamat) {
                        $('#alamat-error').html(data.errors.alamat[0]);
                     } else {
                        $('#alamat-error').html('');
                     }
                  
                  } else {
                     // alert("Tambah mahasiswa berhasil");
                     // console.log(data);
                     
                     if (data.uuid) {
                        window.location.href = '/test/mahasiswa';
                     }
                  }

               },
               statusCode: {
                  419: function(xhr) {
                     window.location.reload();
                  }
               },  
               error: function(jqXhr, json, errorThrown) {
                  // mApp.unblockPage();

                  let errors = jqXhr.responseJSON;
                     if(errors.message){
                           // toastr.error(errors.message, errors.exception, {
                           //    closeButton: true,
                           //    timeOut: 10000
                           // });
                     }else{
                           if(errors.error.message){
                              let error = errors.error;
                              // toastr.error(error.message, error.title, {
                              //    closeButton: true,
                              //    timeOut: 10000
                              // });
                           }else{
                              $.each(errors.error, function(index, value) {
                                 // toastr.error(value.message, value.title, {
                                 //       closeButton: true,
                                 //       timeOut: 10000
                                 // });
                              });
                           }
                     }
               }
            });
         });
      }
   }

   jQuery(document).ready(function() {
      Project.init();
   });