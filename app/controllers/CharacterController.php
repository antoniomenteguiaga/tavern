<?php

class CharacterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('characters.index',array('title'=>"Characters"));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('characters.create',array('title'=>"Create Character"));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$character = new Character();
		$character->user_id = Auth::id();
		$character->name = Input::get('name');
		$character->class = Input::get('class');
		$character->level = Input::get('level',1);
		$character->rules = Input::get('rules','None');
		$character->biography = Input::get('biography');
		$character->save();

		if(Input::hasFile('picture')){
			$file = Input::file('picture');
			if($file->isValid() && $file->getSize() <= 2000000){
				$picture = new CharacterArt();
				$picture->location = md5(Auth::id().$picture->id.$character->name).".".$file->getClientOriginalExtension();
				$picture->name = Input::get('picture_description');
				$picture->character_id = $character->id;
				$picture->save();
				$character->display_character_art = $picture->id;
				$character->save();
				$file->move(public_path().'/character_art/',$picture->location);
			}
		}

		if(Input::hasFile('sheet')){
			$file = Input::file('sheet');
			if($file->isValid() && $file->getSize() <= 2000000){
				$sheet = new CharacterSheet();
				$sheet->location = md5(Auth::id().$sheet->id.$character->name).$file->getClientOriginalExtension();
				$file->move(public_path().'/character_sheets/',$sheet->location);
				$sheet->name = Input::get('sheet_name');
				$sheet->character_id = $character->id;
				$sheet->save();
			}
		}

		return Redirect::action('CharacterController@show',array($character->id));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$character = Character::find($id);
		return View::make('characters.show',array('title'=>$character->name,'character'=>$character));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$character = Character::find($id);
		return View::make('characters.edit',array('title'=>"Edit $character->name",'character'=>$character));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
