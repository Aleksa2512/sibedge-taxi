<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * @package App
 *
 * @property int $id
 * @property string $model
 * @property string $color
 * @property string $number
 */
class Car extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model', 'color', 'number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivers()
    {
        return $this->belongsToMany('App\Driver', 'cars_drivers');
    }
}