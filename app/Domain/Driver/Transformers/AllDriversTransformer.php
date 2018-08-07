<?php

namespace Domain\Driver\Transformers;

use App\Driver;
use League\Fractal\TransformerAbstract;

/**
 * Class GetAllDriversTransformer
 * @package Domain\Driver\Transformers
 */
class AllDriversTransformer extends TransformerAbstract
{
    /**
     * @param Driver $driver
     * @return array
     */
    public function transform(Driver $driver): array
    {
        return [
            'fio' => $driver->fio,
            //'orders' => $driver->orders->count()
        ];
    }
}
