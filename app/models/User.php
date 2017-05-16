<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;

class User extends Eloquent implements ConfideUserInterface
{
	use ConfideUser;

	public function characters(){
		return $this->hasMany('Character','user_id');
	}

	public function locations(){
		return $this->hasMany('Location','user_id');
	}

	public function location(){
		return $this->belongsTo('Location');
	}

	public function games(){
		return $this->hasMany('Game','game_master');
	}

	public function gameList(){
		$out = array();
		foreach($this->games as $game){
			array_push($out,$game->id);
		}
		foreach($this->characters as $character){
			foreach($character->gameHistory as $game){
				array_push($out,$game->id);
			}
		}
		$out = array_unique($out);
		$final = array();
		foreach($out as $game){
			array_push($final, Game::find($game));
		}
		return $final;
	}

	public function getGravatar($size=150,$style="retro"){
		return "<img src='http://www.gravatar.com/avatar/".md5( strtolower( trim( $this->email  )  )  )."?d=".$style."&s=".$size."'>";
	}

	public function playerMatch($id){

		//TODO Make this fancier and use all the values from the quiz

		$classes=array(
			"Seeker",
			"Survivor",
			"Daredevil",
			"Mastermind",
			"Conqueror",
			"Socialiser",
			"Achiever"
		);
		$that = User::find($id);

		$result = 7;

		//Compare our exceptions to their classes
		error_log($result);
		if(!empty($this->brain_hex_exceptions)){
			foreach(str_split($this->brain_hex_exceptions) as $exception){
				if($that->brain_hex_primary != 'None')
					if($classes[$exception] == $that->brain_hex_primary) $result -= 2;
				if($that->brain_hex_secondary != 'None')
					if($classes[$exception] == $that->brain_hex_secondary) $result -= 1;
			}
		}
		error_log($result);
		//Compare their exceptions to our classes
		//
		if(!empty($that->brain_hex_exceptions)){
			foreach(str_split($that->brain_hex_exceptions) as $exception){
				if($this->brain_hex_primary != 'None')
					if($classes[$exception] == $this->brain_hex_primary) $result -= 2;
				if($this->brain_hex_secondary != 'None')
					if($classes[$exception] == $this->brain_hex_secondary) $result -= 1;
			}
		}
		error_log($result);
		if($this->brain_hex_primary != 'None' && $that->brain_hex_primary != 'None')
			if($this->brain_hex_primary == $that->brain_hex_primary) $result -= 2;
		if($this->brain_hex_secondary != 'None' && $that->brain_hex_secondary != 'None')
			if($this->brain_hex_secondary == $that->brain_hex_secondary) $result -= 2;
		error_log($result);

		if($this->brain_hex_primary != 'None' && $that->brain_hex_secondary != 'None')
			if($this->brain_hex_primary == $that->brain_hex_secondary) $result -= 2;
		if($this->brain_hex_secondary != 'None' && $that->brain_hex_primary != 'None')
			if($this->brain_hex_secondary == $that->brain_hex_primary) $result -= 2;
		error_log($result);

	return (floor($result/7)*100)."%";
	}
}
