<?php

namespace App\Http\Controllers\V1;

use App\Domain\Worker\Queries\GetAllWorkersQuery;
use App\Http\Response;
use Domain\Worker\Transformers\AllWorkersTransformer;
use Illuminate\Support\Facades\Artisan;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use Response;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function init()
    {

        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');

        return $this->message('Database fresh and seeding new test data');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllWorkers()
    {
        $workers = $this->dispatch(new GetAllWorkersQuery());

        return $this->collection($workers, new AllWorkersTransformer);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->message('Not Implemented');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return $this->message('Not Implemented');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        return $this->message('Not Implemented');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit()
    {
        return $this->message('Not Implemented');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update()
    {
        return $this->message('Not Implemented');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy()
    {
        return $this->message('Not Implemented');
    }
}
