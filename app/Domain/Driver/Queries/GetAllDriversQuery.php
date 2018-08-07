<?php

namespace Domain\Driver\Queries;

use App\Driver;

/**
 * Class GetAllDriversQuery
 * @package Domain\Driver\Queries
 */
class GetAllDriversQuery
{
    /**
    * Execute the job.
    */
    public function handle()
    {
        $drivers = Driver::with('orders')->get()->sortByDesc(function($driver) {
            return $driver->orders->count();
        });

        return $drivers;
    }
}
