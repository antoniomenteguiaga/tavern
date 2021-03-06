<?php session_start(); ?>
@extends('layout')
@section('header')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.13/slick.css"/>
@stop

@section('content')

<div class="small-12 columns">

	<!-- questions section start -->

{{Form::open(array('action'=>'BrainHexController@postQuiz'))}}


		<h2 id="question_text">Question <span id="question_number">0</span> out of 21</h2>
		<div class="quiz-slider">
			<div>
				<h2>Quiz - Part 1</h2>
				<div class="instructions">
					<strong>Instructions</strong>

					<p>This is the second of 4 pages and asks you to rate each videogame experience listed. Choose from a scale between "I love it!" for experiences you enjoy through "It's okay" to  "I hate it!" for experiences you would rather avoid.</p>
				</div>	  

			</div>

			<div>
				<strong>"Exploring to see what you can find."</strong>
				<br>
				<input required TYPE="radio" NAME="Quiz[01]" value="1" id="Quiz01 I love it" ><label for="Quiz01 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[01]" value=".5" id="Quiz01 I like it" ><label for="Quiz01 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[01]" value="0" id="Quiz01 It's okay" ><label for="Quiz01 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[01]" value="-1" id="Quiz01 I dislike it" ><label for="Quiz01 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[01]" value="-2" id="Quiz01 I hate it" ><label for="Quiz01 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Frantically escaping from a terrifying foe."</strong><br>
				<input required TYPE="radio" NAME="Quiz[02]" value="1" id="Quiz02 I love it" ><label for="Quiz02 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[02]" value=".5" id="Quiz02 I like it" ><label for="Quiz02 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[02]" value="0" id="Quiz02 It's okay" ><label for="Quiz02 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[02]" value="-1" id="Quiz02 I dislike it" ><label for="Quiz02 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[02]" value="-2" id="Quiz02 I hate it" ><label for="Quiz02 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Working out how to crack a challenging puzzle."</strong><br>
				<input required TYPE="radio" NAME="Quiz[03]" value="1" id="Quiz03 I love it" ><label for="Quiz03 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[03]" value=".5" id="Quiz03 I like it" ><label for="Quiz03 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[03]" value="0" id="Quiz03 It's okay" ><label for="Quiz03 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[03]" value="-1" id="Quiz03 I dislike it" ><label for="Quiz03 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[03]" value="-2" id="Quiz03 I hate it" ><label for="Quiz03 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"The struggle to defeat a difficult boss."</strong><br>
				<input required TYPE="radio" NAME="Quiz[04]" value="1" id="Quiz04 I love it" ><label for="Quiz04 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[04]" value=".5" id="Quiz04 I like it" ><label for="Quiz04 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[04]" value="0" id="Quiz04 It's okay" ><label for="Quiz04 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[04]" value="-1" id="Quiz04 I dislike it" ><label for="Quiz04 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[04]" value="-2" id="Quiz04 I hate it" ><label for="Quiz04 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Playing in a group, online or in the same room."</strong><br>
				<input required TYPE="radio" NAME="Quiz[05]" value="1" id="Quiz05 I love it" ><label for="Quiz05 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[05]" value=".5" id="Quiz05 I like it" ><label for="Quiz05 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[05]" value="0" id="Quiz05 It's okay" ><label for="Quiz05 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[05]" value="-1" id="Quiz05 I dislike it" ><label for="Quiz05 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[05]" value="-2" id="Quiz05 I hate it" ><label for="Quiz05 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Responding quickly to an exciting situation."</strong><br>
				<input required TYPE="radio" NAME="Quiz[06]" value="1" id="Quiz06 I love it" ><label for="Quiz06 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[06]" value=".5" id="Quiz06 I like it" ><label for="Quiz06 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[06]" value="0" id="Quiz06 It's okay" ><label for="Quiz06 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[06]" value="-1" id="Quiz06 I dislike it" ><label for="Quiz06 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[06]" value="-2" id="Quiz06 I hate it" ><label for="Quiz06 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Picking up every single collectible in an area."</strong><br>
				<input required TYPE="radio" NAME="Quiz[07]" value="1" id="Quiz07 I love it" ><label for="Quiz07 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[07]" value=".5" id="Quiz07 I like it" ><label for="Quiz07 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[07]" value="0" id="Quiz07 It's okay" ><label for="Quiz07 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[07]" value="-1" id="Quiz07 I dislike it" ><label for="Quiz07 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[07]" value="-2" id="Quiz07 I hate it" ><label for="Quiz07 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Looking around just to enjoy the scenery."</strong><br>
				<input required TYPE="radio" NAME="Quiz[08]" value="1" id="Quiz08 I love it" ><label for="Quiz08 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[08]" value=".5" id="Quiz08 I like it" ><label for="Quiz08 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[08]" value="0" id="Quiz08 It's okay" ><label for="Quiz08 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[08]" value="-1" id="Quiz08 I dislike it" ><label for="Quiz08 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[08]" value="-2" id="Quiz08 I hate it" ><label for="Quiz08 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Being in control at high speed."</strong><br>
				<input required TYPE="radio" NAME="Quiz[09]" value="1" id="Quiz09 I love it" ><label for="Quiz09 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[09]" value=".5" id="Quiz09 I like it" ><label for="Quiz09 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[09]" value="0" id="Quiz09 It's okay" ><label for="Quiz09 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[09]" value="-1" id="Quiz09 I dislike it" ><label for="Quiz09 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[09]" value="-2" id="Quiz09 I hate it" ><label for="Quiz09 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Devising a promising strategy when deciding what to try next."</strong><br>
				<input required TYPE="radio" NAME="Quiz[10]" value="1" id="Quiz10 I love it" ><label for="Quiz10 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[10]" value=".5" id="Quiz10 I like it" ><label for="Quiz10 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[10]" value="0" id="Quiz10 It's okay" ><label for="Quiz10 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[10]" value="-1" id="Quiz10 I dislike it" ><label for="Quiz10 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[10]" value="-2" id="Quiz10 I hate it" ><label for="Quiz10 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Feeling relief when you escape to a safe area."</strong><br>
				<input required TYPE="radio" NAME="Quiz[11]" value="1" id="Quiz11 I love it" ><label for="Quiz11 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[11]" value=".5" id="Quiz11 I like it" ><label for="Quiz11 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[11]" value="0" id="Quiz11 It's okay" ><label for="Quiz11 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[11]" value="-1" id="Quiz11 I dislike it" ><label for="Quiz11 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[11]" value="-2" id="Quiz11 I hate it" ><label for="Quiz11 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Taking on a strong opponent when playing against a human player in a versus match."</strong><br>
				<input required TYPE="radio" NAME="Quiz[12]" value="1" id="Quiz12 I love it" ><label for="Quiz12 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[12]" value=".5" id="Quiz12 I like it" ><label for="Quiz12 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[12]" value="0" id="Quiz12 It's okay" ><label for="Quiz12 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[12]" value="-1" id="Quiz12 I dislike it" ><label for="Quiz12 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[12]" value="-2" id="Quiz12 I hate it" ><label for="Quiz12 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Talking with other players, online or in the same room."</strong><br>
				<input required TYPE="radio" NAME="Quiz[13]" value="1" id="Quiz13 I love it" ><label for="Quiz13 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[13]" value=".5" id="Quiz13 I like it" ><label for="Quiz13 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[13]" value="0" id="Quiz13 It's okay" ><label for="Quiz13 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[13]" value="-1" id="Quiz13 I dislike it" ><label for="Quiz13 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[13]" value="-2" id="Quiz13 I hate it" ><label for="Quiz13 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Finding what you need to complete a collection."</strong><br>
				<input required TYPE="radio" NAME="Quiz[14]" value="1" id="Quiz14 I love it" ><label for="Quiz14 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[14]" value=".5" id="Quiz14 I like it" ><label for="Quiz14 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[14]" value="0" id="Quiz14 It's okay" ><label for="Quiz14 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[14]" value="-1" id="Quiz14 I dislike it" ><label for="Quiz14 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[14]" value="-2" id="Quiz14 I hate it" ><label for="Quiz14 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Hanging from a high ledge."</strong><br>
				<input required TYPE="radio" NAME="Quiz[15]" value="1" id="Quiz15 I love it" ><label for="Quiz15 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[15]" value=".5" id="Quiz15 I like it" ><label for="Quiz15 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[15]" value="0" id="Quiz15 It's okay" ><label for="Quiz15 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[15]" value="-1" id="Quiz15 I dislike it" ><label for="Quiz15 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[15]" value="-2" id="Quiz15 I hate it" ><label for="Quiz15 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Wondering what's behind a locked door."</strong><br>
				<input required TYPE="radio" NAME="Quiz[16]" value="1" id="Quiz16 I love it" ><label for="Quiz16 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[16]" value=".5" id="Quiz16 I like it" ><label for="Quiz16 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[16]" value="0" id="Quiz16 It's okay" ><label for="Quiz16 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[16]" value="-1" id="Quiz16 I dislike it" ><label for="Quiz16 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[16]" value="-2" id="Quiz16 I hate it" ><label for="Quiz16 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Feeling scared, terrified or disturbed."</strong><br>
				<input required TYPE="radio" NAME="Quiz[17]" value="1" id="Quiz17 I love it" ><label for="Quiz17 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[17]" value=".5" id="Quiz17 I like it" ><label for="Quiz17 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[17]" value="0" id="Quiz17 It's okay" ><label for="Quiz17 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[17]" value="-1" id="Quiz17 I dislike it" ><label for="Quiz17 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[17]" value="-2" id="Quiz17 I hate it" ><label for="Quiz17 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Working out what to do on your own."</strong><br>
				<input required TYPE="radio" NAME="Quiz[18]" value="1" id="Quiz18 I love it" ><label for="Quiz18 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[18]" value=".5" id="Quiz18 I like it" ><label for="Quiz18 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[18]" value="0" id="Quiz18 It's okay" ><label for="Quiz18 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[18]" value="-1" id="Quiz18 I dislike it" ><label for="Quiz18 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[18]" value="-2" id="Quiz18 I hate it" ><label for="Quiz18 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Completing a punishing challenge after failing many times."</strong><br>
				<input required TYPE="radio" NAME="Quiz[19]" value="1" id="Quiz19 I love it" ><label for="Quiz19 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[19]" value="1" id="Quiz19 I like it" ><label for="Quiz19 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[19]" value="0" id="Quiz19 It's okay" ><label for="Quiz19 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[19]" value="-1" id="Quiz19 I dislike it" ><label for="Quiz19 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[19]" value="-2" id="Quiz19 I hate it" ><label for="Quiz19 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Co-operating with strangers."</strong><br>
				<input required TYPE="radio" NAME="Quiz[20]" value="1" id="Quiz20 I love it" ><label for="Quiz20 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[20]" value=".5" id="Quiz20 I like it" ><label for="Quiz20 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[20]" value="0" id="Quiz20 It's okay" ><label for="Quiz20 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[20]" value="-1" id="Quiz20 I dislike it" ><label for="Quiz20 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[20]" value="-2" id="Quiz20 I hate it" ><label for="Quiz20 I hate it">I hate it!</label><br>
			</div>

			<div>
				<strong>"Getting 100% (completing <em>everything</em> in a game)."</strong><br>
				<input required TYPE="radio" NAME="Quiz[21]" value="1" id="Quiz21 I love it" ><label for="Quiz21 I love it">I love it!</label><br>
				<input required TYPE="radio" NAME="Quiz[21]" value=".5" id="Quiz21 I like it" ><label for="Quiz21 I like it">I like it.</label><br>
				<input required TYPE="radio" NAME="Quiz[21]" value="0" id="Quiz21 It's okay" ><label for="Quiz21 It's okay">It's okay.</label><br>
				<input required TYPE="radio" NAME="Quiz[21]" value="-1" id="Quiz21 I dislike it" ><label for="Quiz21 I dislike it">I dislike it.</label><br>
				<input required TYPE="radio" NAME="Quiz[21]" value="-2" id="Quiz21 I hate it" ><label for="Quiz21 I hate it">I hate it!</label><br>
			</div>

			<div>
				<h2>You're done!</h2>
				<p>Go ahead and click the button to see your results and update your profile with your new information.</p>
				<input type="submit" id="submit" name="Submit" class="button expand]" value="Continue to Step 2">
			</div>

		</div>
		<div class="row">
			<div class="small-6 columns">
				<button id="prev_arrow" onclick="event.preventDefault()">&#8672; Prev</button>
			</div>
			<div class="small-6 columns">
				<button id="next_arrow" onclick="event.preventDefault()" class="right">Next &#8674;</button>
			</div>
		</div>
{{Form::close()}}
</div>
<!-- questions section end -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.13/slick.min.js"></script>
<script>
$(document).ready(function(){
	$('.quiz-slider').slick(
		{
			accessibility: false,
				dots: true,
				prevArrow: $('#prev_arrow'),
	nextArrow: $('#next_arrow'),
	draggable: false,
	infinite: false,
	onAfterChange: function(slider, index){
		if(slider.currentSlide === 0){
			$('#prev_arrow').hide();	
			$("#question_text").hide();
		}else if(slider.currentSlide === 22){
			$('#next_arrow').hide();
			$("#question_text").hide();
		}else{
			$("#prev_arrow").show();
			$("#next_arrow").show();
			$("#question_text").show();
		}
		$('#question_number').text(slider.currentSlide);
	},
		onInit: function(){
			$("#question_text").hide();
			$('#prev_arrow').hide();	
		}
		}
	);

	$("input").click(function(){
		$('.quiz-slider').slickNext();
	});
	$('#submit').click(function(){
			$('#prev_arrow').hide();	
			$('#next_arrow').hide();
			$("#question_text").hide();
		$('.quiz').unslick();
	});
});
</script>
@stop
