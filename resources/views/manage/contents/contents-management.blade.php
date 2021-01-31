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
				@if(count($contents) > 0 )
					@foreach($contents as $idx => $content)
					<div class="media col-md-12 my-md-2" style="animation: slide-up {{$idx * 0.4}}s ease;">
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
							<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-content-{{$content->id}}">
								Hapus
							</button>
							<div class="modal" tabindex="-1" role="dialog" id="modal-content-{{$content->id}}">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Hapus Konten</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p id="modal-text">Apa Anda yakin akan menghapus Konten "{{$content->title}}" ?</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
											<form action={{ route('manage.contents.destroy', ['id' => $content->id, '_method' => 'delete']) }} method="post">
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
						Tidak ada Konten
					</div>
				@endif
			</div>
		</div>
		<div class="col d-flex justify-content-center my-md-3">
				{{ $contents->links() }}
		</div>
	</div>
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