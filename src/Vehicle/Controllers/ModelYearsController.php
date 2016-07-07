<?php

namespace Gerardojbaez\Vehicle\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gerardojbaez\Vehicle\Models\VehicleModelYear;

class ModelYearsController extends Controller
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
    public function __construct(VehicleModelYear $model)
    {
        $this->model = $model;
    }

    /**
     * Show make/model years list.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function years($make, $model)
    {
    	$years = $this->model->byModel($model)
            ->orderBy('year', 'DESC')
            ->get(['id', 'year']);

    	return response()->json([
    		'years' => $years
    	]);
    }
}
