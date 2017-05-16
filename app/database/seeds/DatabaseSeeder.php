<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('LocationTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('GameTableSeeder');
		$this->call('CharacterTableSeeder');
		$this->call('CharacterArtTableSeeder');
		$this->call('CharacterSheetTableSeeder');
		$this->call('CharacterGameTableSeeder');
	}

}
