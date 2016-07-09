<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_options', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('year_id')->unsigned();
            $table->tinyInteger('cylinders');
            $table->string('displacement');
            $table->string('drive');
            $table->string('transmission');
            $table->timestamps();

            $table->foreign('make_id')->references('id')->on('vehicle_makes')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('vehicle_model_years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicle_options');
    }
}
