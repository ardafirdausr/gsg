<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tiket Pertunjukkan</title>
</head>
<body>
	<div class="order-container">
		<div class="order-header">
			<div class="row align-items-center">
				<div class="title">Tiket Pertunjukkan</div>
			</div>
		</div>
		<div class="order-body">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<th scope="row">Nama Acara</th>
						<td>{{$eventOrder->event->title}}</td>
					</tr>
					<tr>
						<th scope="row">Tanggal</th>
						<td>{{explode(" ", $eventOrder->event->date)[0]}}</td>
					</tr>
					<tr>
						<th scope="row">Pukul</th>
						<td>{{substr(explode(" ", $eventOrder->event->date)[1], 0, 5)}}</td>
					</tr>
				</tbody>
			</table>
			<table class="table table-borderless">
				<tbody>
					<tr>
						<th scope="row">Nama</th>
						<td>{{$eventOrder->name}}</td>
					</tr>
					<tr>
						<th scope="row">Nomor Identitas</th>
						<td>{{$eventOrder->identity}}</td>
					</tr>
					<tr>
						<th scope="row">Email</th>
						<td>{{$eventOrder->email}}</td>
					</tr>
					<tr>
						<th scope="row">Nomor Telepon</th>
						<td>{{$eventOrder->phone}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="order-footer">
				<small>Nb* Bawalah tiket ini saat acara dan tunjukkan kartu identitas anda</small>
		</div>
	</div>
</body>
<style>
	.order-container{
		widows: 100%;
		height: 100%;
		padding: 24px;
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		align-items: center;
	}
	.order-header{
		align-self: stretch;
		background-color: #64dd17;
		padding: 20px;
	}
	.order-header .title{
		color: #fff;
		font-size: 36px;
		margin: auto;
	}
	.order-body{
		width: 100%;
	}
	.order-footer{
		width: 100%;
	}
</style>
</html>
