<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('local_board');
            $table->string('board_place');
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
    public function down()
    {
        Schema::drop('initial_lists');
    }
}
