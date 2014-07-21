<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpisodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('episodes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('show_id')->unsigned()->references('id')->on('shows');
			$table->string('name');
			$table->text('description');
			$table->text('src');
			$table->string('image_src')->nullable();
			$table->tinyInteger('status');
            $table->dateTime('published_at');
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
		Schema::drop('episodes');
	}

}
