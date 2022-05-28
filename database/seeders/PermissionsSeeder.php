<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Roles
        $rolSuperAdmin = Role::create(['name' => 'Super Admin']);
        $rolCaja = Role::create(['name' => 'Caja']);

        //Usuarios
        $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@umg.edu.gt',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole($rolSuperAdmin);

        $caja = User::factory()->create([
            'name' => 'Cajero',
            'email' => 'cajero@umg.edu.gt',
            'password' => bcrypt('12345678')
        ]);
        $caja->assignRole($rolCaja);

    }
}
