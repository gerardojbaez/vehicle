<?php 

namespace Gerardojbaez\Vehicle\Contracts;

interface HasModel
{
	/**
	 * Belongs to one model.
	 *
	 * @return mixed
	 */
	public function model();
}