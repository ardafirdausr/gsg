@extends('layouts.app')

@section('content')
<div class="container my-2">
	<div class="row my-md-5">
		@if(count($events) > 0)
			@foreach($events as $event)
			<div class="col-md-3 my-md-3">
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
					<a
						class="btn btn-primary btn-block"
						role="button"
						href={{route('guest.event', ['id' => $event->id])}}
						>
						Lihat Detail
					</a>
				</div>
			</div>
			@endforeach
		@else
			<div id="card-event-empty">
				Tidak ada event
			</div>
		@endif
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
	#card-event-empty{
		display: block;
		margin: auto;
		height: 100%;
		color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
		font-size: 1.8rem;
		letter-spacing: 2px;
		text-align: center;
		color: #a6a6a6;
	}
</style>
@endsection
