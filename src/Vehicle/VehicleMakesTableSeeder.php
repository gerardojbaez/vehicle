<?php

namespace Gerardojbaez\Vehicle;

use Illuminate\Database\Seeder;
use Gerardojbaez\Vehicle\Models\VehicleMake;

class VehicleMakesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s');
        $makes = [];

        foreach ($this->makes() as $make)
        {
            $makes[] = array_merge($make, [
                'created_at' => $time,
                'updated_at' => $time
            ]);
        }

       	VehicleMake::insert($makes);
    }

    /**
     * Get data to be inserted into the vehicle_makes table.
     *
     * @return array
     */
    public function makes()
    {
        return json_decode(file_get_contents(__DIR__.'/Data/makes.json'), true);
    }
}
