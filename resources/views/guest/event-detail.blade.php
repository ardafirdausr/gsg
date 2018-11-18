@extends('layouts.app')

@section('content')
<div class="container my-md-3">
	<div class="row">
		<div class="col-md-4">
			<img src={{$event->photo}} alt={{$event->title}} width="100%">
		</div>
		<div class="col-md-8">
			<div id="event-title">{{$event->title}}</div>
			<div id="event-time" class="my-md-3 d-md-flex flex-md-row justify-content-between">
				<small class="text-muted">Tanggal : {{explode(" ", $event->date)[0]}}</small>
				<small class="text-muted">Pukul   : {{substr(explode(" ", $event->date)[1], 0, 5)}}</small>
			</div>
			<div id="event-description" class="mb-md-5">{{$event->description}}</div>
			<a
				{{$event->capacity - 1 >= 0 ? "" : "disabled"}}
				class="btn btn-block {{$event->capacity - 1 >= 0 ? "btn-primary " : "disabled btn-warning"}}"
				role="button"
				href={{route('guest.create-event-order', ['id' => $event->id])}}
				>
				{{$event->capacity - 1 >= 0 ? "Pesan Sekarang" : "Kapasitas Penuh"}}
			</a>
		</div>
	</div>
</div>
<style>
#event-title{
	font-size: 30px;
	font-weight: 60;
}
#event-time *{
	font-size: 0.9rem;
}
</style>
@endsection