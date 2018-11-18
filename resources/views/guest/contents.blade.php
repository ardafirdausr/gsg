@extends('layouts.app')

@section('content')
<div class="container my-2">
	<div class="row my-md-5">
		@if(count($contents) > 0)
			@foreach($contents as $cotent)
			<div class="col-md-3 my-md-3">
				<div class="card bg-white rounded shadow" style="width: 100%; height: 100%">
					<img class="card-img-top" src={{$cotent->photo}} alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" id="card-content-title">{{$cotent->title}}</h5>
						<p class="card-text my-md-2">
							<small class="text-muted">Seniman: {{$cotent->creator}}</small>
						</p>
						<p class="card-text" id="card-content-description">{{$cotent->description}}</p>
					</div>
					<a
						class="btn btn-primary btn-block"
						role="button"
						href={{route('guest.content', ['id' => $cotent->id])}}
						>
						Lihat Detail
					</a>
				</div>
			</div>
			@endforeach
		@else
			<div id="card-content-empty">
				Tidak ada Konten
			</div>
		@endif
	</div>
</div>
<style>
	#card-content-title{
		overflow: hidden;
		font-size: 1.25rem;
  	text-overflow: ellipsis;
   	display: -webkit-box;
   	-webkit-box-orient: vertical;
   	-webkit-line-clamp: 1;
   	line-height: 1.3rem;
  	max-height: 1.3rem;
	}
	#card-content-description{
		overflow: hidden;
		font-size: 0.9rem;
		text-overflow: ellipsis;
   	display: -webkit-box;
   	-webkit-box-orient: vertical;
   	-webkit-line-clamp: 1;
   	line-height: 1rem;
  	max-height: 3rem;
	}
	#card-content-empty{
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
