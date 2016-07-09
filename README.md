# Vehicles Data for Laravel 5.2

This package allows you to work with vehicles makes, models, years and other details in
Laravel 5.2.

##### Where the data come from?

The original list was collected from www.fueleconomy.gov. (They offer XML and
CSV files). The list is updated and validated against some industry standards.

## Content

- [Installation](#installation)
	- [Composer](#composer)
	- [Service Provider](#service-provider)
	- [Config File, Migrations and Seeders](#config-file-migration-and-seeders)
	- [Traits and Contracts](#traits-and-contracts)
- [Usage](#usage)
	- [The CSV File](#the-csv-file)
	- [Models](#models)
	- [Controllers](#controllers)
	- [Routes](#routes)
- [License](#license)


## Installation

### Composer

Pull this package through Composer (file `composer.json`)

```js
{
    "require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.2.*",
        "gerardojbaez/vehicle": "1.*"
    }
}
```

Run this command inside your terminal.

	composer update

### Service Provider
Add the package to your application service providers in config/app.php file.
```php
<?php

'providers' => [

 [...]

 /**
  * Third Party Service Providers...
  */
 'Gerardojbaez\Vehicle\VehicleServiceProvider',
]
```

### Config File, Migration and Seeders

Publish package config file, migrations and seeders with the command:

	php artisan vendor:publish
	
Then run migrations.

	php artisan migrate
	
Then the vehicle seeder.

	php artisan db:seed --class VehicleTablesSeeder
	
### Traits and Contracts
When one of your models has make, model, model year and/or a vehicle you can add the required relations with the traits. 

See the following example:

```php
<?php

namespace App\Models;

// [...]
use Gerardojbaez\Vehicle\Contracts\HasMake as HasMakeContract;
use Gerardojbaez\Vehicle\Contracts\HasModel as HasModelContract;
use Gerardojbaez\Vehicle\Contracts\HasModelYear as HasModelYearContract;
use Gerardojbaez\Vehicle\Contracts\HasVehicle as HasVehicleContract;
use Gerardojbaez\Vehicle\Traits\HasMake;
use Gerardojbaez\Vehicle\Traits\HasModel;
use Gerardojbaez\Vehicle\Traits\HasModelYear;
use Gerardojbaez\Vehicle\Traits\HasVehicle;

class Vehicle extends Model implements HasMakeContract, HasModelContract, HasModelYearContract, HasVehicleContract
{
	use HasMake, HasModel, HasModelYear, HasVehicle;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'make_id',
        'model_id',
        'year_id',
        'vehicle_id',
        ...
    ];
```

> You do not need to use all traits if you do not need them. You can use only `HasMake` trait when only make is used for example.

## Usage

### The CSV file

All data is stored in a CSV file. This is done so it's easy to manage. 

File structure:

| Make 		| Model			   	| Year | cylinders	| displacement	| drive				| transmission				| class 		| 
| --------- | ----------------- | ---- | ---------- | ------------- | ----------------- | ------------------------- | ------------- |
| Acura	    | ILX				| 2017 | 4			| 2.4 			| Front-Wheel Drive | 8-Speed Automated Manual	| Compact Cars	|

#### Update the CSV file

Export to the desired location:

	php artisan vehicle:export "/path/to/exported/file.csv"

When you have done, run:

	php artisan vehicle:generate "/path/to/exported/file.csv"
	php artisan db:seed --class VehicleTablesSeeder

> The `vehicle:generate` command will generate individual files containing its own data to be used with seeders.
>> Remember to `migrate:refresh` if you have prevously seeded the database!

### Models

This package comes with `Gerardojbaez\Vehicle\Models\VehicleMake`,
`Gerardojbaez\Vehicle\Models\VehicleModel`,
`Gerardojbaez\Vehicle\Models\VehicleModelYear` and
`Gerardojbaez\Vehicle\Models\Vehicle` models.

For more information please take a look at each model.

### Controllers
It's more likely that you will want to retrieve makes, models and years from your frontend (via ajax for example); we have created these basic controllers for you:
`Gerardojbaez\Vehicle\Controllers\MakesController`, 
`Gerardojbaez\Vehicle\Controllers\ModelsController`, 
`Gerardojbaez\Vehicle\Controllers\ModelYearsController`, 
`Gerardojbaez\Vehicle\Controllers\VehicleController`. You can use these directly or extends with your own.

Controllers returns a json reponse containing (if any) the requested data.

#### Routes

This is an example. You can structure these routes as you want.

```php
<?php

// Show make list
Route::get('api/vehicles/makes', [
	'uses' => 'Gerardojbaez\Vehicle\Controllers\MakesController@makes',
	'as' => 'api.vehicles.makes'
]);

// Show make models list
Route::get('api/vehicles/{make}/models', [
	'uses' => 'Gerardojbaez\Vehicle\Controllers\ModelsController@models',
	'as' => 'api.vehicles.models'
]);

// Show model years list
Route::get('api/vehicles/{make}/{model}/years', [
	'uses' => 'Gerardojbaez\Vehicle\Controllers\ModelYearsController@years',
	'as' => 'api.vehicles.years'
]);

// Show vehicles list
Route::get('api/vehicles/{make}/{model}/{year}/vehicles', [
	'uses' => 'Gerardojbaez\Vehicle\Controllers\VehiclesController@vehicles',
	'as' => 'api.vehicles.vehicles'
]);

// Show vehicle details
Route::get('api/vehicles/{vehicle}/vehicle', [
	'uses' => 'Gerardojbaez\Vehicle\Controllers\VehiclesController@vehicle',
	'as' => 'api.vehicles.vehicle'
]);
```

## License

This package is free software distributed under the terms of the MIT license.
