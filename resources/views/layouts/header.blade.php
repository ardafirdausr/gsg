<nav id="navbar" class="fixed-top navbar navbar-expand-md navbar-light bg-light ">
		<div class="container">
			{{-- Brand --}}
			<a class="navbar-brand" href={{route('guest.home')}}>
				<img src="/assets/GSG-logoText2.svg" width="200px" class="d-inline-block align-top" alt="">
			</a>

			{{-- Collapse Button --}}
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			{{-- Navigation Item --}}
			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" >
				<ul class="navbar-nav">
					@guest
					<li class="nav-item {{ Request::is('/home') ? 'active' : '' }}" >
						<a class="nav-link" href={{ route('guest.home')}}>Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item {{ Request::is('contents') || Request::is('contents/*') ? 'active' : '' }}">
						<a class="nav-link" href={{ route('guest.contents')}}>Konten<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item {{ Request::is('events') || Request::is('events/*') ? 'active' : '' }}">
							<a class="nav-link" href={{ route('guest.events')}}>Event<span class="sr-only">(current)</span></a>
						</li>
					@else
					<li class="nav-item">
						<a class="nav-link" href={{ route('manage.contents.index')}} style="color:#007bff">
							Kelola Halaman<span class="sr-only">(current)</span>
						</a>
					</li>
					<li>
						<a class="nav-link" href={{ route('logout')}} style="color: deeppink" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							Logout
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
						</form>
					</li>
					{{-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{auth()->user()->name}}
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Profil</a>
							<a class="dropdown-item" href="#">Ubah Password</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								Logout
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
							</form>
						</div>
					</li> --}}
					@endguest
				</ul>
			</div>
		</div>
</nav>
<style>
	.nav-item.active{
		background-color: #007bff;
		border-radius: 5px;
	}
	.nav-item.active *{
		color: white !important;
	}
</style>
<script>
	function logout(){
		event.preventDefault();
		window.location()
	}
</script>