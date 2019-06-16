<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        
        'title'=>$faker->sentence(5),
        'description'=>$faker->text(),
    ];
});
