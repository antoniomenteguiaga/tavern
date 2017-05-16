<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasicUserPrefs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function($table){
			$table->integer('min_party_match');
			$table->enum('sorting_option',array(
				'aa',
				'ad',
				'pa',
				'pd',
				'na',
				'nd'
			));
			$table->boolean('in_person');
			$table->boolean('online');
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
