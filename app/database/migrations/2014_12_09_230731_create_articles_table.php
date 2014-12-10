<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('title', 50);
			$table->string('slug', 50);
			$table->text('content');
			$table->unsignedInteger('user');
			$table->unsignedInteger('media');

			$table->timestamps();

		});

		Schema::table('articles', function($table){
			$table->foreign('user')->references('id')->on('users');
			$table->foreign('media')->references('id')->on('medias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('articles', function($table){
			$table->dropForeign('articles_user_foreign');
			$table->dropForeign('articles_media_foreign');
		});

		Schema::drop('articles');
	}

}
