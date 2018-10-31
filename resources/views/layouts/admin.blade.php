@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row m-md-5">
			<div class="col-md-2">
				<ul class="nav flex-column nav-pills ">
					<li class="nav-item">
						<a class="nav-link active" href={{route('manage.contents.index')}} >
							Konten
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href={{route('manage.events.index')}}>Event</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Chat</a>
					</li>
				</ul>
			</div>
			<div class="col-md-10">
				@yield('panel')
			</div>
		</div>
	</div>
@endsection