@extends('layouts.admin')

@section('panel')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="h4">Buat Event</div>
		<form method="POST" action={{route('manage.events.store')}} class="needs-validation" novalidate enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-row">
				<div class="form-group col-md-10 {{ $errors->has('title') ? ' has-error' : '' }}">
					<label for="title">Nama event</label>
					<input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required>
					<div class="invalid-feedback">
						@if ($errors->has('title'))
							{{ $errors->first('title') }}
						@else
							Nama event tidak boleh kosong
						@endif
					</div>
				</div>
				<div class="form-group col-md-2{{ $errors->has('capacity') ? ' has-error' : '' }}">
					<label for="capacity">Kapasitas</label>
					<input id="capacity" type="number" class="form-control" name="capacity" value="{{ old('capacity') }}" min=1 required>
					<div class="invalid-feedback">
						@if ($errors->has('capacity'))
							{{ $errors->first('capacity') }}
						@else
							Kapasitas tidak boleh kosong
						@endif
					</div>
				</div>
			</div>
			<div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
				<label for="location">Tempat event</label>
				<input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>
				<div class="invalid-feedback">
					@if ($errors->has('location'))
						{{ $errors->first('location') }}
					@else
						Tempat event tidak boleh kosong
					@endif
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('date') ? ' has-error' : '' }}">
					<label for="date">Tanggal</label>
					<input id="date" type="date" class="form-control is-valid" name="date" value="{{ old('date') }}" required autofocus>
					<div class="invalid-feedback">
						@if ($errors->has('date'))
							{{ $errors->first('date') }}
						@else
							Tanggal event tidak boleh kosong
						@endif
					</div>
				</div>
				<div class="form-group col-md-6 {{ $errors->has('time') ? ' has-error' : ''}}">
					<label for="email">Waktu</label>
					<input id="time" type="time" class="form-control" name="time" value="{{ old('time') }}" required>
					<div class="invalid-feedback">
						@if ($errors->has('time'))
							{{ $errors->first('time') }}
						@else
							Waktu event tidak boleh kosong
						@endif
					</div>
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
				<label class="custom-file-label" for="validatedCustomFile">Foto Event</label>
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

