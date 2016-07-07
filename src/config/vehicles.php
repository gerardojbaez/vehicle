<?php 

return [

	/*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | If you want, you can replace default models from this package by models
    | you created. Have a look at `Gerardojbaez\Vehicle\Models\VehicleMake`, 
    | `Gerardojbaez\Vehicle\Models\VehicleModel` and 
    | `Gerardojbaez\Vehicle\Models\VehicleModelYears` model.
    |
    */

    'models' => [
        'VehicleMake' => Gerardojbaez\Vehicle\VehicleMake::class,
        'VehicleModel' => Gerardojbaez\Vehicle\VehicleModel::class,
        'VehicleYear' => Gerardojbaez\Vehicle\VehicleModelYear::class,
    ],

];