<?php

namespace Gerardojbaez\Vehicle;

use Illuminate\Database\Seeder;
use Gerardojbaez\Vehicle\Models\VehicleModel;

class VehicleModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('Y-m-d H:i:s');
        $models = [];

        foreach ($this->models() as $model)
        {
            $models[] = array_merge($model, [
                'created_at' => $time,
                'updated_at' => $time
            ]);
        }

       	VehicleModel::insert($models);
    }

    /**
     * Get data to be inserted into the vehicle_models table.
     *
     * @return array
     */
    public function models()
    {
        return json_decode(file_get_contents(__DIR__.'/Data/models.json'), true);
    }
}
