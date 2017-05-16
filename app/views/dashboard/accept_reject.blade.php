@extends('layout')

@section('content')
<div class="small-12 columns">
	<h1>Accept and Reject Players</h1>
	<center>
		<table>
			<tr>
				<th>Player</th>
				<th>Game</th>
				<th>Rules</th>
				<th>Genre</th>
				<th>Match</th>
				<th>Party Match</th>
				<th># of Players</th>
				<th>Max Players</th>
				<th colspan="2">Options</th>
			</tr>
{{Form::open(array('action'=>'DashboardController@postAcceptReject','method'=>'post'))}}
@foreach($games as $game)
@foreach($game->characters as $character)
@if($character->pivot["confirmed"] == "0")
			<tr id="character-{{$character->id}}-game-{{$game->id}}">
				<td><a href="{{$character->user->id}}">{{$character->user->username}}</a></td>
				<td><a href="{{$game->id}}">{{$game->game_title}}</a></td>
				<td>{{$game->rules_title}}</td>
				<td>{{$game->genre}}</td>
				<td>{{$character->user->playerMatch(Auth::id())}}</td>
				<td>73%</td>
				<td>{{$game->curr_players}}</td>
				<td>{{$game->max_players}}</td>
				<td><button class="tiny success" type="submit" onClick="postAcceptReject({{$character->id}},{{$game->id}},true)">Accept</button></td>
				<td><button class="tiny alert"   type="submit" onClick="postAcceptReject({{$character->id}},{{$game->id}},false)">Reject</button></td>
			</tr>
@endif
@endforeach
@endforeach
{{Form::close()}}
		</table>
	</center>
</div>

<script>
function postAcceptReject(character_id, game_id, result){
	event.preventDefault();
	console.log('click');
	$.ajax({
		type:"POST",
			url:$(this).prop('action'),
data:{
	"_token": $(this).find('input[name=_token]').val(),
		"character_id": character_id,
		"game_id": game_id,
		"accept": result
},
success:function(data){
	$("#character-"+data.character_id+"-game-"+data.game_id).remove();
},
	dataType:'json'});
	return false;
}
</script>
@stop
