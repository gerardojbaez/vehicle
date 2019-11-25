<?php

namespace Fruitware\Vehicle\Models;

use Illuminate\Database\Eloquent\Model;
use Fruitware\Vehicle\Contracts\VehicleModel as VehicleModelContract;

class VehicleModel extends Model implements VehicleModelContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'class',
    ];

    /**
     * Model belongs to one make.
     *
     * @return mixed
     */
    public function make()
    {
    	return $this->belongsTo(VehicleMake::class);
    }

    /**
     * Model has many years.
     *
     * @return mixed
     */
    public function years()
    {
    	return $this->belongsTo(VehicleModelYear::class);
    }

    /**
     * Scope by make.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $make Make id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByMake($query, $make)
    {
        return $query->where('make_id', $make);
    }
}
