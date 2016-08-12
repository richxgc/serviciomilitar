<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisabledLostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disabled_lost', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('local_board');
            $table->string('board_place');
            $table->string('place');
            $table->string('date');
            $table->text('persons_involved');
            $table->string('enrollment');
            $table->string('militar_zone');
            $table->string('class');
            $table->text('annotations');
            $table->string('head_office');
            $table->string('militar_zone_copy');
            $table->string('local_office');
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
        Schema::drop('disabled_lost');
    }
}
