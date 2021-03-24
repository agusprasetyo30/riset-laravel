let project = {
   init: function() {
      $('.update').on('click', function () {
         // Get all data
         let matkul_uuid = $('input[name=matkul_uuid]').val();
         let nama = $('input[name=nama]').val();
         let status = $('#status').val();

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'PUT',
            url: '/test/mata-kuliah/' + matkul_uuid,
            data: {
               _token: $('input[name=_token]').val(),
               nama: nama,
               status: status,
            },
            success: function(data){
               if (data.errors) {
                  if (data.errors.nama) {
                     $('#nama-error').html(data.errors.nama[0]);
                  } else {
                     $('#nama-error').html('');
                  }
               
               } else {
                  alert('Edit berhasil');
                  // console.log(data);

                  if (data.uuid) {
                     window.location.href = '/test/mata-kuliah';
                  }
               }
            }
         });
      });
   }
}

jQuery(document).ready(function () {
   project.init();
})