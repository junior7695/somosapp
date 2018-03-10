<?php

use Illuminate\Database\Seeder;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        
        //Creamos un usuario y le asignamos rol de usuario
        $user = new User();
        $user->name = 'Jholbert Caro';
        $user->email = 'jholbert.c@gmail.com';
        $user->tlf = '04265550050';
        $user->password = '';
        $user->save();
        $user->roles()->attach($role_user);
        
        //Creamos un usuario y le asignamos el rol de administrador
        $user = new User();
        $user->name = 'Jaime Vallejo';
        $user->email = 'jaimed.vallejo@gmail.com';
        $user->tlf = '04265505050';
        $user->password = '';
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
