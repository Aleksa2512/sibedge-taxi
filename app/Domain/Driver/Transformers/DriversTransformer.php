<?php

namespace Domain\Driver\Transformers;

use App\Driver;
use League\Fractal\TransformerAbstract;

/**
 * Class DriversTransformer
 * @package Domain\Driver\Transformers
 */
class DriversTransformer extends TransformerAbstract
{
    /**
     * @param Driver $driver
     * @return array
     */
    public function transform(Driver $driver): array
    {
        return [
            'fio' => $driver->fio,
            'position' => $driver->position
        ];
    }
}
