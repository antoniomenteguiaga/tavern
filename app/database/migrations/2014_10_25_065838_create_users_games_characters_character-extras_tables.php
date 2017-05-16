<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersGamesCharactersCharacterExtrasTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations',function($table){
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->integer('zip')->nullable();
			$table->string('country')->nullable();
			$table->timestamps();
		});

		// Creates the users table
		Schema::create('users', function ($table) {
			$table->engine='InnoDB';
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->integer('location_id')->unsigned();
			$table->string('confirmation_code');
			$table->string('remember_token')->nullable();
			$table->boolean('confirmed')->default(false);
			$table->timestamps();
		});

		// Creates password reminders table
		Schema::create('password_reminders', function ($table) {
			$table->string('email');
			$table->string('token');
			$table->timestamp('created_at');
		});


		Schema::table('users',function($table){
			$classes=array(
				"None",
				"Seeker",
				"Survivor",
				"Daredevil",
				"Mastermind",
				"Conqueror",
				"Socialiser",
				"Achiever"
			);

			//User geolocation
			$table->foreign('location_id')->references('id')->on('locations')->onDelete('CASCADE');

			//User personal info
			$table->date('dob');
			$table->string('favorite_game')->nullable();
			$table->enum('brain_hex_primary',$classes)->nullable();
			$table->enum('brain_hex_secondary',$classes)->nullable();
			$table->string('brain_hex_exceptions')->nullable();

			//On the map, characters is listed as part of users.
			//This isn't on the migration because its part of
			//the eloquent model instead.

			//BrainHexExceptions is listed as an array which is why
			//it is a string here, as a work around since everything
			//in php is a string anyway I can iterate through the
			//exceptions string integer by integer since theres
			//only 8 brainhex types.

		});

		Schema::create('characters',function($table){
			$table->engine='InnoDB';

			$table->increments('id')->unsigned();

			$table->string('name');
			$table->string('class')->nullable();
			$table->integer('level');
			$table->string('rules');
			$table->integer('display_character_art')->unsigned()->nullable();
			$table->text('biography')->nullable();

			$table->timestamps();

			/**
			 * Not listed from the map:
			 * 
			 * - gameHistory
			 * - owner
			 * - characterArt
			 * - characterSheets
			 *
			 * They are all covered by eloquent in some way.
			 **/
		});

		Schema::create('games',function($table){
			$table->engine='InnoDB';

			$table->increments('id')->unsigned();
			$table->integer('game_master')->unsigned();
			$table->integer('location_id')->unsigned();

			$table->string('game_title');
			$table->string('rules_title');
			$table->string('genre')->nullable();

			$table->text('description')->nullable();

			$table->integer('curr_players');
			$table->integer('max_players')->nullable();
			$table->integer('starting_level')->nullable();

			$table->timestamp('next_game');


			//Game geolocation

			$table->timestamps();

			/**
			 * Not listed from the map:
			 * 
			 * - party
			 *
			 * They are all covered by eloquent in some way.
			 **/
		});

		Schema::create('character_arts',function($table){
			$table->engine='InnoDB';

			$table->increments('id')->unsigned();

			$table->string('name');
			$table->string('location');

			$table->timestamps();
		});

		Schema::create('character_sheets',function($table){
			$table->engine='InnoDB';

			$table->increments('id')->unsigned();

			$table->string('name');
			$table->string('location');
			$table->text('description');

			$table->timestamps();
		});

		Schema::table('locations',function($table){
			$table->foreign('user_id')->references('id')->on('users');
		});

		Schema::table('characters',function($table){
			$table->foreign('display_character_art')->references('id')->on('character_arts');
		});

		Schema::table('games',function($table){
			$table->foreign('location_id')->references('id')->on('locations');
			$table->foreign('game_master')->references('id')->on('users')->onDelete('CASCADE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('characters');
		Schema::drop('games');
		Schema::drop('character_arts');
		Schema::drop('character_sheets');
		Schema::drop('password_reminders');
	}

}
