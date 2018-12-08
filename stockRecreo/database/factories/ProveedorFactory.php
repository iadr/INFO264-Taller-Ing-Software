<?php

use Faker\Generator as Faker;

$factory->define(App\Proveedor::class, function (Faker $faker) {
    return [
      "nombre"=>$faker->company,
      "direccion"=>$faker->address,
      "representante"=>$faker->name,
      "telefono"=>$faker->e164PhoneNumber,
      "email"=>$faker->email
    ];
});
