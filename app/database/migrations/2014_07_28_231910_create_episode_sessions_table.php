<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEpisodeSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('episode_sessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('episode_id')->references('id')->on('episodes');
            $table->integer('user_id')->references('id')->on('users');;
			$table->integer('seconds_in');
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
		Schema::drop('episode_sessions');
	}

}
