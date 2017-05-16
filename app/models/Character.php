<?php

class Character extends Eloquent{

	public function characterArts(){
		return $this->hasMany('CharacterArt');
	}

	public function characterSheets(){
		return $this->hasMany('CharacterSheet');
	}

	public function user(){
		return $this->belongsTo('User');
	}

	public function gameHistory(){
		return $this->belongsToMany('Game','game_character');
	}

	public function displayArt(){
		if(!empty($this->display_character_art)){
		$char = CharacterArt::find($this->display_character_art);
		return "<img src='".asset($char->location())."'>";

		}

		return $this->user->getGravatar();

	}
}
