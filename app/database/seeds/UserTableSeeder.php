<?php


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();

		for($i=0;$i<10;$i++){
			$this->make_user();
		}
		for($i=0;$i<10;$i++){
			$loc = Location::find(rand(1,10));
			$loc->user_id=rand(1,10);
			$loc->save();
		}
	}

	private function make_user(){
		$faker = Faker\Factory::create('en_US');

		$games=array(
			"Rifts",
			"World of Darkness",
			"Mutants & Masterminds",
			"Traveller",
			"Call of Cthulhu",
			"HackMaster",
			"GURPS",
			"Savage Worlds",
			"Pathfinder",
			"Apocalyse World"
		);

		do{
			$brain_hex_primary=rand(1,7);
			$brain_hex_secondary=rand(1,7);
		}while($brain_hex_primary==$brain_hex_secondary);

		$brain_hex_exceptions="";
		for($j=0;$j<rand(0,5);$j++){
			$temp = rand(0,6);
			while(strpos($brain_hex_exceptions,$temp) >= 1) $temp = rand(0,6);
			if($temp != $brain_hex_primary &&
				$temp != $brain_hex_secondary)
				$brain_hex_exceptions.=$temp;
		}

		$user = new User;

		$user -> email=$faker->unique()->email;
		$user -> username=$faker->unique()->userName;
		$user -> password=$faker->word;
		$user -> password_confirmation=$user->password;
		$user -> dob=$faker->date($format = 'Y-m-d', $max = 'now');
		$user -> location_id = rand(1,10);
		$user -> favorite_game=$games[array_rand($games)];
		$user -> brain_hex_primary=$brain_hex_primary;
		$user -> brain_hex_secondary=$brain_hex_secondary;
		$user -> brain_hex_exceptions=$brain_hex_exceptions;
		$user -> biography=$faker->realText($faker->numberBetween(100,200));
		$user -> confirmation_code = md5(uniqid(mt_rand(), true));

		if(! $user -> save()) {
			Log::info('Unable to create user '.$user->username, (array)$user->errors());
			$this->make_user();
		} else {
			Log::info('Created user "'.$user->username.'" <'.$user->email.'>');
		}
	}
}
