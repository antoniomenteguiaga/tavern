<?php

class BrainHexController extends \BaseController {
	public function getIndex(){
		return View::make('brainhex.index',array("title"=>"Brainhex Quiz"));
	}

	public function getQuiz(){
		return View::make('brainhex.quiz',array("title"=>"Brainhex Quiz"));
	}

	public function postQuiz(){
		Session::put("quiz",Input::get('Quiz'));
		//return Redirect::action('BrainHexController@getQuiz');
		return Redirect::action('BrainHexController@getRate');
	}

	public function getRate(){
		return View::make('brainhex.rate',array("title"=>"Brainhex Quiz"));
	}

	public function postRate(){
		//return Redirect::action('BrainHexController@getRate');
		//Session::put("rate",parse_str(Input::get('rate')));
		parse_str(Input::get('rate'),$rate);
		Session::put("rate",$rate);
		return Redirect::action('BrainHexController@postResults');
	}

	public function postResults(){
		$repo = App::make('BrainHexRepository');
		$results = $repo -> calculateResults(Session::get('rate'),Session::get('quiz'));

		$user = Auth::user();
		$user->brain_hex_primary = $results[0][0];
		$user->brain_hex_secondary = $results[1][0];
		$user->brain_hex_exceptions = "";
		for($i=0;$i<sizeof($results[2]);$i++){
			if($results[2][$i] <= 0){
				$user->brain_hex_exceptions .=$i;
			}
		}
		$user->save();
		return View::make('brainhex.results',array("title"=>"Brainhex Quiz","results"=>$results));
	}

}
