<?php 

namespace Gerardojbaez\Vehicle\Contracts;

interface VehicleModelYear
{
	/**
	 * Year belongs to one model.
	 *
	 * @return mixed
	 */
	public function model();

	/**
	 * Model belongs to one make through model.
	 *
	 * @return mixed
	 */
	public function make();

	/**
	 * Scope by model.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param int $model Model id
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeByModel($query, $model);
}