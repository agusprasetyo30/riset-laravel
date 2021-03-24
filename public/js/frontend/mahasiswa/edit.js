let Project = {
   init: function () {
      $('.simpan').on('click', function (event) {
      
         // Get all data from input
         
         let mahasiswa_uuid = $('input[name=mahasiswa_uuid]').val();
         let nama = $('input[name=nama]').val();
         let kelas = $('input[name=kelas]').val();
         let jk = $('#jk').val();
         let alamat = $('#alamat').val();

         $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'PUT',
            url: '/test/mahasiswa/' + mahasiswa_uuid,
            data: {
               _token: $('input[name=_token').val(),
               nama: nama,
               kelas: kelas,
               jk: jk,
               alamat: alamat,
            },
            success: function (data) {
               if (data.errors) {
                  $.each(data.errors, function (key, value) {
                     alert(key + " " + value);
                  });
               
               } else {
                  alert("Edit berhasil");
                  console.log(data);

                  if (data.uuid) {
                     window.location.href = '/test/mahasiswa';
                  }
               }
            }
         });
      });
   }
}

jQuery(document).ready(function () {
   Project.init();
})