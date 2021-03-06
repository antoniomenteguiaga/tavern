@extends('layout')

@section('content')
@if(Auth::id() === $character->user->id)
<h1>Editing {{$character->name}}</h1>
<form>
	<div class="small-4 columns">
		<label>Name</label>
		<input type="text" value="{{$character->name}}">
		<label>Class</label>
		<input type="text" value="{{$character->class}}">
		<div class="row">
			<div class="medium-6 columns">
				<label>Change Display Image</label>
				<select>
					<option>Casual</option>
					<option>Battle</option>
				</select>
			</div>
			<div class="medium-6 columns">
				<img src="http://placehold.it/150x250">
			</div>
		</div>
	</div>

	<div class="small-4 columns">
		<h3>Change your Backstory</h3>
		<textarea rows="20">{{$character->biography}}</textarea>
	</div>


	<div class="small-4 columns">
		<h3>Edit Character Sheets</h3>
		<label>Upload new Character Sheet</label>
		<input type="file">
		<label>Character Sheet Title</label>
		<input type="text">
		<ul>
			<li>Pathfinder Level 5 <a href="#" class="right">&times;</a></li>
			<li>Pathfinder Level 15 <a href="#" class="right">&times;</a></li>
			<li>Microlite20 Level 2 <a href="#" class="right">&times;</a></li>
		</ul>
		<h3>Edit Character Images</h3>
		<label>Upload new Image</label>
		<input type="file">
		<label>Image Title</label>
		<input type="text">
		<ul>
			<li>Casual <a href="#" class="right">&times;</a></li>
			<li>Battle <a href="#" class="right">&times;</a></li>
		</ul>
		<input type="submit" class="button expand">
	</div>
</form>
<div class="small-12 columns text-center">
	<footer>
		<div class="row"><div class="small-5 columns small-centered">
				<ul class="button-group">
					<li><a class="button tiny" href="#">About Tavern</a></li>
					<li><a class="button tiny" href="#">About the creator</a></li>
					<li><a class="button tiny" href="#">How to use Tavern</a></li>
				</ul>
		</div></div>
		<p>All work on this project is being done by Antonio Menteguiaga.</p>
		<p>Thanks to Nicole Woodward for help with the colorscheme, Zurb for Foundation, and #suptg at thisisnotatrueending for their feedback.</p>
		<p>&copy; 2014</p>
	</footer>
</div>
@else
<div class="small-12 columns">
<h2>Illegal Access</h2>
<p class="panel">Sorry, but you're not authorized to be here.</p>
</div>
@endif
@stop
