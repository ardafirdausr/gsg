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
				@foreach($events as $events)
				<div class="media col-md-12 my-md-2">
					<div class="col-md-2">
							<img class="align-self-center" src={{$events->photo}} width="72" alt="Gambar {{$events->title}}">
					</div>
					<div class="media-body col-md-8">
						<h5 class="mt-0">{{$events->title}}</h5>
						<p>{{$events->description}}</p>
					</div>
					<div class="col-md-2">
						<form action={{ route('manage.events.destroy', ['id' => $events->id, '_method' => 'delete']) }} method="post">
							{{ csrf_field() }}
							<button type="submit" class="btn btn-danger btn-sm">
									Delete
							</button>
						</form>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

@endsection