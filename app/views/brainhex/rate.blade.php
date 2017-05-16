@extends('layout')
@section('header')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
@stop
@section('content')
<div class="small-12 columns">

	<!-- Content start -->
	<A NAME="top"></A>



	<!-- questions section start -->

	{{Form::open(array('action'=>'BrainHexController@postRate'))}}

	<INPUT TYPE="hidden" NAME="recipient" VALUE="1">
	<INPUT TYPE="hidden" NAME="subject" VALUE="BrainHex Questionnaire">


	<h2>Part 3: Rate</h2>

	<div class="medium-5 columns">
		<strong>Instructions</strong>
		<P>
		Please read through the following seven statements.<br>
		Place them in order of preference by choosing the highest number for the most preferred statement to the lowest number for the least preferred.
		</P>
	</div>
	<div class="medium-7 columns">
		<center>
			<u><strong>Please list the seven statements in order of preference, choosing each number only once</strong></u>
		</center>
		<ul class="no-bullet" id="sortable">
			<li class="button small expand" id="Rate_1">A moment of jaw-dropping wonder or beauty.</li>
			<li class="button small expand" id="Rate_2">An experience of primeval terror that blows your mind.</li>
			<li class="button small expand" id="Rate_3">A moment of breathtaking speed or vertigo.</li>
			<li class="button small expand" id="Rate_4">The moment when the solution to a difficult puzzle clicks in your mind.</li>
			<li class="button small expand" id="Rate_5">A moment of hard-fought victory.</li>
			<li class="button small expand" id="Rate_6">A moment when you feel an intense sense of unity with another player.</li>
			<li class="button small expand" id="Rate_7">A moment of completeness that you have strived for.</li>
		</ul>
		<input type="hidden" name="rate" id="rate" value="-1">
	</div>

	<!-- Section ends -->

	<input type="submit" class="button expand" id="submit" value="See your results!" name="Submit">
	{{Form::close()}}

</div>	
<!-- questions section end -->
<script>
$(document).ready(function(){
	$('#sortable').sortable({
		axis:"y",
		update: function(){
			$('#rate').val($(this).sortable('serialize'));
		}
	});
	$('#sortable').disableSelection();
	$('#rate').val($('#sortable').sortable('serialize'));
});
</script>
@stop
