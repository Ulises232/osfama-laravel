<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $role1= Role::create(['name' => 'Administrador']);
       $role2= Role::create(['name' => 'Tecnico']);
    
       //Todos
       Permission::create(['name'=>'dashboard'])->syncRoles([$role1,$role2]);
       Permission::create(['name'=>'destroy'])->syncRoles([$role1,$role2]);

       //técnico
       Permission::create(['name'=>'guardarOrdenCamara'])->assignRole($role2);
       Permission::create(['name'=>'guardarOrdenaAlarma'])->assignRole($role2);
       Permission::create(['name'=>'guardarOrdenCerca'])->assignRole($role2);
       Permission::create(['name'=>'trabajoHacer'])->assignRole($role2);
       Permission::create(['name'=>'trabajoHecho'])->assignRole($role2);
       Permission::create(['name'=>'registroHecho'])->assignRole($role2);
       

       //admin
       Permission::create(['name'=>'asignarOrden'])->assignRole($role1);
       Permission::create(['name'=>'guardarAsignarOrden'])->assignRole($role1);
       Permission::create(['name'=>'trabajosHacer'])->assignRole($role1);
       Permission::create(['name'=>'trabajosHecho'])->assignRole($role1);
       Permission::create(['name'=>'registroUsuario'])->assignRole($role1);
       Permission::create(['name'=>'registrarUsuario'])->assignRole($role1);

    }
}
