<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *Creacion de permisos del sistema
     */
    public function run()
    {
       // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'crear beneficiario']);
        Permission::create(['name' => 'generar boleta']);
        Permission::create(['name' => 'eliminar boleta']);
        Permission::create(['name' => 'reportes']);
        Permission::create(['name' => 'actualizacion masiva']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
