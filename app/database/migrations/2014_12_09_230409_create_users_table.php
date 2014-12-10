<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('username', 16);
			$table->string('name', 30);
			$table->string('bg', 100);
			$table->string('photo', 100);
			$table->string('location', 30);
			$table->string('bio', 160);
			$table->string('twitter_token');
			$table->string('twitter_secret');
			$table->rememberToken();

			$table->timestamps();

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
	}

}
