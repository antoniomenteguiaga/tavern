<?php

class CharacterGameTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('game_character')->delete();



		for($i=0;$i<10;$i++){
			DB::table('game_character')->insert(
				array(
					'game_id'=>rand(1,10),
					'character_id'=>rand(1,10)
				)
			);
		}

	}

}
