<?php

use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    const COUNT_DRIVERS = 4;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Driver::class, self::COUNT_DRIVERS)->create();
    }
}
