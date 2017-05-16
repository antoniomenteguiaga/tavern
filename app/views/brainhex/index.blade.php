<?php 
// delete any remaining data before starting a new session
session_start(); 
session_unset(); 
?>
@extends('layout')

@section('content')
<?php
// this sets a variable we can check to make sure user went through this intro page first
$_SESSION['startedok'] = true; ?>

<div class="small-12 columns">

	@if(isset($notice))
	<div data-alert class="alert-box success">
		{{{$notice}}}
		<a href="#" class="close">&times;</a>
	</div>
	@else
	<div data-alert class="alert-box warning">
		New user not created correctly.
		<a href="#" class="close">&times;</a>
	</div>
	@endif
	<A NAME="top"></A>
	<h2>Welcome to the BrainHex questionnaire!</h2>
	<img src="{{{asset('images/brainhex/BrainHex.png')}}}" alt="BrainHex" width="300" height="300" hspace="5" vspace="2" border="0" align="right">
	Find out your BrainHex class by answering the following videogame-related questions, and help International Hobo study the reasons why players enjoy different gaming experiences in this new survey and player satisfaction model.
	<P>
	(Although this survey is mostly interested in videogame players, even if you don't play many videogames we are still interested in your results!)
	<P>
	There are 4 pages of questions about your videogame preferences.
	<P>
	When you have finished, we will tell you your BrainHex class. You can then go to <a href="http://brainhex.com/">BrainHex.com</a> to read about your class and tell us why we're right or wrong about you.
	<div class="row">
		<div class="small-10 columns">
{{link_to_action('BrainHexController@getQuiz',"Click here to begin",null,array("class"=>"button expand"))}}
		</div>
		<div class="small-2 columns">
			<a href="http://blog.ihobo.com/"><IMG SRC="{{{asset('images/brainhex/ihobologo.jpg')}}}" ALT="International Hobo - Logo" BORDER="0" ALIGN="middle" class="right"><a>
		</div>
	</div>

	<br clear="all">
</div>
@stop
