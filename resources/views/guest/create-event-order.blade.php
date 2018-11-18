@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-around">
		<div class="col-md-8 p-md-5 card bg-white rounded shadow">
			<div class="h4 mb-4">Identitas Penonton</div>
			<form method="POST" action={{route('guest.store-event-order', ['id' => $event->id])}} class="needs-validation" novalidate enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-row">
					<div class="form-group col-md-6 {{ $errors->has('name') ? 'was-validated' : '' }}">
						<label for="name">Nama</label>
						<input id="name" type="text" class="form-control is-valid" name="name" value="{{ old('name') }}" required autofocus>
						<div class="invalid-feedback">
							@if ($errors->has('name'))
								{{ $errors->first('name') }}
							@else
								Nama tidak boleh kosong
							@endif
						</div>
					</div>
					<div class="form-group col-md-6 {{ $errors->has('phone') ? 'was-validated' : ''}}">
						<label for="email">Nomor Telepon</label>
						<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
						<div class="invalid-feedback">
							@if ($errors->has('phone'))
								{{ $errors->first('phone') }}
							@else
								Nomor Telepon tidak boleh kosong
							@endif
						</div>
					</div>
				</div>
				<div class="form-group{{ $errors->has('email') ? 'was-validated' : '' }}">
					<label for="email">Email</label>
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
					<div class="invalid-feedback">
						@if ($errors->has('email'))
							{{ $errors->first('email') }}
						@else
							Email tidak boleh kosong
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('identity') ? 'was-validated' : '' }}">
					<label for="identity">Nomor Identitas</label>
					<input id="identity" type="text" class="form-control" name="identity" value="{{ old('identity') }}" required>
					<div class="invalid-feedback">
						@if ($errors->has('identity'))
							{{ $errors->first('identity') }}
						@else
							Nomor Identitas tidak boleh kosong
						@endif
					</div>
				</div>
				<div class="form-group mt-md-4">
					<button
						type="submit"
						{{$event->capacity - 1 >= 0 ? "" : "disabled"}}
						class="btn col-md-12 {{$event->capacity - 1 >= 0 ? "btn-primary" : "disabled btn-warning"}}">
						{{$event->capacity - 1 >= 0 ? "Pesan" : "Kapasitas Penuh"}}
					</button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<div class="card bg-white rounded shadow" width="100%">
				<img class="card-img-top" src={{$event->photo}} alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title" id="card-event-title">{{$event->title}}</h5>
					<p class="my-md-3" id="card-event-time">
						<small class="text-muted">Tanggal : {{explode(" ", $event->date)[0]}}</small>
						<small class="text-muted">Pukul   : {{substr(explode(" ", $event->date)[1], 0, 5)}}</small>
					</p>
					<p class="card-text" id="card-event-description">{{$event->description}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
#card-event-title{
		overflow: hidden;
		font-size: 1.25rem;
  	text-overflow: ellipsis;
   	display: -webkit-box;
   	-webkit-box-orient: vertical;
   	-webkit-line-clamp: 1;
   	line-height: 1.3rem;
  	max-height: 1.3rem;
	}
	#card-event-description{
		overflow: hidden;
		font-size: 0.9rem;
  	text-overflow: ellipsis;
   	display: -webkit-box;
   	-webkit-box-orient: vertical;
   	-webkit-line-clamp: 1;
   	line-height: 1rem;
  	max-height: 3rem;
	}
	#card-event-time *{
		display: block;
	}
</style>
@endsection