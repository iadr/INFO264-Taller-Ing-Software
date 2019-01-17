<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
  $array=array('juegos de mesa','cartas','magia','circo','didacticos','exterior','puzzle','otros','coleccionable');
    return [
      "codigo"=>$faker->ean13,
      "nombre"=>$faker->word,
      "categoria"=>$faker->randomElement($array),
      "edadminima"=>$faker->numberBetween(2,18),
      "precio"=>$faker->numberBetween(1000,150000),
      "stock"=>$faker->randomNumber(2),
      "activo"=>True
    ];
});
