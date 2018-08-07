<?php

namespace App\Http\Controllers\V1;

use App\Http\Response;
use Domain\Order\Transformers\OrdersTransformer;
use Domain\Order\Queries\GetOrdersNotIsCompletedQuery;

class OrderController extends Controller
{
    use Response;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNotIsCompleted()
    {
        $orders = $this->dispatch(new GetOrdersNotIsCompletedQuery());

        return $this->collection($orders, new OrdersTransformer);
    }
}
