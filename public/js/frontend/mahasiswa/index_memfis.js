let Mahasiswa = {
	init: function () {
		$('.mahasiswa_table').DataTable({
			dom: '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
			processing: true,
			responsive: true,
			serverSide: true,
			scrollX: true,
			ajax: "/datatables/mahasiswa",
			lengthMenu: [5, 10, 25, 50, 100],
			pageLength: 5,
			oLanguage: {
            sLengthMenu: "_MENU_",
			},
			language: {
            search: "Search",
            searchPlaceholder: "Nama mahasiswa",
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span>',
         },
			columnDefs: [
				{
					targets: [0, 1, 2, 3, 4],
					"className": "text-center" 
				}
			],
			columns: [
            { data: 'nama', name: 'nama', orderable: true },
            { data: 'kelas', name: 'kelas', searchable: false},
            { data: 'jk', name: 'jk', searchable: false },
            { data: 'alamat', name: 'alamat', searchable: false},
            { data: 'action', name: 'action', orderable: false, searchable: false}
			],
		})

		$(".dataTables_length").addClass("mr-2");
		$(".dataTables_length select").addClass("form-control");
		$('.dataTables_filter').addClass('text-left');
		$('.dataTables_filter input').unbind();
		$('.dataTables_filter input').bind('keyup', function (e) {
         if (e.keyCode == 13) {
            let table = $('.mahasiswa_table').DataTable();
            table.search(this.value).draw();
         }
		});
		
		$('.toolbar').html('<button type="button" id="add-mahasiswa" data-toggle="modal" data-target="#mahasiswa_modal" class="btn btn-sm btn-primary mt-4 float-right add-mahasiswa"> Tambah Mahasiswa</button >');
	
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
		
		$('#mahasiswaForm').keydown(function (e) {
			if (e.keyCode == 13) {
				e.preventDefault();
				return false;
			}
		});

		let create = $('.modal-footer').on('click', '.add-mahasiswa', function (event) {
			event.stopImmediatePropagation();
			$.blockUI();
			// clearValidationError()

			let MahasiswaFormCreate = $('#MahasiswaForm');
			let formData = new FormData(MahasiswaFormCreate[0]);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type        : 'post',
				url         : '/aircraft',
				data        : formData,
				cache       : false,
				contentType : false,
				processData : false,
			});
		});

	}
};

jQuery(document).ready(function () {
	Mahasiswa.init();
});