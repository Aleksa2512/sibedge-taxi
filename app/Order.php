<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 *
 * @property int $id
 * @property string $address_start
 * @property string $address_finish
 * @property integer $time_accepted_at
 * @property integer $is_come_client
 * @property integer $is_completed
 * @property integer $is_active
 * @property integer $driver_id
 * @property integer $car_id
 * @property integer $operator_id
 */
class Order extends Model
{

    public $timestamps = false;

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operator()
    {
        return $this->belongsTo('App\Operator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNotIsCompleted($query)
    {
        return $query->where('is_completed', 0);
    }
}