<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
 */

Route::get('/', function()
{
	$games = Game::orderBy('updated_at','DESC')->paginate(3);
	return View::make('games_list',array("title"=>"Home","games"=>$games));
});

Route::get('/about', function()
	{
		return View::make('info.about',array('title'=>"About"));
	});
Route::get('/author', function()
	{
		return View::make('info.author',array('title'=>"About The Creators"));
	});
Route::get('/howto', function()
	{
		return View::make('info.howto',array('title'=>"How To Use Tavern"));
	});

Route::get('game/search','GameController@search');

Route::group(array('before'=>'auth'), function(){
	Route::resource('game',"GameController",array('except'=>array('show','index')));
	Route::post("game/joinGame","GameController@joinGame");
	Route::resource('character',"CharacterController",array('except'=>array('show','index')));

	Route::get('brainhex', 'BrainHexController@getIndex');

	Route::get('brainhex/quiz', 'BrainHexController@getQuiz');
	Route::post('brainhex/quiz', 'BrainHexController@postQuiz');

	Route::get('brainhex/rate', 'BrainHexController@getRate');
	Route::post('brainhex/rate', 'BrainHexController@postRate');

	Route::get('brainhex/results', 'BrainHexController@postResults');

	Route::get('dashboard/games', 'DashboardController@getGames');
	Route::get('dashboard/settings', 'DashboardController@getSettings');
	Route::get('dashboard/my_characters', 'DashboardController@getMyCharacters');
	Route::get('dashboard/characters', 'DashboardController@getCharacters');
	Route::get('dashboard/accept_reject', 'DashboardController@getAcceptReject');

	Route::post('dashboard/settings', 'DashboardController@postSettings');
	Route::post('dashboard/my_characters', 'DashboardController@postMyCharacters');
	Route::post('dashboard/characters', 'DashboardController@postCharacters');
	Route::post('dashboard/accept_reject', 'DashboardController@postAcceptReject');
});

Route::resource('game',"GameController",array('only'=>array('show','index')));
Route::resource('character',"CharacterController",array('only'=>array('show','index')));

// Confide RESTful route
Route::get('users/confirm/{code}', 'UsersController@getConfirm');
Route::get('users/reset_password/{token}', 'UsersController@getReset');
Route::get('users/reset_password', 'UsersController@postReset');
Route::get('users/profile/{id}','UsersController@getProfile');
Route::controller( 'users', 'UsersController');
