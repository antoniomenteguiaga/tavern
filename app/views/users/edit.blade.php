@extends('layout')

@section('content')
	<div class="small-12 columns">
		<h1>Profile Settings and Preferences</h1>
		<div data-alert class="alert-box alert">
			This is all one form. Submit will take any changes made on either tab.
			<a href="#" class="close">&times;</a>
		</div>
		<dl class="tabs" data-tab>
			<dd class="active"><a href="#profile">Profile</a></dd>
			<dd><a href="#preferences">Preferences</a></dd>
		</dl>

		<form>
			<div class="tabs-content">
				<div class="content active" id="profile">
					<div class="small-4 columns">
						<img src="http://placehold.it/150x250">
						<label>Upload new Image</label>
						<input type="file">


						<label>Have a new Favorite Game?</label>
						<input type="text">

						<button class="small expand" href="#">Edit Characters</button>
						<button class="small expand" href="#">Retake Quiz</button>
					</div>

					<div class="small-4 columns">
						<fieldset>
							<legend>Change Address</legend>
							<label>Address</label>
							<input type="text">
							<label>City</label>
							<input type="text">
							<label>State</label>
							<input type="text">
							<label>Zip</label>
							<input type="text">
						</fieldset>
					</div>


					<div class="small-4 columns">
						<fieldset>
							<legend>Update Password</legend>
							<label>Enter Password</label>
							<input type="password">
							<label>Confirm Password</label>
							<input type="password">
						</fieldset>
						<input type="submit" class="button expand">
					</div>
				</div>
				<div class="content" id="preferences">
					<div class="small-4 columns">
						<h3>Banned Rulesets</h3>
						<input type="text">
						<input type="text" placeholder="Add another...">
						<h3>Banned Genres</h3>
						<input type="text">
						<input type="text" placeholder="Add another...">
					</div>
					<div class="small-4 columns">
						<h3>Ignore Player</h3>
						<input type="text">
						<input type="text" placeholder="Add another...">
						<h3>Ignore Game Master</h3>
						<input type="text">
						<input type="text" placeholder="Add another...">
					</div>
					<div class="small-4 columns">
						<h3>Global Settings</h3>
						<label>Mininum Party Match</label>
						<input type="number" min=0 max=100>
						<label>Sorting Options</label>
						<select>
							<option>Alphabetical, Ascending</option>
							<option>Alphabetical, Descending</option>
							<option>Party Match, Ascending</option>
							<option>Party Match, Decending</option>
							<option>Next Game, Ascending</option>
							<option>Next Game, Descending</option>
						</select>
						<label>Where do you want to play</label>
						<input id="checkbox1" type="checkbox"><label for="checkbox1">In Person</label>
						<input id="checkbox2" type="checkbox"><label for="checkbox2">Online</label>
						<input type="submit" class="button expand">
					</div>
				</div>
			</div>
		</form>
</div>
@stop
