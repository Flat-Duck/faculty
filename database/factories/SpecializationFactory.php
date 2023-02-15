<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Specialization;
use Faker\Generator as Faker;

$factory->define(Specialization::class, function (Faker $faker) {
    return [
        'name'=> 'حاسب الي'
    ];
});
