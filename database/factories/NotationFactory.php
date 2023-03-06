<?php

use App\Notation;
 use Faker\Generator as Faker;

 $factory->define(Notation::class, function (Faker $faker) {

return [
         'note' => $faker->randomElement($array = [0, 1, 2, 3, 4, 5]),
         'add_at' => $faker->dateTimeInInterval(
            $startDate = '-6 months',
            $interval = '+ 180 days',
            $timezone = date_default_timezone_get()),
];
});
