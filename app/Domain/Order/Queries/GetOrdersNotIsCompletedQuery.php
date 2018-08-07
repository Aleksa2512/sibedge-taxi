<?php

namespace Domain\Order\Queries;

use App\Order;

/**
 * Class GetCarsBetweenQuery
 * @package Domain\Driver\Queries
 */
class GetOrdersNotIsCompletedQuery
{
    /**
    * Execute the job.
    */
    public function handle()
    {
        $orders = Order::with('operator')->notIsCompleted()->get();

        return $orders;
    }
}
