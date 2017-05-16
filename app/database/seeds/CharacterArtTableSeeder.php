<?php

class CharacterArtTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('character_arts')->delete();

		$faker = Faker\Factory::create();

		for($i=0;$i<10;$i++){
			CharacterArt::create(array(
				'character_id'=>rand(1,10),
				'name'=>$faker->name,
				'location'=>$faker->md5
			));
		}

	}

}
