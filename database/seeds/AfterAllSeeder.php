<?php

use Illuminate\Database\Seeder;

class AfterAllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Driver::class, rand(1,2))->create()->each(function ($driver) {
            return $driver->orders()->saveMany(factory(App\Order::class, rand(10,15))->create());
        });

        factory(App\Car::class, rand(2,5))->create()->each(function ($car) {
            return $car->drivers()->saveMany(factory(App\Driver::class, rand(2,3))->create());
        });
    }
}
