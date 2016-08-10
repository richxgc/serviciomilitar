<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassbooksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('passbooks', function (Blueprint $table) {
			$table->increments('id');
			$table->string('local_board');
			$table->string('board_place');
			$table->string('militar_zone');
			$table->string('class');
			$table->string('start_ministered');
			$table->string('end_ministered');
			$table->string('start_issued');
			$table->string('end_issued');
			$table->text('disabled');
			$table->text('lost');
			$table->string('start_leftover');
			$table->string('end_leftover');
			$table->text('equal_plus');
			$table->string('president');
			$table->string('date_place');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('passbooks');
	}
}

// End of file