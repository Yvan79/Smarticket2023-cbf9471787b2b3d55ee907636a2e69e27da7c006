<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSmarticket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::create(['name' => 'Administrador']);
        $acreditador = Role::create(['name' => 'Acreditador']);
        $validador = Role::create(['name' => 'Validador']);
        $superadmin = Role::create(['name' => 'SuperAdmin']);
        //Elementos
        Permission::create(['name'  => 'brazaletes.consultar.reporte','description'=>'Reportes Consultar'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'brazaletes.acreditar.imprimir','description'=>'Boton Reimprimir Acreditar'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'dashboard.estadisticas','description'=>'Estadisticas Dashboard'])->syncRoles([$superadmin,$administrador]);
        //Modulos
        Permission::create(['name'  => 'tickets.generate','description'=>'Generacion de Tickets'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'tickets.validar','description'=>'Validar Tickets'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'brazaletes.acreditar','description'=>'Modulo Acreditar'])->syncRoles([$superadmin,$administrador,$acreditador]);
        Permission::create(['name'  => 'brazaletes.consultar','description'=>'Modulo Consultar'])->syncRoles([$superadmin,$administrador,$validador]);
        Permission::create(['name'  => 'mantenimiento.administrar','description'=>'Modulo Administrar'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'mantenimiento.empresa','description'=>'Empresa'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'mantenimiento.eventos','description'=>'Eventos'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'mantenimiento.zonas','description'=>'Zonas'])->syncRoles([$superadmin,$administrador]);
        Permission::create(['name'  => 'mantenimiento.roles','description'=>'Roles'])->syncRoles([$superadmin]);
        Permission::create(['name'  => 'mantenimiento.AsignEvent','description'=>'Asignar Evento'])->syncRoles([$superadmin,$administrador]);
    }

}