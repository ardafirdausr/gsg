@extends('layouts.app')

@section('content')
	@if(auth()->user())
		<div class="container">
			<div class="row my-md-5">
				<div class="col-md-2">
					<ul class="nav flex-column nav-pills ">
						<li class="nav-item">
							<a class="nav-link {{str_contains(Route::currentRouteName(), 'contents') == 1 ? 'active' : ''}}" href={{route('manage.contents.index')}} >
								Konten
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{str_contains(Route::currentRouteName(), 'events') == 1 ? 'active' : ''}}" href={{route('manage.events.index')}}>Event</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{str_contains(Route::currentRouteName(), 'chats') == 1 ? 'active' : ''}}" href="#">Chat</a>
						</li>
					</ul>
				</div>
				<div class="col-md-10 pl-md-5 panel">
					@yield('panel')
				</div>
			</div>
		</div>
		<style>
		.panel{
			border-left: 1px solid #bcbcbc;
		}
		</style>
	@else
		{{redirect()->route('login')}}
	@endif
@endsection