<?php

use Illuminate\Database\Seeder;
use Fruitware\Vehicle\VehicleMakesTableSeeder;
use Fruitware\Vehicle\VehicleModelsTableSeeder;
use Fruitware\Vehicle\VehicleModelYearsTableSeeder;
use Fruitware\Vehicle\VehiclesTableSeeder;

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
        $this->call(VehiclesTableSeeder::class);
    }
}
