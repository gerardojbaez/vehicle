<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleModelYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('vehicle_model_years', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('model_id')->unsigned();
            $table->smallInteger('year');
            $table->timestamps();

            $table->unique(['model_id', 'year']);
            $table->foreign('model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicle_model_years');
    }
}
