<?php

namespace Fruitware\Vehicle\Models;

use Illuminate\Database\Eloquent\Model;
use Fruitware\Vehicle\Contracts\HasMake as HasMakeContract;
use Fruitware\Vehicle\Contracts\HasModel as HasModelContract;
use Fruitware\Vehicle\Contracts\HasModelYear as HasModelYearContract;
use Fruitware\Vehicle\Contracts\HasVehicle as HasVehicleContract;
use Fruitware\Vehicle\Contracts\Vehicle as VehicleContract;
use Fruitware\Vehicle\Traits\HasMake;
use Fruitware\Vehicle\Traits\HasModel;
use Fruitware\Vehicle\Traits\HasModelYear;
use Fruitware\Vehicle\Traits\HasVehicle;

class Vehicle extends Model implements VehicleContract
{
    use HasMake, HasModel, HasModelYear;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'make_id',
        'model_id',
        'year_id',
        'name',
        'displacement',
        'cylinders',
        'drive',
        'transmission'
    ];

    /**
     * Boot function for using with User Events.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function($model)
        {
            if ( ! $model->name) $model->attributes['name'] = $model->generateVehicleName();
        });
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
        return $query->where('year_id', $year);
    }

    /**
     * Generate vehicle name.
     *
     * @param string $format
     * @return string
     */
    public function generateVehicleName($format = "{transmission}, {drive}, {cylinders} cyl, {displacement}L")
    {
        preg_match_all("/{([^}]*)}/", $format, $placeholders);

        $replace = [];

        foreach ($placeholders[0] as $key => $value)
        {
            $replace[$value] = $this->attributes[$placeholders[1][$key]];
        }

        return str_replace(array_keys($replace), array_values($replace), $format);
    }
}
