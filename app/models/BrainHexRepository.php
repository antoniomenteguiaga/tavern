<?php

class BrainHexRepository{

	// initialise some vars

	// Validation routines run in here

	public function calculateResults($Rate, $results){

	$class=array(
		array(
			"Seeker",
			"finding strange and wonderful things or finding familiar things",
			"No Wonder",
			"You dislike being asked to search for things, preferring clearly defined tasks. ",
			"http://blog.brainhex.com/seeker.html",

		),
		array(
			"Survivor",
			"pulse-pounding risks and escaping from hideous and scary threats",
			"No Fear",
			"You do not enjoy feeling afraid, preferring to feel safe or in control.",
			"http://blog.brainhex.com/survivor.html",
		),
		array(
			"Daredevil",
			"rushing around at heights or high speed while you are still in control",
			"No Pressure",
			"You dislike being asked to perform under pressure, preferring to take your time so you can make the right decision.",
			"http://blog.brainhex.com/daredevil.html",
		),
		array(
			"Mastermind",
			"solving puzzles and devising strategies",
			"No Problems",
			"You dislike being asked to solve puzzles or work out solutions without clear instructions.",
			"http://blog.brainhex.com/mastermind.html",
		),
		array(
			"Conqueror",
			"defeating impossibly difficult foes, struggling until you eventually achieve victory, and beating other players",
			"No Punishment",
			"You dislike struggling to overcome seemingly impossible challenges, and repeating the same task over and over again.",
			"http://blog.brainhex.com/conqueror.html",
		),
		array(
			"Socialiser",
			"hanging around with people you trust and helping people",
			"No Mercy",
			"You rarely if ever care about hurting other players' feelings - mercy is for the weak!",
			"http://blog.brainhex.com/socialiser.html",
		),
		array(
			"Achiever",
			"collecting anything you can collect or doing everything you possibly can",
			"No Commitment",
			"You dislike being asked to complete everything, preferring to pick and choose which tasks you will attempt, or simply messing around with a game.",
			"http://blog.brainhex.com/achiever.html",
		)
	);

		// Here we start the process of adding up all the responses so we know what to generate for the user's results page
		// initialise variables
		$total[0]=0;
		$total[1]=0;
		$total[2]=0;
		$total[3]=0;
		$total[4]=0;
		$total[5]=0;
		$total[6]=0;

		$Primary_result="";
		$Secondary_result="";

		// go through the first set of responses one-by-one

		$total[0] = $results['01'];
		$total[0] += $results['08'];
		$total[0] += $results['16'];

		$total[1] = $results['02'];
		$total[1] += $results['11'];
		$total[1] += $results['17'];

		$total[2] = $results['06'];
		$total[2] += $results['09'];
		$total[2] += $results['15'];

		$total[3] = $results['03'];
		$total[3] += $results['10'];
		$total[3] += $results['18'];

		$total[4] = $results['04'];
		$total[4] += $results['12'];
		$total[4] += $results['19'];

		$total[5] = $results['05'];
		$total[5] += $results['13'];
		$total[5] += $results['20'];

		$total[6] = $results['07'];
		$total[6] += $results['14'];
		$total[6] += $results['21'];

		//then add the Rate responses

		$total[0] += array_get($Rate, "Rate")[6];
		$total[1] += array_get($Rate, "Rate")[5];
		$total[2] += array_get($Rate, "Rate")[4];
		$total[3] += array_get($Rate, "Rate")[3];
		$total[4] += array_get($Rate, "Rate")[2];
		$total[5] += array_get($Rate, "Rate")[1];
		$total[6] += array_get($Rate, "Rate")[0];


		//============= Ok, now we have sorted the data, time to work out which letter code wins.

		//Tie breaking order (Left is highest priority)
		//--------------------------------------------------
		// B  F  E  G  D  C  A
		//--------------------------------------------------

		// to get round ttie issues we will add a decimal number to each
		// letter code to make it unique. So highest priority is given
		// +0.7 the next +0.6 etc

		// so we have a copy of results with no tie breaker juice added:
		// (could also use floor() to round down to nearest int (returns a float) )
		$total_copy = $total;

		// if these change, alter the field which records this in the email below
		$total[2] += .007; 
		$total[1] += .006;
		$total[5] += .005;
		$total[6] += .004;
		$total[3] += .003;
		$total[0] += .002;
		$total[4] += .001;

		// sorts array into ascending order	

		asort($total);

		// last two items in array should be first and second result,
		// but first we need to give the array index numbers

		foreach($total as $key =>$value)
		{
			$Order[] = $key;
			$Order2[] = $value;
		}

		$Primary_result= $Order[6];
		$Secondary_result=$Order[5];

		return array($class[$Primary_result], $class[$Secondary_result], $total, $class);
	}
}
