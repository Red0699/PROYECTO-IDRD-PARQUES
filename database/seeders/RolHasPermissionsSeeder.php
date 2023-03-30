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

        /*
        //Funcionario
        $funcionario_permissions = $admin_permissions->filter(function($permission){
            return substr($permission->name, 0, 5) != 'inventario_'
            && substr($permission->name, 0, 5) != 'parques_'
            && substr($permission->name, 0, 5) != 'diagnostico_'
            && substr($permission->name, 0, 5) != 'informes_';
        });
        */
        //Funcionario
        $funcionario_permissions = Permission::whereIn('name', [
            'parques_module',
            'inventario_module',
            'diagnostico_module',
            'informes_module',
        ])->get();

        Role::find(2)->permissions()->sync($funcionario_permissions);
        Role::find(2)->permissions()->sync($funcionario_permissions);
    }
}
