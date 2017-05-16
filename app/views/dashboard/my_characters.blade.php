@extends('layout')

@section('content')
<div id="transferModal" class="reveal-modal small" data-reveal>
	<h1>Transfer Character<a href="#" class="close-reveal-modal right">&times;</a></h1>
	<form>
		<label>Transfer Character to...</label>
		<input type="text">
		<label>Are you sure? This can not be undone.</label>
		<input type="checkbox">
		<input type="submit" class="button expand">
	</form>
</div>
<div id="deleteModal" class="reveal-modal small" data-reveal>
	<h1>Deleting Character<a href="#" class="close-reveal-modal right">&times;</a></h1>
	<form>
		<label>Are you sure? This can not be undone.</label>
		<input type="checkbox">
		<input type="submit" class="button expand">
	</form>
</div>
<div class="small-12 columns">
	<h1>My Characters</h1>
	<center>
		<table>
			<tr>
				<th>Character</th>
				<th>Level</th>
				<th>Class</th>
				<th>Ruleset</th>
				<th>Games</th>
				<th colspan="3">Options</th>
			</tr>
			@foreach(Auth::user()->characters as $character)
			<tr>
				<td>{{link_to_action('CharacterController@show',$character->name,$character->id)}}</td>
				<td>{{$character->level}}</td>
				<td>{{$character->class}}</td>
				<td>{{$character->rules}}</td>
				<td>
					@foreach($character->gameHistory as $game)
					{{link_to_action('GameController@show',$game->game_title,$game->id).", "}}
					@endforeach
				</td>
				<td><a class="button tiny" href="#">Edit</a></td>
				<td><button href="#" data-reveal-id="transferModal" class="tiny">Transfer</button></td>
				<td><button href="#" data-reveal-id="deleteModal" class="tiny">Delete</button></td>
			</tr>
			@endforeach
		</table>
	</center>
</div>
@stop
