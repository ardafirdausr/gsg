@extends('layouts.admin')

@section('panel')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="h4">Buat Konten</div>
		<form method="POST" action={{route('manage.contents.store')}} class="needs-validation" novalidate enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('title') ? ' has-error' : '' }}">
					<label for="title">Nama Karya</label>
					<input id="title" type="text" class="form-control is-valid" name="title" value="{{ old('title') }}" required autofocus>
					<div class="invalid-feedback">
						@if ($errors->has('title'))
							{{ $errors->first('title') }}
						@else
							Nama Karya tidak boleh kosong
						@endif
					</div>
				</div>
				<div class="form-group col-md-6 {{ $errors->has('creator') ? ' has-error' : ''}}">
					<label for="email">Pembuat Karya</label>
					<input id="creator" type="text" class="form-control" name="creator" value="{{ old('creator') }}" required>
					<div class="invalid-feedback">
						@if ($errors->has('creator'))
							{{ $errors->first('creator') }}
						@else
							Nama Pembuat tidak boleh kosong
						@endif
					</div>
				</div>
			</div>
			<div class="form-group{{ $errors->has('date_created') ? ' has-error' : '' }}">
				<label for="date_created">Tanggal Pembuatan</label>
				<input id="date_created" type="date" class="form-control" name="date_created" value="{{ old('date_created') }}" required>
				<div class="invalid-feedback">
					@if ($errors->has('date_created'))
						{{ $errors->first('date_created') }}
					@else
						Nama Pembuat tidak boleh kosong
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				<label for="description">Deskripsi Karya</label>
				<textarea id="description" class="form-control" aria-label="With textarea" name="description" required></textarea>
				<div class="invalid-feedback">
					@if ($errors->has('description'))
						{{ $errors->first('description') }}
					@else
						Deskripsi tidak boleh kosong
					@endif
				</div>
			</div>
			<div class="custom-file {{ $errors->has('photo') ? ' has-error' : '' }} mt-md-3">
				<label class="custom-file-label" for="validatedCustomFile">Foto Karya</label>
				<input type="file" class="custom-file-input" id="photo" name="photo" required>
				<div class="invalid-feedback">
					@if ($errors->has('photo'))
						{{ $errors->first('photo') }}
					@else
						Foto tidak boleh kosong
					@endif
				</div>
				<small id="photoHelpBlock" class="form-text text-muted">
						Foto yang yang dipilih berformat .jpg, .png, .jpeg, dengan kapasitas kurang dari 2MB
				</small>
			</div>
			<div class="form-group mt-md-4">
				<button type="submit" class="btn btn-primary col-md-12">
					Simpan
				</button>
			</div>
		</form>
	</div>
</div>
@endsection

