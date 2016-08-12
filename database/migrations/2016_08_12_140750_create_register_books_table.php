<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_books', function (Blueprint $table) {
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
        Schema::drop('register_books');
    }
}
