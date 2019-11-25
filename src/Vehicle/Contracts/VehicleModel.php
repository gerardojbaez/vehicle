<?php 

namespace Gerardojbaez\Vehicle\Contracts;

interface VehicleModel
{
	/**
     * Model belongs to one make.
     *
     * @return mixed
     */
	public function make();

	/**
     * Model has many years.
     *
     * @return mixed
     */
	public function years();

    /**
     * Scope by make.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $make Make id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByMake($query, $make);
}