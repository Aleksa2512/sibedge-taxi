<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Car::class, 25)->create()->each(function ($car) {
            return $car->drivers()->save(factory(App\Driver::class)->make());
        });
    }
}
