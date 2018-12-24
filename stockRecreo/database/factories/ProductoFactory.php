<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
  $array=array('juegos de mesa','cartas','magia','circo');
    return [
      "codigo"=>$faker->ean13,
      "nombre"=>$faker->word,
      "categoria"=>$faker->randomElement($array),
      "edadminima"=>$faker->numberBetween(2,16),
      "precio"=>$faker->randomNumber(5),
      "stock"=>$faker->randomNumber(3),
      "activo"=>True
    ];
});
