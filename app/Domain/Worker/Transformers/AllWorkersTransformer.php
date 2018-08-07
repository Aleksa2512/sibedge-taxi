<?php

namespace Domain\Worker\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class AllWorkersTransformer
 * @package Domain\Driver\Transformers
 */
class AllWorkersTransformer extends TransformerAbstract
{
    /**
     * @param $worker
     * @return array
     */
    public function transform($worker): array
    {
        return [
            'fio' => $worker->fio,
            'position' => $worker->position
        ];
    }
}
