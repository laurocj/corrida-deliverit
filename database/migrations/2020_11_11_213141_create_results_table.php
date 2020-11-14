<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->time('start');
            $table->time('finish');

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
        Schema::dropIfExists('results');
    }
}
