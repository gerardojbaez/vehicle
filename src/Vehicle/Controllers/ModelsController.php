<?php

namespace Fruitware\Vehicle\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Fruitware\Vehicle\Models\VehicleModel;

class ModelsController extends Controller
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
    public function __construct(VehicleModel $model)
    {
        $this->model = $model;
    }

    /**
     * Show make models list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function models($make)
    {
    	$models = $this->model->byMake($make)->orderBy('name')->get(['id', 'name', 'class']);

    	return response()->json([
    		'models' => $models
    	]);
    }
}
