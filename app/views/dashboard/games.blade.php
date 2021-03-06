@extends('layout')

@section('content')
<div id="editModal" class="reveal-modal medium" data-reveal>
	<h1>Edit Game<a href="#" class="close-reveal-modal right">&times;</a></h1>
	<form>
		<div class="large-6 columns">
			<label>Game Name</label><input type="text" value="Skalding Shackles">
			<label>Game Title</label>
			<input list="game_titles" type="text" value="Pathfinder">
			<datalist id="game_titles">
				<option>Dungeons and Dragons 1e</option>
				<option>Dungeons and Dragons 2e</option>
				<option>Dungeons and Dragons 3.5e</option>
				<option>Dungeons and Dragons 4e</option>
				<option>Dungeons and Dragons Next</option>
				<option>Pathfinder</option>
				<option>Dark Heresy</option>
				<option>Only War</option>
				<option>Black Crusade</option>
				<option>Warhammer Fantasy</option>
				<option>L5R</option>
				<option>Paranoia</option>
			</datalist>
		</div>
		<div class="large-6 columns">
			<div class="row collapse">
				<label>Max Players</label>
				<div class="small-10 columns">
					<input type="number" value="5">
				</div>
				<div class="small-2 columns">
					<span class="postfix">Players</span>
				</div>
			</div>
			<label>Location</label>
			<select>
				<option disabled>My Locations</option>
				<option selected>Online</option>
				<option>My House</option>
				<option disabled>Public Locations</option>
				<option>Past Present Future</option>
				<option>Cool Stuff Inc.</option>
			</select>
		</div>

		<input type="submit" class="button expand">
	</form>
</div>
<div id="transferModal" class="reveal-modal small" data-reveal>
	<h1>Transfer Game<a href="#" class="close-reveal-modal right">&times;</a></h1>
	<form>
		<label>Transfer Game to...</label>
		<input type="text">
		<label>Are you sure? This can not be undone.</label>
		<input type="checkbox">
		<input type="submit" class="button expand">
	</form>
</div>
<div id="leaveModal" class="reveal-modal small" data-reveal>
	<h1>Leaving Game<a href="#" class="close-reveal-modal right">&times;</a></h1>
	<form>
		<label>Are you sure? This can not be undone.</label>
		<input type="checkbox">
		<input type="submit" class="button expand">
	</form>
</div>
<div class="small-12 columns">
	<h1>My Games</h1>
	<p>Games that you are currenlty either running or participating in</p>
	<center>
		<table>
			<tr>
				<th>Game</th>
				<th>Rules</th>
				<th>Game Master</th>
				<th>Genre</th>
				<th># of Players</th>
				<th>Join Requests</th>
				<th>Max Players</th>
				<th></th>
				<th></th>
			</tr>
@foreach(Auth::user()->gameList() as $game)
			<tr>
				<td><a href="{{action("GameController@show",$game->id)}}">{{$game->game_title}}</a></td>
				<td>{{$game->rules_title}}</td>
				<td>{{link_to_action("UsersController@getProfile",$game->gameMaster->username,$game->gameMaster->id)}}</td>
				<td>{{$game->genre}}</td>
				<td>{{$game->curr_players}}</td>
				<td><a href="#">2</a></td>
				<td>{{$game->max_players}}</td>
@if($game->gameMaster->id === Auth::id())
				<td><button class="tiny" href="#" data-reveal-id="editModal">Edit</button></td>
				<td><button class="tiny" href="#" data-reveal-id="transferModal">Transfer</button></td>
@else
				<td></td>
				<td><button class="tiny" href="#" data-reveal-id="leaveModal">Leave</button></td>
@endif
			</tr>
@endforeach
		</table>
	</center>
</div>
@stop
