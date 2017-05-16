@extends('layout')

@section('content')
<div class="small-12 columns">
	@if (Session::has('notice'))
	&nbsp;
	<div data-alert class="alert-box success">
		{{Session::get('notice')}}
		<a href="#" class="close">&times;</a>
	</div>
	@endif

	@if (Session::has('error'))
	&nbsp;
	<div data-alert class="alert-box alert">
		{{Session::get('error')}}
		<a href="#" class="close">&times;</a>
	</div>
	@endif
	<h2>Login</h2>
	{{ Form::open(array('action'=>'UsersController@postLogin')) }}
	<div class="form-group">
		<label for="email">Username or Email</label>
		<input class="form-control" tabindex="1" placeholder="Username or Email" type="text" name="email" id="email" value="">
	</div>
	<div class="form-group">
		<label for="password">
			Password
		</label>
		<input class="form-control" tabindex="2" placeholder="Password" type="password" name="password" id="password">
		<p class="help-block">
		<a href="http://localhost:8000/users/forgot_password">(forgot password)</a>
		</p>
	</div>
	<div class="checkbox">
		<label for="remember">
			<input type="hidden" name="remember" value="0">
			<input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> Remember me
		</label>
	</div>

	<div class="form-group">
		<button tabindex="3" type="submit" class="button expand">Login</button>
	</div>
	{{ Form::close() }}
</div>
@stop
