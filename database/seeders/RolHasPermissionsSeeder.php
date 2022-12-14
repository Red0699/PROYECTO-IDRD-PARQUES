<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Administrador
        $admin_permissions = Permission::all();
        Role::find(1)->permissions()->sync($admin_permissions->pluck('id'));

        //Funcionario
        $funcionario_permissions = $admin_permissions->filter(function($permission){
            return substr($permission->name, 0, 5) != 'permission_'
            && substr($permission->name, 0, 5) != 'role_'
            && substr($permission->name, 0, 5) != 'users_';
        });

        Role::find(2)->permissions()->sync($funcionario_permissions);
    }
}
