<?php

class CharacterArt extends Eloquent{
	public function location(){
		return '/character_art/'.$this->location;
	}
}
