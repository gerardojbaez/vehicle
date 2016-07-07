<?php 

namespace Gerardojbaez\Vehicle\Contracts;

interface VehicleOption
{
	/**
     * Model belongs to one make.
     *
     * @return mixed
     */
	public function make();

	/**
     * Model belongs to one vehicle model.
     *
     * @return mixed
     */
	public function model();

     /**
     * Model belongs to one year.
     *
     * @return mixed
     */
     public function year();

     /**
     * Scope by make.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $make Make id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByMake($query, $make);

    /**
     * Scope by model.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $model Model id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByModel($query, $model);

    /**
     * Scope by year.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $year Year id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByYear($query, $year);
}