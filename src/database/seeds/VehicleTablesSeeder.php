<?php

use Illuminate\Database\Seeder;
use Gerardojbaez\Vehicle\VehicleMakesTableSeeder;
use Gerardojbaez\Vehicle\VehicleModelsTableSeeder;
use Gerardojbaez\Vehicle\VehicleModelYearsTableSeeder;
use Gerardojbaez\Vehicle\VehicleOptionsTableSeeder;

class VehicleTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VehicleMakesTableSeeder::class);
        $this->call(VehicleModelsTableSeeder::class);
        $this->call(VehicleModelYearsTableSeeder::class);
        $this->call(VehicleOptionsTableSeeder::class);
    }
}
