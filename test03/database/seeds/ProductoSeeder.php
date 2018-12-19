<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('productos')->insert([
        "codigo"=>'123',
        "nombre"=>"catan",
        "categoria"=>"juegos de mesa",
        "edadminima"=>12,
        "precio"=>27990,
        "stock"=>15,
        "activo"=>True
      ]);
      $array=array('juegos de mesa','cartas','magia','circo');
      $faker=Faker::create();
      // $productos=factory(App\Productos::class,100)->create();
      for($i=0;$i<100;$i++){
        DB::table('productos')->insert([
          "codigo"=>$faker->ean13,
          "nombre"=>$faker->word,
          "categoria"=>$faker->randomElement($array),
          "edadminima"=>$faker->numberBetween(2,16),
          "precio"=>$faker->randomNumber(5),
          "stock"=>$faker->randomNumber(3),
          "activo"=>True
        ]);
      }
    }
}
