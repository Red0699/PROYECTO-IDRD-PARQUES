<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            'Administrador',
            'Funcionario',
            'Usuario'
        ];

        foreach($roles as $rol){
            Role::create([
                'name' => $rol
            ]);
        }
    }
}
