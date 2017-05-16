<?php

class DashboardController extends \BaseController {

	function getGames(){
		return View::make('dashboard.games',array("title"=>"Games Dashboard","games"=>Auth::user()->games));
	}

	function getSettings(){
		return View::make('dashboard.settings',array("title"=>"Settings Dashboard","user"=>Auth::user()));
	}

	function getMyCharacters(){
		return View::make('dashboard.my_characters',array("title"=>"My Characters Dashboard","characters"=>Auth::user()->characters));
	}

	function getCharacters(){
		return View::make('dashboard.characters',array("title"=>"My Characters Dashboard","characters"=>Auth::user()->characters));
	}

	function getAcceptReject(){
		return View::make('dashboard.accept_reject',array("title"=>"My Characters Dashboard","games"=>Auth::user()->games));
	}

	/*All the post-work for the dashboard is ajax cause its the only sensible way*/
	function postMyCharacters(){
		return Response::json();
	}

	function postCharacters(){
		return Response::json();
	}

	function postSettings(){
		$user = Auth::user();
		$user->min_party_match = Input::get('min_party_match');
		$user->sorting_option = Input::get('sorting_option');
		$user->in_person = Input::has('in_person');
		$user->online = Input::has('online');
		$user->save();
		return Redirect::back();
	}

	function postAcceptReject(){
		$option = DB::table('game_character')->where('game_id',Input::get('game_id'))->where('character_id',Input::get('character_id'));
		if(Input::get('accept')=="true"){
			$option->update(array('confirmed'=>true));
		}else{
			$option->delete();
		}
		return Input::all();
	}
}
