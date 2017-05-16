<?php

class CharacterSheet extends Eloquent{
	public function location(){
		return '/character_sheets/'.$this->location;
	}
}
