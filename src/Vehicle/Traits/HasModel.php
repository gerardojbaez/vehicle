<?php

namespace Fruitware\Vehicle\Traits;

trait HasModel
{
	public function model()
	{
		return $this->belongsTo(config('vehicles.models.VehicleModel'));
	}
}
