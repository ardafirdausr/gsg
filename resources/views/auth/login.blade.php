@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row w-100 h-100 justify-content-center align-items-center content-container" style="animation: slide-up 0.7s ease;">
		<div class="col-md-4 rounded shadow">
			<div class="my-md-3 ml-md-3 h4 ">Login</div>
			<form class="form-horizontal" method="POST" action="{{ route('login') }} ">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="email" class="col-md-4 control-label">E-Mail Address</label>
					<div class="col-md-12">
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
						@if ($errors->has('email'))
							<div class="invalid-feedback">
								{{ $errors->first('email') }}
							</div>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-md-4 control-label">Password</label>
					<div class="col-md-12">
						<input id="password" type="password" class="form-control" name="password" required>
						@if ($errors->has('password'))
							<div class="invalid-feedback">
									{{ $errors->first('password') }}
							</div>
						@endif
					</div>
				</div>
				{{-- <div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
							</label>
						</div>
					</div>
				</div> --}}
				@if(count($errors) > 0)
					<div class="alert alert-danger alert-dismissible fade show m-md-3" role="alert">
						Email atau Password salah
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				<div class="form-group">
					<div class="col-md-12 col-md-offset-4">
						<button type="submit" class="btn btn-primary btn-block">
							Login
						</button>
						{{-- <a class="btn btn-link" href="{{ route('password.request') }}">
							Forgot Your Password?
						</a> --}}
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	.container: {
		position: relative;
	}
	.content-container{
		position: absolute;
		width: 50%;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
	}
</style>
@endsection
