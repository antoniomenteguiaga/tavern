<?php

class CharacterSheetTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('character_sheets')->delete();

		$faker = Faker\Factory::create();

		for($i=0;$i<10;$i++){
			CharacterSheet::create(array(
				'character_id'=>rand(1,10),
				'name'=>$faker->name,
				'location'=>$faker->md5,
				'description'=>$faker->text
			));
		}

	}

}
