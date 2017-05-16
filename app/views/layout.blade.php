<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href='http://fonts.googleapis.com/css?family=Fredericka+the+Great|Laila' rel='stylesheet' type='text/css'>
{{ HTML::style('stylesheets/app.css') }}
{{ HTML::style('css/beermug.css') }}
{{ HTML::script('bower_components/modernizr/modernizr.js') }}
{{HTML::script("bower_components/jquery/dist/jquery.min.js")}}
{{HTML::script("bower_components/foundation/js/foundation.min.js")}}
<title>Tavern - {{$title}}</title>
@yield('header')
</head>
<body>
<div class="row" id="main_row">
	<div class="small-12 columns">
		<h1><i class="icon-beermug" style="color:#59323C"></i> <span style="font-family: 'Fredericka the Great', cursive;">Tavern</span></h1>
	</div>
	<div class="small-12 columns contain-to-grid">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
				<h1>{{link_to('/','The Lobby')}}</h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>


			@if(Auth::check())
			<section class="top-bar-section">
				<!-- Right Nav Section -->
				<ul class="right">
					<li class="has-dropdown">
					{{link_to('dashboard/games',"My Games")}}
					<ul class="dropdown">
						<li>{{link_to('dashboard/accept_reject',"Accept/Reject Players (2)")}}</a></li>
					@foreach(Auth::user()->gameList() as $game)
					<li>{{link_to_action('GameController@show',$game->game_title.($game->gameMaster->id == Auth::id()?" *":""),$game->id)}}</li>
					@endforeach
					<li><a href="{{action("GameController@create")}}">Add a new game</a></li>
				</ul>
				</li>
				<li class="divider"></li>
				<li class="has-dropdown">
				{{link_to_action('UsersController@getProfile','Hello, '.Confide::user()->username,array(Confide::user()->id))}}
				<ul class="dropdown">
					<li>{{link_to_action('DashboardController@getSettings','Settings')}}</li>
					<li>{{link_to_action('UsersController@getLogout','Logout')}}</li>
				</ul>
				</li>
			</ul>

			<!-- Left Nav Section -->
			<ul class="left">
				<li>{{link_to('dashboard/characters','The Bar-Room')}}</li>
				<li class="has-dropdown">{{link_to('dashboard/my_characters','The Inn')}}
				<ul class="dropdown">
					@foreach(Auth::user()->characters as $character)
					<li><a href="{{action('CharacterController@show',$character->id)}}">{{$character->name}}</a></li>
					@endforeach
					<li><a href="{{action("CharacterController@create")}}">Add a new character</a></li>
				</ul>
				</li>
				<li>
				<a id="reveal_search" class="hide-for-large-up">Search</a>
				</li>
			</ul>
		</section>
		@else
		<section class="top-bar-section">
			<!-- Right Nav Section -->
			<ul class="right">
				<li class="has-form">
				{{Form::open(array('action'=>'UsersController@postLogin'))}}
				<input type="hidden" name="goBack" value="true">
				<div class="row collapse">
					<div class="large-4 small-3 columns">
						<input type="text" placeholder="Username" name="username">
					</div>
					<div class="large-4 small-3 columns">
						<input type="password" placeholder="Password" name="password">
					</div>
					<div class="large-2 small-3 columns">
						<input type="submit" class="button expand navbar_login" value="Login">
					</div>
					{{Form::close()}}
					<div class="large-2 small-3 columns">
						{{HTML::linkAction('UsersController@getCreate','Register',null,array('class'=>'button expand navbar_login'))}}
					</div>
				</div>
				</li>
			</ul>

			<!-- Left Nav Section -->
			<ul class="left">
				<li><a class="button tiny" href="{{url('/about')}}">About Tavern</a></li>
			</ul>
		</section>
		@endif
	</nav>
</div>
@yield('content')
<div class="row">
	<div class="small-12 columns">
		<footer>
			<div class="row">
				<div class="large-6 large-centered columns">
					<ul class="button-group stack-for-small even-3">
						<li><a class="button tiny" href="{{url('/about')}}">About Tavern</a></li>
						<li><a class="button tiny" href="{{url('/author')}}">About the creators</a></li>
						<li><a class="button tiny" href="{{url('/howto')}}">How to use Tavern</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
</div>
</div>
{{HTML::script("js/app.js")}}
</body>
</html>
