<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->integer('player1_coin');
            // $table->integer('player2_coin');
            // $table->integer('player3_coin');
            // $table->integer('player4_coin');
            // $table->integer('player1_time_used');
            // $table->integer('player2_time_used');
            // $table->integer('player3_time_used');
            // $table->integer('player4_time_used');
            // $table->integer('player1_step');
            // $table->integer('player2_step');
            // $table->integer('player3_step');
            // $table->integer('player4_step');
            // $table->integer('player1_sold');
            // $table->integer('player2_sold');
            // $table->integer('player3_sold');
            // $table->integer('player4_sold');
            // $table->string('player1_build');
            // $table->string('player2_build');
            // $table->string('player3_build');
            // $table->string('player4_build');
            $table->text('players_data')->nullable();
            $table->bigInteger('game_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rounds');
    }
}
