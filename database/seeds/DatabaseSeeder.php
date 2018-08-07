<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DriversTableSeeder::class,
            OperatorsTableSeeder::class,
            CarsTableSeeder::class,
            OrdersTableSeeder::class,
            AfterAllSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
