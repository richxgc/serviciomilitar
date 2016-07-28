<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteMilitantsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('militants', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('curp')->unique();
			$table->string('class')->nullable();
			$table->string('enrollment')->nullable();
			$table->string('first_name');
			$table->string('last_name_a');
			$table->string('last_name_b');
			$table->string('birthday');
			$table->string('civil_state');
			$table->string('occupation');
			$table->string('literate');
			$table->string('school_degree');
			$table->string('issue_place');
			$table->string('issue_date');
			$table->string('issue_president');
			$table->integer('father_id')->unsigned()->nullable();
			$table->integer('mother_id')->unsigned()->nullable();
			$table->integer('born_id')->unsigned()->nullable();
			$table->integer('address_id')->unsigned()->nullable();
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
		Schema::drop('militants');
	}
}
