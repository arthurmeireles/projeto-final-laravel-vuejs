<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Jogador;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Jogador::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'idade'=> $faker->randomNumber(),
        'posicao'=> factory(Posicao::class)->create()->id
    ];
});
