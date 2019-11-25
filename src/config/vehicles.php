<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | If you want, you can replace default models from this package by models
    | you created. Have a look at `Fruitware\Vehicle\Models\VehicleMake`,
    | `Fruitware\Vehicle\Models\VehicleModel` and
    | `Fruitware\Vehicle\Models\VehicleModelYears` model.
    |
    */

    'models' => [
        'VehicleMake' => Fruitware\Vehicle\Models\VehicleMake::class,
        'VehicleModel' => Fruitware\Vehicle\Models\VehicleModel::class,
        'VehicleYear' => Fruitware\Vehicle\Models\VehicleModelYear::class,
        'vehicle' => Fruitware\Vehicle\Models\Vehicle::class,
    ],

];
