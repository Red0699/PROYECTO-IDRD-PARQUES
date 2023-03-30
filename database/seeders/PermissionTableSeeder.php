<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'permissions_module',
            'roles_module',
            'users_module',
            'parques_module',
            'informes_module',
            'inventario_module',
            'diagnostico_module',
            'historicos_module'
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
