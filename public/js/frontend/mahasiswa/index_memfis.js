let Mahasiswa = {
	init: function () {
		$('.mahasiswa_table').DataTable({
			dom: '<"top"<"toolbar">f>rt<"bottom"pil><"clear">',
			processing: true,
			responsive: true,
			serverSide: true,
         ordering: false,
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
      let add_button = function () {
         $('#simpan').removeClass('edit-mahasiswa')
         $('#simpan').addClass('add-mahasiswa')
         $('#simpan').html('Simpan Baru')
         $('#Mahasiswa_uuid').remove();
         
         $("#mahasiswaForm")[0].reset();
         $('.modal-title').html('Tambah Mahasiswa')

         //option kembali ke default
         $('select[name="jk"] option[value=L]').prop('selected', 'selected');
      }

      // Fungsi ini digunakan untuk mengubah tombol ke tampilan ediyt
      let edit_button = function () {
         $('#simpan').removeClass('add-mahasiswa')
         $('#simpan').addClass('edit-mahasiswa')
         $('#simpan').html('Update')
         $('.modal-title').html('Edit Mahasiswa')

         // $('.modal-body').append('<input type="hidden" name="mahasiswa_uuid" id="mahasiswa_uuid">')
      }
	
		// Menghapus isi inputan 
      let del_error_text = () => {
         $('#nama-error').html('');
         $('#kelas-error').html('');
         $('#alamat-error').html('');
		}

		let mahasiswa_reset = function () {
			del_error_text();

			document.getElementById('mahasiswa_uuid').value = '';
			document.getElementById('nama').value = '';
			document.getElementById('kelas').value = '';
			document.getElementById('alamat').value = '';
		}

		$('#mahasiswaForm').keydown(function (e) {
			if (e.keyCode == 13) {
				e.preventDefault();
				return false;
			}
		});

		$(document).ready(function () {
			$('.btn-success').removeClass('add');
		});


		/**
		 * Menampilkan loading BlockUI
		 */
		let loadingBlock = () => $.blockUI({ 
			message: '<img src="/img/loading.gif"/>',
			css: {
				border: 'none',
				padding: '1px', 
				backgroundColor: '#ffffff', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				// opacity: .5,
			},
		});

		/**
		 * Menghlangkan loading unBlockUI
		 * @params {int} [second = 2000] - time to stay the loading
		 */
		let loadingUnBlock = (second = 2000) => setTimeout(
			$.unblockUI, second
		);

		let add = $('.toolbar').on('click', '.add-mahasiswa', function () {
			mahasiswa_reset();
			add_button();
		});

		let create = $('.modal-footer').on('click', '.add-mahasiswa', function (event) {
			event.stopImmediatePropagation();
			event.preventDefault();
			$.blockUI();

			let MahasiswaFormCreate = $('#mahasiswaForm');
			let formData = new FormData(MahasiswaFormCreate[0]);

			console.log(...formData);

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				url: '/datatables/mahasiswa',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
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
						$('#mahasiswa_modal').modal('hide');

						$('.btn-success').addClass('add');
						$('.btn-success').removeClass('update');

						toast.fire({
							title: 'Tambah mahasiswa berhasil (versi memfis)',
							timer: 3000,
						});

						let table = $('.mahasiswa_table').DataTable();

						table.originalDataSet = [];
						table.ajax.reload(null, false);

						add_button()
					}

				},
				error: function (data, textStatus) {
					$.unblockUI();

					console.log(data);
					console.log(textStatus);
				}
			});
		});

		let edit = $('.mahasiswa_table').on('click', '.edit-mahasiswa', function edit() {
			edit_button();

			let triggerid = $(this).data('uuid');

			let jkOptions = {
            'Laki-laki': 'L',
            'Perempuan': 'P',
         };

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'get',
				url: '/datatables/mahasiswa/' + triggerid + '/edit',
				success: function (data) {
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
					
					$('.btn-success').addClass('update');
					$('.btn-success').removeClass('add');

					console.log(data);
				},
				error: function (data, textStatus) {
					// this are default for ajax errors
					let errorsHtml = '';
					let errors = data.responseJSON;

					$.each(errors.errors, function (index, value) {
						console.log(value);
					});
				}
			});
		});

		let update = $('.modal-footer').on('click', '.update', function (event) {
			event.stopImmediatePropagation();
			$.blockUI();
			
			let mahasiswaFormUpdate = $('#mahasiswaForm');
			let formData = new FormData(mahasiswaFormUpdate[0]);
			formData.append('_method', 'PUT');
			let mahasiswaUuid = $('input[name=mahasiswa_uuid]').val();

			console.log(...formData);
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type        : 'POST',
				url         : '/datatables/mahasiswa/' + mahasiswaUuid,
				data        : formData,
				cache       : false,
				contentType : false,
				processData: false,
				success: function (data, textStatus, jqXhr) {
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
						add_button();
						del_error_text();

						$('#mahasiswa_modal').modal('hide');
						toast.fire({
							title: 'Update mahasiswa berhasil',
							timer: 3000,
						});

						let table = $('.mahasiswa_table').DataTable()

						table.originalDataSet = [];
						table.ajax.reload(null, false);
					}
				},
				error: function (data, textStatus, jqXhr) {
					$.unblockUI();
					
					console.log(data);
				}
			});
		});

		$('.modal-footer').on('click', '.clse', function () {
			add_button();
			mahasiswa_reset();
		});

		let del = $('.mahasiswa_table').on('click', '.delete', function (event) {
			event.stopImmediatePropagation();
			loadingBlock();

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
						beforeSend: function(xhr) {
							loadingUnBlock(4000);
						},
						success: function (data, textStatus) {
                     let table = $('#mahasiswa_table').DataTable();

							setTimeout(() => {
								$.unblockUI,
								toast.fire({
									title: 'Data berhasil dihapus'
								})
							}, 2000);

							table.originalDataSet = []
							table.ajax.reload(null, false)
                  },
						error: function (data, json, errorThrown) {
							loadingUnBlock()
                     console.log(data);
                  }
               });
				}
			});

		});
	}
};



jQuery(document).ready(function () {
	Mahasiswa.init();
});