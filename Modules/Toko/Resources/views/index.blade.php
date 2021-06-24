@extends('layouts.template')

@section('title', 'Laravel Module')

@push('css')
	<style>
		
	</style>
@endpush

@section('content')
<div class="container">
	<div class="text-center mt-3">
		<h1>Laravel Modules</h1>
		<small>
			<b style="font-size: 15px">nwidart/laravel-modules</b> adalah senbuah Package Laravel untuk mengelola aplikasi laravel 
			yang lebih besar menggunakan modul yang terpisah. Didalam module memiliki beberapa tampilan (view), pengontrol (controller), dan model.
		</small>
	</div>

	<div class="row justify-content-center mt-3">
		<div class="col-md-3">
			<a href="#" class="text-white text-center text-decoration-none" title="Untuk menampilkan daftar item">
				<div class="card">
					<div class="card-body bg-primary">
						Item
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<a href="{{ route('test.toko.category.index') }}" class="text-white text-center text-decoration-none" title="Untuk menampilkan daftar kategori">
					<div class="card">
						<div class="card-body bg-primary">
							Category
						</div>
					</div>
			</a>
		</div>
	</div>
</div>
@endsection