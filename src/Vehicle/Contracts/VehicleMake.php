<?php

namespace Fruitware\Vehicle\Contracts;

interface VehicleMake
{
	/**
     * Make has many models.
     *
     * @return mixed
     */
	public function models();
}
