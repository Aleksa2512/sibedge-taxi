<?php

namespace App\Http\Controllers\V1;

use App\Http\Response;
use Domain\Car\Queries\GetCarsBetweenQuery;
use Domain\Car\Transformers\CarsTransformer;

class CarController extends Controller
{
    use Response;

    /**
     * @param $from
     * @param $to
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCarsByCountBetweenDrivers($from, $to)
    {
        $cars = $this->dispatch(new GetCarsBetweenQuery($from, $to));

        return $this->collection($cars, new CarsTransformer);
    }
}
