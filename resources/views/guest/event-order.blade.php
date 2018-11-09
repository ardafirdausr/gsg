@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 my-md-2 rounded">
				<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Pemesanan Tiket Berhasil!</h4>
					<p>Saat menghadiri acara mohon bawa dokumen cetak tiket anda dan tunjukkan kartu identitas Anda</p>
					<hr>
					<p class="mb-0">
						Untuk mencetak tiket anda silahkan tekan tombol
						<span class="btn btn-primary btn-sm float-right">Cetak</span>
					</p>
				</div>
			</div>
			<div class="col-md-12 rounded shadow">
				@include('guest.orderTemplate', compact('eventOrder'))
			</div>
		</div>
	</div>
@endsection