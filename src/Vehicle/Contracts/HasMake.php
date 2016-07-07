<?php 

namespace Gerardojbaez\Vehicle\Contracts;

interface HasMake
{
	/**
	 * Belongs to one make.
	 *
	 * @return mixeds
	 */
	public function make();
}