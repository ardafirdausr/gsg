@extends('layouts.app')

@section('content')
<div class="row no-gutters justify-content-center">
	<div class="col-md-12">
		<div class="jumbotron home-jumbotron">
			<h1 class="display-4">Galeri Seni Gajahyana</h1>
			<p class="lead">Kesenian Topeng dan Tarian khas Kota Malang</p>
			<hr class="my-4" color="#fff">
			<p>Kunjungi galeri topeng dan lihat pertunjukkan tarian khas Malang</p>
			<p class="lead">
				<a class="btn btn-primary " href="#" role="button">Lihat Selengkapnya</a>
			</p>
		</div>
	</div>
	<div class="col-md-10 align-self-center">
		<div class="row my-md-5 justify-content-center">
			<div class="col-md-12 h3">
				Koten Terbaru
			</div>
			@if(count($contents) > 0)
				@foreach($contents as $cotent)
				<div class="col-md-3 my-md-3">
					<div class="card bg-white rounded shadow" style="width: 100%; height: 100%">
						<img class="card-img-top" src={{$cotent->photo}} alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title card-title" id="card-title">{{$cotent->title}}</h5>
							<p class="card-text my-md-2">
								<small class="text-muted">Seniman: {{$cotent->creator}}</small>
							</p>
							<p class="card-text card-description" id="card-description">{{$cotent->description}}</p>
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
				<div id="card-empty">
					Tidak ada Konten
				</div>
			@endif
		</div>
	</div>
	<div class="col-md-12">
		<div id="carouselIndecator" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselIndecator" data-slide-to="0" class="active"></li>
				<li data-target="#carouselIndecator" data-slide-to="1"></li>
				<li data-target="#carouselIndecator" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="/assets/home/cover.jpg" alt="First slide">
					<div class="carousel-caption d-none d-md-block">
						<h5>Test 123 </h5>
						<p>Test 123 </p>
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="/assets/home/cover.jpg" alt="Second slide">
					<div class="carousel-caption d-none d-md-block">
						<h5>Test 123 </h5>
						<p>Test 123 </p>
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="/assets/home/cover.jpg" alt="Third slide">
					<div class="carousel-caption d-none d-md-block">
						<h5>Test 123 </h5>
						<p>Test 123 </p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselIndecator" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselIndecator" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="col-md-10">
		<div class="row my-md-5 justify-content-center">
			<div class="col-md-12 h3">
				Event Terbaru
			</div>
			@if(count($events) > 0)
				@foreach($events as $event)
				<div class="col-md-3 my-md-3">
					<div class="card bg-white rounded shadow" width="100%">
						<img class="card-img-top" src={{$event->photo}} alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title card-title" id="card-title">{{$event->title}}</h5>
							<p class="my-md-3 card-time" id="card-time">
								<small class="text-muted">Tanggal : {{explode(" ", $event->date)[0]}}</small>
								<small class="text-muted">Pukul   : {{substr(explode(" ", $event->date)[1], 0, 5)}}</small>
							</p>
							<p class="card-text card-description" id="card-description">{{$event->description}}</p>
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
				<div id="card-empty">
					Tidak ada event
				</div>
			@endif
		</div>
	</div>
</div>
<script>
	$('.carousel').carousel({
		interval: 4000
	})
</script>
<style>
	.carousel-item {
		height: 450px;
	}
	.carousel-inner{
    height: 450px;
	}
	.carousel-item img {
		height: 450px;
	}
	.home-jumbotron {
		width: 100%;
		height: 450px	;
		position: relative;
		background-repeat: no-repeat;
    background-image: linear-gradient(to right,#777 0%, #777 100%), url('/assets/home/cover.jpg');
    background-blend-mode: multiply;
	}
	.home-jumbotron * {
		color: white;
	}
	.info-jumbotron{
		background-image: url('/assets/home/cover.jpg');
	}
	.info-jumbotron * {
		color: white;
	}
	.card-title{
		overflow: hidden;
		font-size: 1.25rem;
  	text-overflow: ellipsis;
   	display: -webkit-box;
   	-webkit-box-orient: vertical;
   	-webkit-line-clamp: 1;
   	line-height: 1.3rem;
  	max-height: 1.3rem;
	}
	.card-description{
		overflow: hidden;
		font-size: 0.9rem;
  	text-overflow: ellipsis;
   	display: -webkit-box;
   	-webkit-box-orient: vertical;
   	-webkit-line-clamp: 1;
   	line-height: 1rem;
  	max-height: 3rem;
	}
	.card-time *{
		display: block;
	}
	.card-empty{
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