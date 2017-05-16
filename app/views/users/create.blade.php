@extends('layout')

@section('content')
	<div class="small-12 columns">
		<h2>Check in</h2>
{{ Form::open(array('url'=>'users')) }}
<input name="token" type="hidden">
			<div class="medium-4 columns" style="border-right:solid black 1px;">
				<h3>Quick and Easy</h3>
				<label>Username</label><input required type="text" name="username">
				<label>Password</label><input required type="password" name="password">
				<label>Confirm Password</label><input required type="password" name="password_confirmation" data-equalto="password">
				<label>Contact Email</label><input required type="email" name="email">
				<label>Date of Birth</label><input required type="date" name="dob">
				<button name="submit" value="submit" type="submit" class="right">Submit</button>
			</div>
			<div class="medium-8 columns">
				<h3>Fill out the Guestbook</h3>
				<p>Don't worry you can change all this later</p>
				<div class="medium-6 columns">
					<h4>Where are you from?</h4>
					<label>Address</label><input type="text" name="address">
					<label>City</label><input type="text" name="city">
					<label>State</label><input type="text" name="state">
					<label>Zip</label><input type="text" name="zip">
					<label>Country</label><input type="text" name="country">
				</div>
				<div class="medium-6 columns">
					<h4>What are you like?</h4>
					<label>My Favorite Game is...</label><input type="text" name="favorite_game">
					<label>Tell us a little bit about yourself</label><textarea rows="10" name="biography"></textarea>
				</div>
				<button name="brainhex" value="brainhex" type="submit" class="right">Take The Quiz</button>
			</div>
{{ Form::close() }}
	</div>
@stop
