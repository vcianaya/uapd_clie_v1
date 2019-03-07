<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin = User::create([
      	'nombre'=>'Admin',
      	'apellido'=>'Admin',
      	'ci'=>'123456',
      	'email'=>'admin@gmail.com',
      	'password'=> bcrypt('secret')
      ]);

      $admin->assignRole('super-admin');
    }
}
