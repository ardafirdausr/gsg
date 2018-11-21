@extends('layouts.app')

@section('content')
	<div class="container py-md-3">
		<div class="row my-md-5">
			<div class="col-md-12 my-md-2 rounded">
				<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Pemesanan Tiket Berhasil!</h4>
					<p>Saat menghadiri acara mohon bawa dokumen cetak tiket anda dan tunjukkan kartu identitas Anda</p>
					<hr>
					<p class="mb-0">
						Untuk mencetak tiket anda silahkan tekan tombol
						<a
							class="btn btn-primary btn-sm"
							role="button"
							href={{route('guest.ticket-event-order', ['id' => base64_encode($eventOrder->id)])}}
							>
							Cetak
						</a>
					</p>
				</div>
			</div>
			<div class="col-md-12 rounded shadow p-md-3">
				@include('guest.events.orderTemplate', compact('eventOrder'))
			</div>
		</div>
	</div>
@endsection