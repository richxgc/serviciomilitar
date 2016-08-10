<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinutesDrawTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('minutes_draw', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('class');
			$table->string('place_draw');
			$table->string('date_draw');
			$table->text('persons_involved');
			$table->text('soldiers_involved');
			$table->string('kid');
			$table->string('head_office');
			$table->string('local_office');
			$table->string('local_board');
			$table->string('militar_zone');
			$table->integer('total_militants');
			$table->integer('absence_militants');
			$table->integer('white_militants');
			$table->integer('black_militants');
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
		Schema::drop('minutes_draw');
	}
}
