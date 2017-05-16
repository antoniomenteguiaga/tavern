@extends('layout')
@section('content')
<div class="small-12 columns">
	<BR>
	<h2>Results</h2>
	<b>Your BrainHex Class is <a target="_blank" href="{{$results[0][0]}}"></a>{{$results[0][0]}}.</b><br>
	<img src="{{{asset('images/brainhex_icons/'.$results[0][0].$results[1][0].'.png')}}}" alt="Your BrainHex Class" class="right" hspace="4" title="Your BrainHex sub-class is . Feel free to take a copy.">

	<b>Your BrainHex Sub-Class is <a target="_blank" href="{{$results[0][0]}}"></a>{{$results[0][0]}}-<a target="_blank" href="{{$results[1][0]}}"></a></b>{{$results[1][0]}}.</br>
	<em>You like {{$results[0][1]}} as well as {{$results[1][1]}}.</em></br>
<?php
$first=true;
for($i=0;$i<sizeof($results[2]);$i++){
	if($results[2][$i] <= 0){
		if($first){
			echo "Each BrainHex Class also has an Exception, which describes what you dislike about playing games. Your Exceptions are:";
			echo "<ul>";
			$first=false;
		}
		echo "<li>".$results[3][$i][2].": ".$results[3][$i][3]."</li>";
	}
}
if($first){
	echo "According to your results, there are few play experiences that you strongly dislike.</br>";
}else{

	echo "</ul>";
}
?>
	Learn more about your classes and exceptions at <a href="http://brainhex.com" target="_blank">BrainHex.com</a>.
	Your scores for each of the classes in this test were as follows:

	@for($i=0;$i<sizeof($results[2]);$i++)
	</br>{{$results[3][$i][0]}}: {{floor($results[2][$i])*2}}
	@endfor
</div>
@stop
