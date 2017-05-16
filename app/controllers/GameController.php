<?php

class GameController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$games = Game::paginate(10);
		return View::make('games.index',array('title'=>"Games", 'games'=>$games));
	}

	public function joinGame(){
		//todo make this eloquent?

		DB::table('game_character')->insert(
				array(
					"game_id"=>Input::get("game_id"),
					"character_id"=>Input::get("character_id"),
					"confirmed"=>false
				     )
				);
		return Redirect::back();
	}

	/**
	 * Display a refined of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		$query = "";

		switch(Input::get('order')){
			case 0:
				$option = 'game_title';
				$direction = 'asc';
				break;
			case 1:
				$option = 'game_title';
				$direction = 'desc';
				break;
			case 2:
				break;
			case 3:
				break;
			case 4:
				$option = 'next_game';
				$direction = 'asc';
				break;
			case 5:
				$option = 'next_game';
				$direction = 'desc';
				break;
			default:
				$option = 'game_title';
				$direction = 'asc';
				break;
		}
		if(Input::has('game_master'))
			$query .= (empty($query)?"":" and ")."game_master = '".Input::get('game_master')."'";
		/** players to be implemented **/
		/** min_party_match to be implemented **/
		if(Input::has('game_title'))
			$query .= (empty($query)?"":" and ")."rules_title = '".Input::get('game_title')."'";
		if(Input::has('genre'))
			$query .= (empty($query)?"":" and ")."genre = '".Input::get('genre')."'";
		if(Input::has('starting_level'))
			$query .= (empty($query)?"":" and ")."starting_level = '".Input::get('starting_level')."'";
		if(Input::has('offline') and Input::get('offline') > 0)
			$query .= (empty($query)?"":" and ")."online = '0'";
		if(Input::has('online') and Input::get('online') > 0)
			$query .= (empty($query)?"":" and ")."online = '1'";

		if(!empty($query))
			$games = Game::whereRaw($query)->orderBy($option,$direction)->paginate(10);
		else
			$games = Game::orderBy($option,$direction)->paginate(10);
		return View::make('games.index',array('title'=>"Games", 'games'=>$games));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = array();
		if(User::all()->count() < 10){
			$user=User::all();
		}else{
			for($i=0;$i<10;$i++){
				$temp = User::find(rand(1,10));
				$user[$temp->id]=$temp;
			}
		}
		return View::make('games.create',array('title'=>"Create Game","players"=>$user));
	}



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$game = new Game();
		$game->game_master = Auth::id();
		$game->game_title = Input::get('name');
		$game->rules_title = Input::get('ruleset');
		$game->genre = Input::get('genre');
		$game->next_game = Input::get('next_game');
		$game->max_players = Input::get('max_players');
		$game->starting_level = Input::get('starting_level');
		$game->description = Input::get('description');
		$game->location_id = Input::get('location',1);
		$game->save();

		/*Invite selected users*/
		if(Input::has('player')){
			foreach(Input::get('player') as $key => $value){
				$user=User::find($key);

				/*Lets just assume this works because why not*/
				Mail::send(
						'emails.invite',
						array(),
						function($message) use ($user,$game){
						$message
						->to($user->email,$user->username)
						->subject("You've been invited to a game");
						}
					  );
			}
		}

		return Redirect::action("GameController@show",$game->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$game = Game::find($id);
		return View::make('games.show',array('title'=>$game->game_title,"game"=>$game));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Response::json(Game::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$game=Game::find(Input::get('id'));
		$game->game_title = Input::get('name',$game->game_title);
		$game->rules_title = Input::get('ruleset',$game->rules_title);
		$game->genre = Input::get('genre',$game->genre);
		$game->next_game = Input::get('next_game',$game->next_game);
		$game->max_players = Input::get('max_players',$game->max_players);
		$game->starting_level = Input::get('starting_level',$game->starting_level);
		$game->description = Input::get('description',$game->description);
		$game->location_id = Input::get('location',$game->location_id);
		$game->save();

		return Response::json($game);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
