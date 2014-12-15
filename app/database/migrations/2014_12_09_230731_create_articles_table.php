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
			$table->string('title', 50)->unique();
			$table->string('slug', 50)->unique();
			$table->string('short', 50);
			$table->text('content');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('media_id');

			$table->timestamps();

		});

		Schema::table('articles', function($table){
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('media_id')->references('id')->on('medias');
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
			$table->dropForeign('articles_user_id_foreign');
			$table->dropForeign('articles_media_id_foreign');
		});

		Schema::drop('articles');
	}

}
