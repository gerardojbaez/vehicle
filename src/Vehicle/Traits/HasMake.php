<?php 

namespace Gerardojbaez\Vehicle\Traits;

trait HasMake
{
	public function make()
	{
		return $this->belongsTo(config('vehicles.models.VehicleMake'));
	}
}