<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShowCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('show_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('show_id')->references('id')->on('show');
			$table->integer('category_id')->references('category')->on('categories');
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
		Schema::drop('show_categories');
	}

}
