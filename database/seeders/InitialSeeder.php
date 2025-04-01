<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'email'    => 'admin@server.com',
            'name'     => 'Admin',
            'lastname' => 'Main'
        ]);

        DB::table('role')->insert([
            'name' => 'Administrador',
            'active' => true,
        ]);

        DB::table('permission')->insert([
            [
                'name'      => 'Crear tareas propias',
                'rbac_name' => 'task:create_own'
            ],
            [
                'name'      => 'Eliminar tareas propias',
                'rbac_name' => 'task:delete_own'
            ]
        ]);
        DB::table('role_permission')->insert([
            [
                'role'       => 1,
                'permission' => 1
            ],
            [
                'role'       => 1,
                'permission' => 2
            ]
        ]);

        DB::table('user_role')->insert([
            'role' => 1,
            'user' => 1
        ]);

        DB::table('status')->insert([
            [
                'name'        => 'Iniciada',
                'description' => 'Estatus inicial de cada tarea',
                'active'      => true
            ],
            [
                'name'        => 'En proceso',
                'description' => 'Tarea en ejecución',
                'active'      => true
            ],
            [
                'name'        => 'Completada',
                'description' => 'Tarea finalizada',
                'active'      => true
            ]
        ]);
    }
}
