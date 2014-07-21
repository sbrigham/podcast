<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shows', function(Blueprint $table) {
			$table->increments('id');
            $table->string('feed_url');
			$table->string('name');
			$table->text('description');
			$table->string('image_src');
			$table->tinyInteger('finite_feed');
            $table->dateTime('last_build_date')->nullable();
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
		Schema::drop('shows');
	}

}
