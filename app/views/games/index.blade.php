@extends('layout')

@section('content')
<div class="large-3 columns show-for-large-up" id="side_bar">
	<h3>Refine and Find!</h3>
	<form action="searching.html">
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Game Master
					<input type="text" placeholder="Gary Gygax">
				</label>
			</div>
		</div>
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Players (Comma Seperated)
					<input type="text" placeholder="sage_latorra, skinnyghost">
				</label>
			</div>
		</div>
		<div class="row collapse">
			<label>Mininum Party Match</label>
			<div class="medium-10 columns">
				<input type="number" min="1" max="100" placeholder="42">
			</div>
			<div class="medium-2 columns">
				<span class="postfix">%</span>
			</div>
		</div>
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Game Title
					<input list="game_titles" type="text">
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
				</label>
			</div>
		</div>
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Genre
					<input list="genres" type="text">
					<datalist id="genres">
						<option>Fantasy</option>
						<option>Cyberpunk</option>
						<option>Modern</option>
						<option>Parody</option>
						<option>Anime</option>
					</datalist>
				</label>
			</div>
		</div>
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Starting Level
					<input type="number" placeholder="5">
				</label>
			</div>
		</div>
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Sorting Options</label>
				<select>
					<option>Alphabetical, Ascending</option>
					<option>Alphabetical, Descending</option>
					<option>Party Match, Ascending</option>
					<option>Party Match, Decending</option>
					<option>Next Game, Ascending</option>
					<option>Next Game, Descending</option>
				</select>
			</div>
		</div>
		<div class="row collapse">
			<div class="medium-12 columns">
				<label>Where do you want to play</label>
				<input id="checkbox1" type="checkbox"><label for="checkbox1">In Person</label>
				<input id="checkbox2" type="checkbox"><label for="checkbox2">Online</label>
			</div>
		</div>
		<div class="row">
			<div class="medium-12 columns">
				<input type="submit" class="button expand">
			</div>
		</div>
	</form>
</div>
<div class="large-9 columns">
	<h2>Found Your Bounties</h2>
	<div class="row">
		<div class="small-7 columns small-centered text-center">
			<p>Sort by...</p>
			<ul class="button-group">
				<li><a href="#" class="button">Soonest</a></li>
				<li><a href="#" class="button">Closest</a></li>
				<li><a href="#" class="button">Biggest Match</a></li>
			</ul>
		</div>
	</div>
@if($games->isEmpty())
<p class="panel">Sorry, no results found.</p>
@endif
	<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
		@foreach ($games as $game)
		<li>
		<a href="{{action('GameController@show',$game->id)}}">
			@if($game->online)
			<div class="game_card">
				@else
				<div class="local game_card">
					@endif
					<b><u>{{{$game->game_title}}}</u></b>
					<ul class="no-bullet">
						<li><b>GM </b><span>{{{$game->gameMaster->username}}}</span></li>
						<li><b>Party Match </b><span>68%</span></li>
						<li><b>Game </b><span>{{{$game->rules_title}}}</span></li>
						<li><b>Next Game </b><span>6/28/15</span></li>
						<li><b>Starting Level </b><span>{{{$game->starting_level}}}</span></li>
					</ul>
				</div>
			</a>
			</li>
			@endforeach
		</ul>
		{{$games->links()}}
	</div>
	@stop
