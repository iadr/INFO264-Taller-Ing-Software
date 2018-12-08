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
        "codigo"=>123,
        "nombre"=>"catan",
        "categoria"=>"juegos de mesa",
        "edadminima"=>12,
        "precio"=>27990,
        "stock"=>15
      ]);
      $faker=Faker::create();
      // $productos=factory(App\Productos::class,100)->create();
      for($i=0;$i<100;$i++){
        DB::table('productos')->insert([
          "codigo"=>$faker->unique()->randomNumber(8),
          "nombre"=>str_random(10),
          "categoria"=>str_random(5),
          "edadminima"=>randomNumber(2),
          "precio"=>$faker->randomNumber(5),
          "stock"=>$faker->randomNumber(3)
        ]);
      }
    }
}
