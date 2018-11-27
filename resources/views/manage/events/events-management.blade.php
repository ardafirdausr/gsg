@extends('layouts.admin')

@section('panel')
	<div class="row justify-content-between">
		<div class="col-md-9 h4"> Event Galeri Seni Gajahyana	</div>
		<hr class="my-4">
		<div class="col-md-3">
		  <a href={{route('manage.events.create')}}>
				<button type="button" class="btn btn-outline-primary btn-sm" >
					<i class="material-icons" style="font-size: 16px; vertical-align: middle">add</i>
					Tambah Event
				</button>
			</a>
		</div>
		<div class="w-100"></div>
		<div class="col-md-12 mt-5">
			<div class="row no-gutters">
				@if(count($events) > 0)
					@foreach($events as $idx => $event)
					<div class="media col-md-12 my-md-2" id="event-{{$event->id}}" style="animation: slide-up {{$idx * 0.5}}s ease;">
						<div class="col-md-4">
								<img class="align-self-center" src={{$event->photo}} width="100%" alt="Gambar {{$event->title}}">
						</div>
						<div class="media-body col-md-6">
							<h5 class="mt-0">{{$event->title}}</h5>
							<div class="d-flex flex-row justify-content-between my-md-2">
								<small class="text-muted float-right"><b class="pr-md-1">Tanggal Acara: </b>{{date('d M Y', strtotime($event->date_created))}}</small>
								<small class="text-muted float-left"><b class="pr-md-1">Kapasitas:</b> {{$event->capacity}}</small>
							</div>
							<div class="d-flex flex-row justify-content-between my-md-2">
								<small class="text-muted float-right"><b class="pr-md-1">Jam: </b>{{date('H:i', strtotime($event->date_created))}}</small>
							</div>
							<p>{{$event->description}}</p>
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-event-{{$event->id}}">
								Hapus
							</button>
							<div class="modal" tabindex="-1" role="dialog" id="modal-event-{{$event->id}}">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Hapus Event</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p id="modal-text">Apa Anda yakin akan menghapus event "{{$event->title}}" ?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
											<form action={{ route('manage.events.destroy', ['id' => $event->id, '_method' => 'delete']) }} class="need-confirmation" method="post">
												{{ csrf_field() }}
												<button type="submit" class="btn btn-danger">
														Ya
												</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				@else
					<div id="card-content-empty">
						Tidak ada Event
					</div>
				@endif
			</div>
		</div>
		<div class="col d-flex justify-content-center my-md-3">
			{{ $events->links() }}
		</div>
	</div>
	<script>
		// var deleteForms = document.getElementsByClassName('need-confirmation');
		// var validation = Array.prototype.filter.call(deleteForms, function(form) {
		// 	form.addEventListener('submit', function(event) {
		// 		if (form.checkValidity() === false) {
		// 			event.preventDefault();
		// 			event.stopPropagation();
		// 		}
		// 		form.classList.add('was-validated');
		// 	}, false);
		// });
		// function deleteEvent(id){
		// 	$.ajax({
		// 		url: '/manage/events/' + id,
		// 		method: 'POST',
		// 		headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
		// 		data: {
		// 			"_method": 'DELETE'
		// 		},
		// 		success: function(){
		// 			$('#event-' + id).detach();
		// 		},
		// 		error: function(){
		// 			alert();
		// 		}
		// 	});
		// }
	</script>
	<style>
	#card-content-empty{
		display: block;
		margin: auto;
		height: 100%;
		color: #636b6f;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
		font-size: 1.2rem;
		letter-spacing: 1px;
		text-align: center;
		color: #a6a6a6;
	}
	</style>
@endsection