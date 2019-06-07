<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role_super_admin =Role::where('name','SuperAdministrador')->first();
       $role_admin = Role::where('name','Administrador')->first();

       $user = new User();
       $user->name ='Anderson Rodriguez';
       $user->email='anderdavid86@gmail.com';
       $user->cedula='1085898647';
       $user->password = bcrypt('qwerty123');
       $user->save();
       $user->roles()->attach($role_super_admin);
     
	     /*$user = new User();
       $user->name ='administrador prueba';
       $user->email='admin@example.com';
       $user->cedula='826213122';
       $user->password = bcrypt('1234');
       $user->save();
       $user->roles()->attach($role_admin);*/
       
    }
}
