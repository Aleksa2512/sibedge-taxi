<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Driver::class, function () {

    $faker = \Faker\Factory::create('ru_RU');

    return [
        'fio' => $faker->name,
        'position' => array_random(['младший водитель', 'старший водитель']),
    ];
});

$factory->define(App\Operator::class, function () {

    $faker = \Faker\Factory::create('ru_RU');

    return [
        'fio' => $faker->name,
        'position' => array_random(['младший оператор', 'старший оператор']),
    ];
});

$factory->define(App\Car::class, function () {

    $faker = \Faker\Factory::create('ru_RU');
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));

    return [
        'model' => $faker->vehicleBrand,
        'color' => $faker->safeColorName,
        'number' => $faker->vehicleRegistration('[ABEKMHOPCTYX]{2}[0-9]{3}[ABEKMHOPCTYX]{1}')
    ];
});

$factory->define(App\Order::class, function () {

    $faker = \Faker\Factory::create('ru_RU');

    $city = $faker->city;

    $isCompleted = $faker->numberBetween(random_int(0,1),1);
    $isComeClient = $isCompleted ?: $faker->numberBetween(random_int(0,1),1);

    return [
        'address_start' => $city . ', ' . $faker->streetAddress,
        'address_finish' => $city . ', ' . $faker->streetAddress,
        'time_accepted_at' => $faker->dateTimeBetween('-1 years'),
        'is_come_client' => $isComeClient,
        'is_completed' => $isCompleted,
        'is_active' => (($isCompleted && $isComeClient || !$isCompleted && !$isComeClient) ? 0 : $faker->numberBetween(random_int(0,1),1)),
        'driver_id' => function () {
            return App\Driver::all()->take(App\Driver::all()->count() - DriversTableSeeder::COUNT_DRIVERS)->random()->id;
        },
        'car_id' => function () {
            return App\Car::all()->random()->id;
        },
        'operator_id' => function () {
            return App\Operator::all()->random()->id;
        },
    ];
});

$factory->define(App\CarDriver::class, function () {

    $driverId = App\Driver::all()->random()->id;
    $carId = App\Car::all()->random()->id;

    if( App\CarDriver::where('driver_id', $driverId)->where('car_id', $carId)->first() ) {
        return [];
    }

    return [
        'driver_id' => $driverId,
        'car_id' => $carId
    ];
});