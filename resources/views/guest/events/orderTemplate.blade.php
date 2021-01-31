<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tiket Pertunjukkan</title>
</head>
<body>
	<div class="order-container py-md-3">
		<div class="order-header">
			<div class="title">Tiket Pertunjukkan</div>
		</div>
		<div class="order-body">
			<table>
				<caption>Data Acara</caption>
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
			<hr>
				<table>
				<caption>Data Pengunjung</caption>
				<tbody>
					<tr>
						<th scope="row">ID Pengunjung</th>
						<td>{{$eventOrder->id}}</td>
					</tr>
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
				<small>Bawalah tiket ini saat acara dan tunjukkan kartu identitas anda</small>
		</div>
	</div>
</body>
<style type="text/css" media="all">
	* {
		font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		font-weight:  400px;
	}
	.order-container{
		width: 100%;
		border: 1px solid #2196f3;
	}
	.order-header{
		background-color: #2196f3;
		padding: 20px;
	}
	.title{
		color: #fff;
		font-size: 36px;
		width: 100%;
		text-align: center;
		font-weight: 200;
		letter-spacing: 2px;
	}
	.order-body{
		padding: 20px;
	}
	.order-body table{
		width: 100%;
		margin: 20px;
		/* border-collapse: collapse; */
	}
	.order-body caption{
		font-weight: 500;
		font-size: 18px;
		text-align: left;
		margin-bottom: 20px;
		letter-spacing: 1px;
		color: tomato;
	}
	.order-body tr{
		margin: 5px;
	}
	.order-body td{
		color: #7f7f7f;
	}
	.order-body th{
		width: 40%;
		color: black;
		border-left: 4px solid #2196f3;
	}
	.order-body th, td{
		padding: 10px;
	}
	table tr:nth-child(even) td{
		background-color: #c3fdff;
	}
	table tr:nth-child(odd) td{
		background-color: #bbdefb;
	}
	.order-footer{
		background-color: #2196f3;
		padding: 20px;
		width: 100%;
		padding: 20px;
		color: white;
	}
	.order-footer::before{
		content: 'NB*';
		color: black;
	}
</style>
</html>
