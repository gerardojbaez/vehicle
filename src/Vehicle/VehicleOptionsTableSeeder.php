<?php

namespace Gerardojbaez\Vehicle;

use DB;
use Illuminate\Database\Seeder;
use Gerardojbaez\Vehicle\Models\VehicleOption;

class VehicleOptionsTableSeeder extends Seeder
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
        $options = [];

        foreach ($this->options() as $option)
        {
            $options[] = array_merge($option, [
                'created_at' => $time,
                'updated_at' => $time
            ]);
        }

        foreach (array_chunk($options, 2000) as $chunk)
        {
            VehicleOption::insert($chunk);
        }
    }

    /**
     * Get data to be inserted into the vehicle_options table.
     *
     * @return array
     */
    public function options()
    {
        return json_decode(file_get_contents(__DIR__.'/Data/options.json'), true);
    }
}
