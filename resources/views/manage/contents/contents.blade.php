@extends('layouts.admin')

@section('panel')
	<div class="row justify-content-between">
		<div class="col-md-9 h4"> Konten Galeri Seni Gajahyana	</div>
		<div class="col-md-3">
		  <a href={{route('manage.contents.create')}}>
				<button type="button" class="btn btn-outline-primary btn-sm" >
					<i class="material-icons" style="font-size: 16px; vertical-align: middle">add</i>
					Tambah Konten
				</button>
			</a>
		</div>
		<div class="w-100"></div>
		<div class="col-md-12 mt-5">
			<div class="row no-gutters">
				@foreach($contents as $content)
				<div class="media col-md-12 my-md-2">
						<div class="col-md-4">
								<img class="align-self-center" src={{$content->photo}} width="100%" alt="Gambar {{$content->title}}">
						</div>
						<div class="media-body col-md-6">
							<h5 class="mt-0">{{$content->title}}</h5>
							<div class="d-flex flex-row justify-content-between my-md-2">
								<small class="text-muted float-left"><b class="pr-md-1">Pencipta:</b> {{$content->creator}}</small>
								<small class="text-muted float-right"><b class="pr-md-1">Tanggal Pembuatan: </b>{{date('d M Y', strtotime($content->date_created))}}</small>
							</div>
							<p class="clear-both">{{$content->description}}</p>
						</div>
						<div class="col-md-2">
							<form action={{ route('manage.contents.destroy', ['id' => $content->id, '_method' => 'delete']) }} method="post">
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