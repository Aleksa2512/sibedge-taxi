<?php

namespace App\Domain\Worker\Queries;


use App\Driver;
use App\Operator;

class GetAllWorkersQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        $drivers = Driver::all();
        $operators = Operator::all();

        $workers = $drivers->merge($operators);

        return $workers;
    }
}