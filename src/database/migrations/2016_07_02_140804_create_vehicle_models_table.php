<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_models', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('make_id')->unsigned();
            $table->string('name');
            $table->string('class');
            $table->timestamps();

            $table->foreign('make_id')->references('id')->on('vehicle_makes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicle_models');
    }
}
