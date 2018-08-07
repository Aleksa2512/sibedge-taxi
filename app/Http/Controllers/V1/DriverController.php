<?php

namespace App\Http\Controllers\V1;

use App\Http\Response;
use Domain\Driver\Queries\GetAllDriversQuery;
use Domain\Driver\Queries\GetDriversByOperatorSqlCountOrdersQuery;
use Domain\Driver\Transformers\DriversTransformer;
use Domain\Driver\Transformers\AllDriversTransformer;

class DriverController extends Controller
{
    use Response;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotOrders()
    {
        $drivers = $this->dispatch(new GetDriversByOperatorSqlCountOrdersQuery());

        return $this->collection($drivers, new DriversTransformer);
    }

    /**
     * @param $count
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrders($count)
    {
        $drivers = $this->dispatch(new GetDriversByOperatorSqlCountOrdersQuery('>', $count));

        return count($drivers)
            ? $this->collection($drivers, new DriversTransformer)
            : $this->message('Not Found');
    }

    public function getBySortingOrders()
    {
        $drivers = $this->dispatch(new GetAllDriversQuery());

        return $this->collection($drivers, new AllDriversTransformer);
    }
}
