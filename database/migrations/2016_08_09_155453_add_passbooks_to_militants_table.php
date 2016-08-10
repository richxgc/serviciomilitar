<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPassbooksToMilitantsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('militants', function (Blueprint $table) {
			$table->integer('passbook_issued')->unsigned()->nullable()->default(0);
			$table->integer('passbook_disabled')->unsigned()->nullable()->default(0);
			$table->integer('passbook_lost')->unsigned()->nullable()->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('militants', function (Blueprint $table) {
			$table->dropColumn('passbook_issued');
			$table->dropColumn('passbook_disabled');
			$table->dropColumn('passbook_lost');
		});
	}
}

// End of file