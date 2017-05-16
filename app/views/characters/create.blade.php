@extends('layout')

@section('content')
<h1>Check in a new character</h1>
{{Form::open(array('action'=>array('CharacterController@store'),"files"=>true))}}
	<div class="medium-6 columns">
		<label>Name<small>Required</small></label><input required type="text" name="name">
		<label>Class</label><input type="text" name="class">
		<div class="row">
			<div class="medium-6 columns">
				<label>Got a picture?<small>2MB limit</small></label>
 {{ Form::file('picture','',array('id'=>'','class'=>''))  }}
				<label>Describe your picture</label><input type="text" name="picture_description">
			</div>
			<div class="medium-6 columns">
				<label>Got a character sheet?<small>2MB limit</small></label><input type="file" name="sheet">
				<label>Describe your character sheet</label><input type="text" name="sheet_name">
			</div>
		</div>
	</div>
	<div class="medium-6 columns">
		<label>Tell us a bit about yourself <small>Markdown supported</small></label><textarea rows="11" name="biography"></textarea>
	</div>
	<div class="small-12 columns">
		<input type="submit" class="button expand">
	</div>
{{Form::close()}}
@stop
