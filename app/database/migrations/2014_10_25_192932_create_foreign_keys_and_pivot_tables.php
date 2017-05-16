<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysAndPivotTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * Okay, whoops. Guess I did need to manually make these.
		 * Guess Eloquent isn't as automated as I remember.
		 **/

		Schema::create('game_character',function($table){
			$table->engine='InnoDB';
			$table->increments('id')->unsigned();

			$table->integer('game_id')->unsigned();
			$table->integer('character_id')->unsigned();

			$table->timestamps();
		});

		Schema::table('characters',function($table){
			$table->integer('user_id')->unsigned();
		});

		Schema::table('character_arts',function($table){
			$table->integer('character_id')->unsigned();
		});

		Schema::table('character_sheets',function($table){
			$table->integer('character_id')->unsigned();
		});

		Schema::table('users',function($table){
			$table->text('biography')->nullable();
		});

		Schema::table('game_character',function($table){
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');

		});

		Schema::table('characters',function($table){
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});

		Schema::table('character_arts',function($table){
			$table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
		});

		Schema::table('character_sheets',function($table){
			$table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
