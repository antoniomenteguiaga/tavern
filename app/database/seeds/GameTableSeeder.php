<?php

class GameTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('games')->delete();

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

		$genres=array(
			"Fantasy",
			"Cyberpunk",
			"Modern",
			"Parody",
			"Anime"
		);


		for($i=0;$i<10;$i++){
			$max_players=rand(0,20);
			$curr_players=rand(0,$max_players);
			Game::create(array(
				'game_title'=>$faker->realText($faker->numberBetween(10,20)),
				'rules_title'=>$games[array_rand($games)],
				'genre'=>$genres[array_rand($genres)],
				'max_players'=>$max_players,
				'curr_players'=>$curr_players,
				'starting_level'=>rand(1,20),
				'game_master'=>rand(1,10),
				'location_id'=>rand(1,10),
				'description'=>$faker->realText($faker->numberBetween(150,200)),
				'next_game'=>$faker->date($format = 'Y-m-d', $max = 'now')
			));
		}

	}

}
