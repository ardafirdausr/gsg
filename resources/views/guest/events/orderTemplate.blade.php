<div class="container p-md-3">
		<div class="row">
			<div class="col-md-12 mb-md-4">
				<div class="row align-items-center">
					<img src="/assets/GSG-logoText.svg" alt="Galeri Seni Gajayana" width="20%">
					<div class="h3 ml-md-5">Tiket Pertunjukkan</div>
				</div>
			</div>
			<div class="col-md-12">
				<hr class="my-4">
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
				<hr class="my-4">
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
			<div class="col-md-auto">
					<small id="photoHelpBlock" class="form-text text-muted">
						Bawalah tiket ini saat acara dan tunjukkan kartu identitas anda
					</small>
			</div>
		</div>
	</div>