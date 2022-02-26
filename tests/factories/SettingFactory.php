<?php

use Yazan\Setting\Models\Setting;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory as ModelFactory;

/* @var ModelFactory $factory */

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'key' => 'name',
        'value' => 'Yazan'
    ];
});
