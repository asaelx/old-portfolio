<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medias', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('title', 30);
			$table->string('url', 50);
			$table->enum('type', ['image', 'video', 'audio', 'attachement']);

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
		Schema::drop('medias');
	}

}
