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
        Schema::create('survivors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200)->nullable();
            $table->string('gender', 200)->nullable();
            $table->string('latitude', 200)->nullable();
            $table->string('longitude', 200)->nullable();
            $table->integer('age')->default(0);
            $table->integer('infected_report_count')->default(0);
            $table->boolean('infected_status')->comment('1:infected,0:not infected')->default(0);
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
        Schema::dropIfExists('survivors');
    }
};
