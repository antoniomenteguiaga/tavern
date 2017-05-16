@extends('layout')

@section('content')
{{Form::open(array('action'=>'GameController@store'))}}
<div class="medium-6 large-4 columns">
	<h1>Add a game</h1>
	<label>Game Name</label><input type="text" name="name" required>
	<label>Game Title</label>
	<input list="game_titles" type="text" name="ruleset">
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
	<label>Genre</label>
	<input list="genre_list" type="text" name="genre">
					<datalist id="genre_list">
						<option>Fantasy</option>
						<option>Cyberpunk</option>
						<option>Modern</option>
						<option>Parody</option>
						<option>Anime</option>
					</datalist>
	<label>First Game</label><input type="datetime-local" name="next_game">
	<div class="row collapse">
		<label>Starting Level</label>
		<div class="small-3 columns">
			<span class="prefix">Level</span>
		</div>
		<div class="small-9 columns">
			<input type="number" name="starting_level">
		</div>
	</div>
	<div class="row collapse">
		<label>Max Players</label>
		<div class="small-9 columns">
			<input type="number" name="max_players">
		</div>
		<div class="small-3 columns">
			<span class="postfix">Players</span>
		</div>
	</div>
	<label>Game Description</label>
	<textarea name="description"></textarea>
	<label>Location</label>
	<select name="location">
		<option disabled>My Locations</option>
		<option value="1">Online</option>
		@foreach(Auth::user()->locations as $location)
		<option value="{{$location->id}}">{{$location->address}}</option>
		@endforeach
		<option disabled>Public Locations</option>
		@foreach(DB::table('locations')->whereNull('user_id')->whereNotIn('id',array(1))->get() as $location)
		<option value="{{$location->id}}">{{$location->address}}</option>
		@endforeach
	</select>

	<input type="submit" class="button expand show-for-medium-up">
</div>
<div class="medium-6 large-8 columns">
	<h2>Invite Players</h2>
	<ul class="large-block-grid-4">
		@foreach($players as $player)
		<li>
		<div class="player_card_light" id="player_{{$player->id}}" onclick="checkPlayer({{$player->id}})">
			<center>
				{{$player->getGravatar(100)}}
			</center>
			<div class="row collapse">
				<div class="small-6 columns">
					<span><b>{{$player->username}}</b></span>
				</div>
				<div class="small-6 columns">
					<span class="right">{{$player->playerMatch(Auth::id())}}<span>
						</div>
					</div>
					<div class="row collapse">
						<span>{{$player->location->city}}, 
							{{$player->location->state}}</span>
					</div>
					<input id="player_checkbox_{{$player->id}}" name="player[{{$player->id}}]" type="checkbox" class="hide">
				</div>
				</li>
				@endforeach
			</ul>
		</div>
		<input type="submit" class="button expand hide-for-medium-up">
		{{Form::close()}}
		<script>
function checkPlayer(number){
	$('#player_'+number).toggleClass('player_card_light');
	$('#player_'+number).toggleClass('player_card_clicked');
	$('#player_checkbox_'+number).prop("checked", !($('#player_checkbox_'+number).prop("checked")));
}
		</script>
		@stop
