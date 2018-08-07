<?php

namespace Domain\Car\Queries;

use App\Car;

/**
 * Class GetCarsBetweenQuery
 * @package Domain\Driver\Queries
 */
class GetCarsBetweenQuery
{
    /**
     * @var integer
     */
    private $from;

    /**
     * @var integer
     */
    private $to;

    /**
     * GetCarsBetweenQuery constructor.
     * @param int $from
     * @param int $to
     */
    public function __construct($from = 1, $to = 4)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
    * Execute the job.
    */
    public function handle()
    {
        $cars = Car::with('drivers')->get()->filter(function ($car) {
            $count = $car->drivers->count();
            return ($count > $this->from && $count < $this->to);
        });

        return $cars;
    }
}
