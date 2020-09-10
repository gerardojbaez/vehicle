<?php

namespace Fruitware\Vehicle\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Fruitware\Vehicle\Models\Vehicle;

class VehiclesController extends Controller
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
    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

    /**
     * Show vehicles list.
     *
     * @param int $make_id
     * @param int $model_id
     * @param int $year_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function vehicles($make_id, $model_id, $year_id)
    {
        $eagerLoading = [
            'make' => function($query)
            {
                $query->select('id', 'name');
            },
            'model' => function($query)
            {
                $query->select('id', 'name', 'class');
            },
            'year' => function($query)
            {
                $query->select('id', 'year');
            }
        ];

        $vehicles = $this->model->with($eagerLoading)
            ->byMake($make_id)
            ->byModel($model_id)
            ->byYear($year_id)
            ->get([
                'id',
                'name',
                'cylinders',
                'displacement',
                'drive',
                'transmission',
                'make_id',
                'model_id',
                'year_id'
            ]);

    	return response()->json([
    		'vehicles' => $vehicles
    	]);
    }

    /**
     * Show vehicle details.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function vehicle($vehicle_id)
    {
        $eagerLoading = [
            'make' => function($query)
            {
                $query->select('id', 'name');
            },
            'model' => function($query)
            {
                $query->select('id', 'name', 'class');
            },
            'year' => function($query)
            {
                $query->select('id', 'year');
            }
        ];

        $vehicle = $this->model->with($eagerLoading)->select([
            'id',
            'name',
            'cylinders',
            'displacement',
            'drive',
            'transmission',
            'make_id',
            'model_id',
            'year_id'
        ])->find($vehicle_id);

        return response()->json([
            'vehicle' => $vehicle
        ]);
    }
}
