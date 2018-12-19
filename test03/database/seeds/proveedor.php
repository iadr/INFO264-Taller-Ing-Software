<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class proveedor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Proveedores')->insert([
        	[
        	'nombre'=> 'juan perez',
        	'marca'=> 'matel',
        	'correo_electronico'=> 'jperez@gmail.com',
        	'direccion'=>'av. peru 321,santiago',
        	'fono'=> 993842739
        	]
        ]);

        $faker=Faker::create();
        for ($i=0; $i <20 ; $i++) { 
        DB::table('Proveedores')->insert([	
        	'nombre'=> $faker->name,
        	'marca'=>$faker->company,
        	'correo_electronico'=> $faker->email,
        	'direccion'=>$faker->address,
        	'fono'=> $faker->isbn10 ,
        ]);
    }
    }
}
