<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert([
        ["categoria"=>"juegos de mesa",
        "descripcion"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam"],
        ["categoria"=>"juegos de cartas",
        "descripcion"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam"],
        ["categoria"=>"magia",
        "descripcion"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam"],
        ["categoria"=>"circo"],
        ["categoria"=>"didacticos"],
        ["categoria"=>"puzzles"]
      ]);
    }
}
