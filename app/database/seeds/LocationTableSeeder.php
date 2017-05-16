<?php


class LocationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('locations')->delete();

		for($i=0;$i<10;$i++){
			$this->make_user();
		}
	}

	private function make_user(){
		$faker = Faker\Factory::create('en_US');

		$user = new Location;

		$user -> address=$faker->streetAddress;
		$user -> city=$faker->city;
		$user -> state=$faker->state;
		$user -> zip=$faker->postcode;
		$user -> country=$faker->country;



		if(! $user -> save()) {
			Log::info('Unable to create location '.$user->username, (array)$user->errors());
			$this->make_user();
		} else {
			Log::info('Created user "'.$user->username.'" <'.$user->email.'>');

		}
	}
}
