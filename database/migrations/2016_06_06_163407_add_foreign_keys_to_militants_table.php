<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMilitantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('militants', function (Blueprint $table) {
            $table->foreign('father_id')->references('id')->on('family')->onDelete('cascade');
            $table->foreign('mother_id')->references('id')->on('family')->onDelete('cascade');
            $table->foreign('born_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('militants', function (Blueprint $table) {
            $table->dropForeign(['father_id', 'mother_id', 'born_id', 'address_id']);
        });
    }
}
