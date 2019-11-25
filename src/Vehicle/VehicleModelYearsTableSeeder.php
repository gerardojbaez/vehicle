<?php

namespace Fruitware\Vehicle;

use Illuminate\Database\Seeder;
use Fruitware\Vehicle\Models\VehicleModelYear;

class VehicleModelYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s');
        $years = [];

        foreach ($this->years() as $year)
        {
            $years[] = array_merge($year, [
                'created_at' => $time,
                'updated_at' => $time
            ]);
        }

       	foreach (array_chunk($years, 1000) as $chunk)
        {
            VehicleModelYear::insert($chunk);
        }
    }

    /**
     * Get data to be inserted into the vehicle_model_years table.
     *
     * @return array
     */
    public function years()
    {
        return json_decode(file_get_contents(__DIR__.'/Data/years.json'), true);
    }
}
