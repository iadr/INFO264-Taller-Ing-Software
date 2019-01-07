<?php

use Illuminate\Database\Seeder;

class Cat_ProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();
      $idProducto = DB::table('productos')->pluck('id');
      $idCat= DB::table('categorias')->pluck('id');
      foreach ($idProducto as $prod) {
        DB::table('categoria_producto')->insert([
          ["id_producto"=>$prod,
          "id_categoria"=>$faker->randomElement($idCat)],
          ["id_producto"=>$prod,
          "id_categoria"=>$faker->randomElement($idCat)]
        ]);
      }
    }
}
