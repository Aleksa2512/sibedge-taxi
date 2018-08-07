<?php

namespace Domain\Order\Transformers;

use App\Order;
use League\Fractal\TransformerAbstract;

/**
 * Class OrdersTransformer
 * @package Domain\Car\Transformers
 */
class OrdersTransformer extends TransformerAbstract
{
    /**
     * @param Order $order
     * @return array
     */
    public function transform(Order $order): array
    {
        return [
            //'address_start' => $order->address_start,
            'address_finish' => $order->address_finish,
            'operator' => $order->operator->fio
        ];
    }
}
