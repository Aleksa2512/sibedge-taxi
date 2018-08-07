<?php

namespace Domain\Car\Transformers;

use App\Car;
use League\Fractal\TransformerAbstract;

/**
 * Class GetCarsTransformer
 * @package Domain\Driver\Transformers
 */
class CarsTransformer extends TransformerAbstract
{
    /**
     * @param Car $car
     * @return array
     */
    public function transform(Car $car): array
    {
        return [
            'model' => $car->model,
            'color' => $car->color,
            'number' => $car->number
        ];
    }
}
