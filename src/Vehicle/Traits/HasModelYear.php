<?php 

namespace Gerardojbaez\Vehicle\Traits;

trait HasModelYear
{
	public function modelYear()
	{
		return $this->belongsTo(config('vehicles.models.VehicleYear'));
	}
}