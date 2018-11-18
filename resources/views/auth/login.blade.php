@extends('layouts.app')

@section('content')
<div class="container w-100 h-100 d-flex justify-content-center align-items-center">
	<div class="row w-100 h-100 justify-content-center align-items-center">
		<div class="col-md-6 rounded shadow">
			<div class="my-md-3 ml-md-3 h4 ">Login</div>
			<form class="form-horizontal" method="POST" action="{{ route('login') }} ">
				{{ csrf_field() }}
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">E-Mail Address</label>
						<div class="col-md-12">
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Password</label>
						<div class="col-md-12">
							<input id="password" type="password" class="form-control" name="password" required>
							@if ($errors->has('password'))
								<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>
					</div>
				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
							</label>
						</div>
					</div>
				</div>
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
@endsection
