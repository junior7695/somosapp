<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$role = new Role();
        $role->name = 'admin';
        $role->slug = 'slug';
        $role->description = 'Administrator';
        $role->special = 'all-access';
        $role->save();
        
        $role = new Role();
        $role->name = 'user1';
        $role->slug = 'ciudadanos'
        $role->description = 'Usuario 1 que puede consultar';
        $role->save();*/

        Role::create([
            'name'      => 'admin',
            'slug'      => 'slug',
            'description'   => 'Administrador del Sistema',
            'special'   => 'all-access'
        ]);

        Role::create([
            'name'      => 'user',
            'slug'      => 'clientes',
            'description'   => 'Usuario'
        ]);
    }
}
