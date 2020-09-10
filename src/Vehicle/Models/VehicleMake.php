<?php

namespace Fruitware\Vehicle\Models;

use Illuminate\Database\Eloquent\Model;
use Fruitware\Vehicle\Contracts\VehicleMake as VehicleMakeContract;

class VehicleMake extends Model implements VehicleMakeContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Make has many models.
     *
     * @return mixed
     */
    public function models()
    {
    	return $this->hasMany(VehicleModel::class);
    }
}
