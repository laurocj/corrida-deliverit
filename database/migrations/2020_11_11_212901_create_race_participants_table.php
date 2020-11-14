<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_participants', function (Blueprint $table) {
            $table->id();

            $table->time('start')->nullable();
            $table->time('finish')->nullable();
            $table->time('duration')->nullable();

            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('racing_id');
            $table->timestamps();

            $table->foreign('participant_id')->references('id')->on('participants');
            $table->foreign('racing_id')->references('id')->on('racings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('race_participants');
    }
}
