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
        $user = new User();
        $user->name = 'Jholberto Caro';
        $user->email = 'jholberto@cantv.com';
        $user->tlf = '04265550050';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_user);
        $user = new User();
        $user->name = 'Jaime Vallejo';
        $user->email = 'jaime@cantv.com';
        $user->tlf = '04265505050';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
