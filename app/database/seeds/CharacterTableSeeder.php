<?php

class CharacterTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('characters')->delete();

		$faker = Faker\Factory::create();
		$classes=array(
			"Barbarian",
			"Bard",
			"Cleric",
			"Druid",
			"Fighter",
			"Monk",
			"Paladin",
			"Ranger",
			"Rogue",
			"Sorcerer",
			"Wizard",
		);

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

		for($i=0;$i<10;$i++){
			Character::create(array(
				'user_id'=>rand(1,10),
				'name'=>$faker->name,
				'level'=>rand(1,50),
				'class'=>$classes[array_rand($classes)],
				'rules'=>$games[array_rand($games)],
				'biography'=>$faker->realText(rand(150,200))
			));
		}
	}

}
