<?php

namespace Domain\Driver\Queries;

use App\Driver;

/**
 * Class GetDriversNotOrdersQuery
 * @package Domain\Driver\Queries
 */
class GetDriversByOperatorSqlCountOrdersQuery
{

    /**
     * @var int
     */
    private $count;

    /**
     * @var string
     */
    private $operator;

    /**
     * GetDriversByCountOrdersQuery constructor.
     * @param string $operator
     * @param int $count
     */
    public function __construct($operator = '=', $count = 0)
    {
        $this->operator = $operator;
        $this->count = $count;
    }

    /**
    * Execute the job.
    */
    public function handle()
    {
        $drivers = Driver::has('orders', $this->operator, $this->count)->get();

        return $drivers;
    }
}
