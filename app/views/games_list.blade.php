@extends('layout')

@section('content')
<div class="large-3 columns show-for-large-up" id="side_bar">
	<h3>Refine and Find!</h3>
        {{Form::open(array('action'=>'GameController@search','method'=>'get'))}}                                                                                                 
		<div class="row collapse">
			<div class="small-12 columns">
				<label>Game Master
					<input name="game_master" type="text" placeholder="Gary Gygax">
				</label>
			</div>
		</div>
		<div class="row collapse">
			<div class="small-12 columns">
				<label>Players (Comma Seperated)
					<input name="players" type="text" placeholder="sage_latorra, skinnyghost">
				</label>
			</div>
		</div>
		<div class="row collapse">
			<label>Mininum Party Match</label>
			<div class="small-10 columns">
				@if(Auth::check())
				<input name="min_party_match" type="number" min="1" max="100" placeholder="42">
				@else
				<input type="number" min="1" max="100" placeholder="42" disabled>
				@endif
			</div>
			<div class="small-2 columns">
				<span class="postfix">%</span>
			</div>
		</div>
		<div class="row collapse">
			<div class="small-12 columns">
				<label>Game Title
					<input name="game_title" list="game_titles" type="text">
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
			<div class="small-12 columns">
				<label>Genre
					<input name="genre" list="genres" type="text">
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
			<div class="small-12 columns">
				<label>Starting Level
					<input name="starting_level" type="number" placeholder="5">
				</label>
			</div>
		</div>
		<div class="row collapse">
			<div class="small-12 columns">
				<label>Sorting Options</label>
				<select name="order">
					<option value="0">Alphabetical, Ascending</option>
					<option value="1">Alphabetical, Descending</option>
					<option value="2">Party Match, Ascending</option>
					<option value="3">Party Match, Decending</option>
					<option value="4">Next Game, Ascending</option>
					<option value="5">Next Game, Descending</option>
				</select>
			</div>
		</div>
		<div class="row collapse">
			<div class="small-12 columns">
				<label>Where do you want to play</label>
				<input name="offline" type="checkbox"><label for="checkbox1">In Person</label>
				<input name="online" type="checkbox"><label for="checkbox2">Online</label>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<input type="submit" class="button expand">
			</div>
		</div>
{{Form::close()}}
</div>
<div class="medium-12 large-9 columns">
	<h2 data-tooltip aria-haspopup="true" class="has-tip" title="Here you can find a constantly updating list of games that fit your specifications and preferences">The Bounty Board</h2>
	<p>Games submitted in the last hour</p>
	@foreach($games as $game)
	<a href="{{action('GameController@show', $game->id)}}">
		@if($game->online)
		<div class="game_card" style="width:100%">
			@else
			<div class="game_card local" style="width:100%">
				@endif
				<div class="row fullWidth">
					<div class="medium-8 columns">
						<h3>{{{$game->game_title}}}</h3>
						<div class="row">
							<div class="small-6 columns">
								<b>GM: </b><span>{{{$game->gameMaster->username}}}
									@if(Auth::check())
									- 32%
									@endif
								</span>
							</div>
							<div class="small-6 columns">
								@if(Auth::check())
								<b>Party Match: </b><span>68%
									@endif
								</span>
							</div>
						</div>
						<div class="row">
							<div class="small-6 columns">
								<b>Game: </b><span>{{{$game->rules_title}}}</span>
							</div>
							<div class="small-6 columns">
								<b>Next Game: </b><span>6/28/15</span>
							</div>
						</div>
						<div class="row">
							<div class="small-6 columns">
								<b>Genre: </b><span>{{{$game->genre}}}</span>
							</div>
							<div class="small-6 columns">
								<b>Starting Level: </b><span>{{{$game->starting_level}}}</span>
							</div>
						</div>
					</div>
					<div class="medium-4 hide-for-small columns">
						@if(Auth::check())
						<u><b>Players</b></u>
						<ul class="no-bullet">
							<li>Player 1 - 75%</li>
							<li>Player 2 - 12%</li>
							<li>Player 3 - 14%</li>
							<li>Player 4 - 83%</li>
						</ul>
						@endif

					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<blockquote>{{{$game->description or "The GM hasn't given the game a description yet!"}}}</blockquote>
					</div>
				</div>
			</div>
		</a>
		@endforeach
		{{$games->links()}}
	</div>
	@stop
