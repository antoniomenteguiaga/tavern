@extends('layout')

@section('content')
<div class="small-12 columns">
	<h1>{{$user->username}} <small>the Player</small>
		@if(Auth::check())
		<span class="right">{{$user->playerMatch(Auth::id())}}</span>
		@endif
	</h1>
	<div class="medium-3 large-2 columns">
		<div class="row">
			<center>
				{{$user->getGravatar()}}
			</center>
		</div>
		<div class="row">
			<ul class="no-bullet">
				<li class="email"><a href="mailto:{{$user->email}}">{{$user->email}}</a></li>
				@if (isset($user->address) && !empty($user->address))
				<li class="street-address">{{{$user->address or "Nowhere"}}}</li>
				@endif
				@if (isset($user->city) && !empty($user->city))
				<li class="city">{{{$user->city or "No City"}}}</li>
				@endif
				@if (isset($user->state) && !empty($user->state) && isset($user->zip) && !empty($user->zip))
				<li><span class="state">{{{$user->state or "No State"}}}</span>, <span class="zip">{{{$user->zip or 90210}}}</span></li>
				@endif
				@if (isset($user->country) && !empty($user->country))
				<li class="country">{{{$user->country or "No country"}}}</li>
				@endif
			</ul>
		</div>
	</div>
	<div class="medium-9 large-5 columns">
		<div class="row">
			<h2>The Technical Stuff</h2>
			<div class="small-6 columns">
				<ul class="no-bullet">
					<li>DOB: {{$user->dob}}</li>
					@if (isset($user->favorite_game) && !empty($user->favorite_game))
					<li>Favorite Game: {{$user->favorite_game}}</li>
					@endif
				</ul>
			</div>
			<div class="small-6 columns">
				<b>BrainHex Results</b>
				<ul class="small-block-grid-2 small-text-center">
					@if(!empty($user->brain_hex_primary) and $user->brain_hex_primary != "None")
					<li>{{HTML::image("images/brainhex_icons/".$user->brain_hex_primary.".png",$user->brain_hex_primary)}}<br>{{{$user->brain_hex_primary}}}</li>
					@endif
					@if(!empty($user->brain_hex_secondary) and $user->brain_hex_secondary != "None")
					<li>{{HTML::image("images/brainhex_icons/".$user->brain_hex_secondary.".png",$user->brain_hex_secondary)}}<br>{{{$user->brain_hex_secondary}}}</li>
					@endif
				</ul>
			</div>
		</div>
		<div class="row">
			<h2>The Personal Stuff</h2>
			{{Markdown::render($user->biography)}}
		</div>
	</div>
	<div class="large-5 columns">
		<h2>Character List</h2>
		<table style="width:100%">
			<tr>
				<th>Character</th>
				<th>Level</th>
				<th>Class</th>
				<th>Ruleset</th>
			</tr>
			@foreach($user->characters as $character)
			<tr>
				<td>{{$character->name}}</td>
				<td>{{$character->level}}</td>
				<td>{{$character->class}}</td>
				<td>{{$character->rules}}</td>
			</tr>
			@endforeach
		</table>
		<h2>Game History</h2>
		<table style="width:100%">
			<tr>
				<th>Game</th>
				<th>Participation Time</th>
				<th>Ruleset</th>
				<th>Character</th>
			</tr>
			@foreach($user->characters as $character)
			@foreach($character->gameHistory as $game)
			<tr>
				<td>{{$game->game_title}}</td>
				<td>{{$game->created_at->diffForHumans(\Carbon\Carbon::now())}}</td>
				<td>{{$game->rules_title}}</td>
				<td>{{$character->name}}</td>
			</tr>
			@endforeach
			@endforeach

		</table>
		<small>* Currently Participating in</small>
	</div>
</div>
@stop
