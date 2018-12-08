<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Prov_ProdSeeder extends Seeder
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
      $idProveedor= DB::table('proveedores')->pluck('id');
      for($i=0;$i<150;$i++){
        DB::table('proveedor_producto')->insert([
          // "id_proveedor"=>$this->getRandomProv(),
          // "id_producto"=>$this->getRandomProd()
          "id_proveedor"=>$faker->randomElement($idProveedor),
          "id_producto"=>$faker->randomElement($idProducto)
        ]);
      }
    }
    // private function getRandomProd(){
    //   $producto=\App\Producto::inRandomOrder()->first();
    //   return $producto->id;
    //
    // }
    // private function getRandomProv(){
    //   $proveedor=\App\Proveedor::inRandomOrder()->first();
    //   return $proveedor->id;
    // }
}
