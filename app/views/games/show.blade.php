@extends('layout')

@section('content')
<div class="large-3 columns" id="side_bar">
	<h3>Quick Notes</h3>
	<ul class="no-bullet">
		<li>GM: {{$game->gameMaster->username}}
@if(Auth::check())
 - 32%
@endif
 </li>
@if(Auth::check())
		<li>Party Match: 68%</li>
@endif
		<li>Game: <span class="game_rules">{{$game->rules_title}}</span></li>
		<li>Next Game: <span class="game_time">{{$game->next_game}}</span></li>
		<li>Genre: <span class="game_genre">{{$game->genre}}</span></li>
		<li>Starting Level: <span class="starting_level">{{$game->start_level}}</span></li>
		<li>Empty Slots: {{$game->curr_players}}/<span class="max_players">{{$game->max_players}}</span></li>
	</ul>
</div>
@if(Auth::id() == $game->gameMaster->id)
<div id="editModal" class="reveal-modal medium" data-reveal>
	<h1>Edit Game<a href="#" class="close-reveal-modal right">&times;</a></h1>
	{{Form::open(array('action'=>'GameController@update','method'=>'put','id'=>'editGame'))}}
	<input type="hidden" id="game_id" value="{{$game->id}}">
		<div class="large-6 columns">
			<label>Game Name</label><input id="edit_game_name" class="game_name" type="text" value="{{$game->game_title}}">
			<label>Game Title</label>
			<input id="edit_rules" list="game_titles" type="text" class="game_rules" value="{{$game->rules_title}}">
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
					<input id="edit_max_players" type="number" class="max_players" value="{{$game->max_players}}">
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

		<label>Game Description</label>
		<textarea class="game_description" id="edit_description">{{$game->description}}</textarea>

		<input type="submit" class="button expand">

		<hr>

		<div class="row">
			<div class="small-6 columns">
				<button href="#" class="expand" data-reveal-id="transferModal">Transfer</button>
			</div>
			<div class="small-6 columns">
				<button href="#" class="expand" data-reveal-id="leaveModal">Leave</button>
			</div>
		</div>
		{{Form::close()}}
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
@endif
@if(Auth::check())
<div id="joinModal" class="reveal-modal small" data-reveal>
	<h1>Joining Game<a href="#" class="close-reveal-modal right">&times;</a></h1>
	{{Form::open(array('action'=>'GameController@joinGame','method'=>'post'))}}
With which character?
<input type="hidden" name="game_id" value="{{$game->id}}">
		<select name="character_id">
@foreach(Auth::user()->characters as $character)
<option value="{{$character->id}}">{{$character->name}}</option>
@endforeach
</select>
		<input type="submit" class="button expand">
{{Form::close()}}
</div>
<div id="leaveModal" class="reveal-modal small" data-reveal>
	<h1>Leaving Game<a href="#" class="close-reveal-modal right">&times;</a></h1>
	<form>
		<label>Are you sure? This can not be undone.</label>
		<input type="checkbox">
		<input type="submit" class="button expand">
	</form>
</div>
@endif
<div class="large-9 columns">
	&nbsp;
	<div class="row">
		<div class="small-12 columns">
			<ul class="breadcrumbs">
				<li><a href="/">Bounty Board</a></li>
				<li class="unavailable"><a href="#">Genre</a></li>
				<li><a href="{{action('GameController@search','genre='.$game->genre)}}">{{$game->genre}}</a></li>
				<li class="current"><a href="#">{{$game->game_title}}</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
@if(Auth::check() and $game->gameMaster->id != Auth::id())
		<div class="medium-10 columns">
@else
		<div class="medium-12 columns">
@endif
<h1><span class="game_name">{{$game->game_title}}</span>
@if(Auth::check() and $game->gameMaster->id == Auth::id())
<a href="#" data-reveal-id="editModal" class="right">&#9881;</a></h1>
@else
<a href="#" data-reveal-id="leaveModal" class="right">&#9881;</a></h1>
@endif
		</div>
@if(Auth::check() and $game->gameMaster->id != Auth::id())
		<div class="medium-2 columns"><button class="large right" href="#" data-reveal-id="joinModal">Join!</button></div>
@endif
	</div>
	<span class="game_description">{{Markdown::render($game->description)}}</span>
	<ul class="no-bullet small-block-grid-2">
		<li><b>Players</b></li>
		<li><b>Characters</b></li>
		<li>
		<a href="{{action('UsersController@getProfile',$game->gameMaster->id)}}">
			<div class="player_card">
				{{$game->gameMaster->getGravatar(100)}}
				<ul class="no-bullet right">
					<li><b>{{$game->gameMaster->username}}</b></li>
@if(Auth::check())
					<li>Match: {{$game->gameMaster->playerMatch(Auth::id())}}</li>
@endif
					<li>Game Master</li>
				</ul>
			</div>
		</a>
		</li>
		<li>
		<a href="{{action('UsersController@getProfile',$game->gameMaster->id)}}">
			<div class="player_card">
				{{$game->gameMaster->getGravatar(100,"wavatar")}}
				<ul class="no-bullet right">
					<li><b>Game Master</b></li>
					<li>Class: N/A</li>
					<li>Level: -1</li>
				</ul>
			</div>
		</a>
		</li>
@foreach($game->characters as $character)
@if($character->pivot["confirmed"] == "1")
		<li>
		<a href="{{action('UsersController@getProfile',$character->user->id)}}">
			<div class="player_card">
				{{$character->user->getGravatar(100)}}
				<ul class="no-bullet right">
					<li><b>{{$character->user->username}}</b></li>
@if(Auth::check())
					<li>Match: {{$character->user->playerMatch(Auth::id())}}</li>
@endif
					<li>Character: {{$character->name}}</li>
				</ul>
			</div>
		</a>
		</li>
		<li>
		<a href="{{action('CharacterController@show',$character->id)}}">
			<div class="player_card">
				{{$character->user->getGravatar(100,"wavatar")}}
				<ul class="no-bullet right">
					<li><b>{{$character->name}}</b></li>
					<li>Class: {{$character->class}}</li>
					<li>Level: {{$character->level}}</li>
				</ul>
			</div>
		</a>
		</li>
@endif
@endforeach
	</ul>
	&nbsp;
@if($game->max_players > $game->curr_players)
	<div class="small-12 columns">
		<div class="callout panel">
			<p>Still looking for players it looks like. You should request to join! The button is right there at the top right.</p>
		</div>
	</div>
@endif
</div>
<div class="small-12 columns">
@include('laravel-comments::comments', array('commentable' => $game, 'comments' => $game->comments))
</div>


<script>
jQuery(document).ready(function($){
	$('#editGame').on('submit',function(){
console.log('click');
		$.ajax({
type:"PUT",
url:$(this).prop('action'),
data:{
	"_token": $(this).find('input[name=_token]').val(),
		"name": $('#edit_game_name').val(),
		"ruleset": $('#edit_rules').val(),
		"max_players": $('#edit_max_players').val(),
		"description": $('#edit_description').val(),
"id": $('#game_id').val()
},
success:function(data){
$(".game_name").text(data.game_title);
$(".game_rules").text(data.rules_title);
$(".game_time").text(data.next_game);
$(".game_genre").text(data.genre);
$(".starting_level").text(data.starting_level);
$(".max_players").text(data.max_players);
$(".game_description").text(data.description);
},
	dataType:'json'});
$('#editModal').foundation('reveal','close');
return false;
	});

});
</script>
@stop
