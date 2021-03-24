let project = {
   init: function () {
      $('.simpan').on('click', function () {
         event.stopImmediatePropagation();

         let data = new FormData()

         data.append('nama', $('input[name=nama]').val());
         data.append('status', $('#status').val());

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/test/mata-kuliah',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            success: function (data) {
               if (data.errors) {
                  if (data.errors.nama) {
                     $('#nama-error').html(data.errors.nama[0]);
                  } else {
                     $('#nama-error').html('');
                  }

               } else {
                  if (data.uuid) {
                     // console.log(data);
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