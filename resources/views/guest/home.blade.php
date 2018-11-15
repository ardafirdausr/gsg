@extends('layouts.app')

@section('content')
<div class="jumbotron home-jumbotron">
	<h1 class="display-4">Galeri Seni Gajahyana</h1>
	<p class="lead">Kesenian Topeng dan Tarian khas Kota Malang</p>
	<hr class="my-4">
	<p>Kunjungi galeri topeng dan lihat pertunjukkan tarian khas Malang</p>
	<p class="lead">
		<a class="btn btn-primary btn-lg" href="#" role="button">Lihat Selengkapnya</a>
	</p>
</div>
<div>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Kunjungi Pertunjukkan </h1>
			<p class="lead">Mbohlah</p>
		</div>
	</div>
</div>
<script>
	Echo.channel('messages')
    .listen('.receiveMessage', (message) => {
        alert(message.message);
	});
</script>
<style>
    .homejumbotron {

        width: 100%;
        height: 100%;
        background-color: black;
        background-image: url('/assets/home/cover.jpg');
        backdrop-filter: brightness(50%);
        background-size: cover;

        & > * {
            color: white;
        }

    }
</style>
@endsection