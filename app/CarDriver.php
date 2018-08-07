<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarDriver extends Model
{

    public $timestamps = false;

    public $table = 'cars_drivers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_id', 'car_id'
    ];

}