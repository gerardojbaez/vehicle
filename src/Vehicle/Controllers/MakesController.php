<?php

namespace Gerardojbaez\Vehicle\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gerardojbaez\Vehicle\Models\VehicleMake;

class MakesController extends Controller
{
    /**
     * Model instance.
     *
     * @var mixed
     */
    public $model;

    /**
     * Create a new ModelsController instance.
     *
     * @return void
     */
    public function __construct(VehicleMake $model)
    {
        $this->model = $model;
    }

    /**
     * Show makes list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function makes()
    {
    	$makes = $this->model->orderBy('name')->get(['id', 'name']);

    	return response()->json([
    		'makes' => $makes
    	]);
    }
}
