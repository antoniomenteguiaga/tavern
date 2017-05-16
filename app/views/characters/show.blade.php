@extends('layout')

@section('content')
<div class="small-12 columns">
	<h1>{{$character->name}} <small>The {{empty($character->class)?"Classless":$character->class}}</small>
@if(Auth::check() and $character->user->id === Auth::id())
<a href="{{action('CharacterController@edit',$character->id)}}" class="right">&#9881;</a>
@endif
</h1>
	<div class="medium-3 large-2 columns">
		<div class="row">
{{$character->displayArt()}}
		</div>
		<div class="row">
			<div class="small-6 medium-12 columns">
				<b>Character Sheets</b>
				<ul>
@foreach($character->characterSheets as $sheet)
<li><a href="{{asset($sheet->location())}}">{{$sheet->name}}</a></li>
@endforeach
				</ul>
			</div>
			<div class="small-6 medium-12 columns">
				<b>Character Images</b>
				<ul>
@foreach($character->characterArts as $sheet)
<li><a href="{{$sheet->location()}}">{{empty($sheet->name)?"Untitled Picture":$sheet->name}}</a></li>
@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="medium-9 large-6 columns">
		{{Markdown::render(empty($character->biography)?"No backstory?! Someone should tell ".$character->user->username." to write one!":$character->biography) }}
	</div>
	<div class="large-4 columns">
		<div class="row">
			<div class="small-6 columns">
				<p>Owned by {{link_to_action('UsersController@getProfile',$character->user->username,$character->user->id)}}</p>
			</div>
			<div class="small-6 columns">
				<button>Favorite</button>
			</div>
		</div>
		<h2>Game History</h2>
		<table>
			<tr>
				<th>Game</th>
				<th>Participation Time</th>
				<th>Ruleset</th>
			</tr>
			@foreach($character->gameHistory as $game)
			<tr>
				<td>{{$game->game_title}}</td>
				<td>{{$game->created_at->diffForHumans(\Carbon\Carbon::now())}}</td>
				<td>{{$game->rules_title}}</td>
			</tr>
			@endforeach
		</table>
		<small>* Currently Participating in</small>
	</div>
</div>
@stop
