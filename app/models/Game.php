<?php

class Game extends Eloquent{

	public function characters(){
		return $this->belongsToMany('Character','game_character')->withPivot('confirmed');
	}

	public function potential_characters(){
		return $this->characters()->where('confirmed','=','1');
	}

	public function confirmed_characters(){
		return $this->characters()->where('confirmed','=','0');
	}

	public function gameMaster(){
		return $this->belongsTo('User', 'game_master');
	}

	/**
		*  * Defines the polymophic hasMany / morphMany relationship between Post and Comment
		*   *
		*    * @return mixed
		*     */
	public function comments()
	{
		    return $this->morphMany('Fbf\LaravelComments\Comment', 'commentable');

	}
}
