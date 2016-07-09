<?php

namespace Gerardojbaez\Vehicle;

use DB;
use Illuminate\Database\Seeder;
use Gerardojbaez\Vehicle\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        $time = date('Y-m-d H:i:s');
        $vehicles = [];

        foreach ($this->vehicles() as $option)
        {
            $vehicles[] = array_merge($option, [
                'created_at' => $time,
                'updated_at' => $time
            ]);
        }

        foreach (array_chunk($vehicles, 2000) as $chunk)
        {
            Vehicle::insert($chunk);
        }
    }

    /**
     * Get data to be inserted into the vehicle_options table.
     *
     * @return array
     */
    public function vehicles()
    {
        return json_decode(file_get_contents(__DIR__.'/Data/vehicles.json'), true);
    }
}
