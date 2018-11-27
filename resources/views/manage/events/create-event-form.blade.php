@extends('layouts.admin')

@section('panel')
<div class="row">
	<div class="col-md-8">
		<div class="h4">Buat Event</div>
		<form method="POST" action={{route('manage.events.store')}} class="needs-validation" novalidate enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-row">
				<div class="form-group col-md-10 {{ $errors->has('title') ? ' was-validated' : '' }}">
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
				<div class="form-group col-md-2{{ $errors->has('capacity') ? ' was-validated' : '' }}">
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
			<div class="form-row">
				<div class="form-group col-md-6 {{ $errors->has('date') ? ' was-validated' : '' }}">
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
				<div class="form-group col-md-6 {{ $errors->has('time') ? ' was-validated' : ''}}">
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
			<div class="form-group{{ $errors->has('description') ? ' was-validated' : '' }}">
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
			<div class="form-group">
				<label for="inputPhoto">Foto Event</label>
				<div id="uploadPhoto">
					<div class="custom-file {{ $errors->has('photo') ? ' was-validated' : '' }} mt-md-3">
						<label  id="filename" class="custom-file-label" for="validatedCustomFile"></label>
						<input type="file" class="custom-file-input" id="photo" name="photo" required>
						<div class="invalid-feedback">
							@if ($errors->has('photo'))
							{{ $errors->first('photo') }}
							@else
							Foto tidak boleh kosong
							@endif
						</div>
						<div id="img-upload-conteiner" class="my-md-3">
							<img id='img-upload'/>
						</div>
						<small id="photoHelpBlock" class="form-text text-muted">
							Foto yang yang dipilih berformat .jpg, .png, .jpeg, dengan kapasitas kurang dari 2MB
						</small>
					</div>
				</div>
			</div>
			<div class="form-group mt-md-4">
				<button type="submit" class="btn btn-primary col-md-12">
					Simpan
				</button>
			</div>
		</form>
	</div>
</div>
<style>
.btn-file {
	position: relative;
	overflow: hidden;
}
.btn-file input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	min-width: 100%;
	min-height: 100%;
	font-size: 100px;
	text-align: right;
	// filter: alpha(opacity=0);
	opacity: 0;
	outline: none;
	background: white;
	cursor: inherit;
	display: block;
}

#img-upload-conteiner{
	width: 100%;
	padding: 5px;
	display: flex;
	justify-content: center;
	align-items: center;
	border: 1px solid #eaeaea;
	min-height: 200px;
}
#img-upload{
		width: 100%;
}
</style>
<script>
function showPreview(input) {
		console.log(input.files);
		if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
						$('#filename').text(input.files[0].name);
						$('#img-upload').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
		}
		else{
			$('#filename').text("");
			$('#img-upload').attr('src', "");
		}
}

$("#photo").on('change', function(){
		showPreview(this);
});
</script>
@endsection

