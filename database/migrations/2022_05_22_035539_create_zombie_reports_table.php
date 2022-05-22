<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zombie_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('infected_survivor_id')->unsigned()->nullable();
            $table->foreign('infected_survivor_id')->references('id')->on('survivors');
            $table->Integer('survivor_id')->unsigned()->nullable();
            $table->foreign('survivor_id')->references('id')->on('survivors');
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
        Schema::dropIfExists('zombie_reports');
    }
};
