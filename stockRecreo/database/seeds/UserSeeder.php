<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User(array(
          'name'=>'admin',
          'email'=>'admin@localhost.com',
          'password'=>bcrypt('admin'),
          'isAdmin'=>1,
        ));
        $admin->save();
        $iadr=new User(array(
          'name'=>'israel diaz',
          'email'=>'id@id.com',
          'password'=>bcrypt('123456'),
          'isAdmin'=>0,
        ));
        $iadr->save();
    }
}
