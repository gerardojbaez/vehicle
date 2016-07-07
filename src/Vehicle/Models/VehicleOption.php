<?php

namespace Gerardojbaez\Vehicle\Models;

use Illuminate\Database\Eloquent\Model;
use Gerardojbaez\Vehicle\Contracts\VehicleOption as VehicleOptionContract;

class VehicleOption extends Model implements VehicleOptionContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'make_id',
        'model_id',
        'year_id',
        'displacement',
        'cylinders',
        'drive',
        'transmission'
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
     * Model belongs to one vehicle model.
     *
     * @return mixed
     */
    public function model()
    {
    	return $this->belongsTo(VehicleModel::class);
    }

    /**
     * Model belongs to one year.
     *
     * @return mixed
     */
    public function year()
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

    /**
     * Scope by model.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $model Model id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByModel($query, $model)
    {
        return $query->where('model_id', $model);
    }

    /**
     * Scope by year.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $year Year id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByYear($query, $year)
    {
        return $query->where('make_id', $year);
    }
}
