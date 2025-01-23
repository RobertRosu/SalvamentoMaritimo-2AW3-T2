<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Viewer']);

        Permission::create(['name'=>'home'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'langileak.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'medikuak.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'bidaiak.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'bidaiak.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'erreskateak.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'erreskatatuak.index'])->syncRoles([$role1, $role2]);


        Permission::create(['name'=>'langileak.create'])->assignRole($role1);
        Permission::create(['name'=>'langileak.update'])->assignRole($role1);
        Permission::create(['name'=>'langileak.destroy'])->assignRole($role1);
        Permission::create(['name'=>'langileak.edit'])->assignRole($role1);

        Permission::create(['name'=>'medikuak.create'])->assignRole($role1);
        Permission::create(['name'=>'medikuak.update'])->assignRole($role1);
        Permission::create(['name'=>'medikuak.destroy'])->assignRole($role1);
        Permission::create(['name'=>'medikuak.edit'])->assignRole($role1);

        Permission::create(['name'=>'bidaiak.create'])->assignRole($role1);
        Permission::create(['name'=>'bidaiak.update'])->assignRole($role1);
        Permission::create(['name'=>'bidaiak.destroy'])->assignRole($role1);
        Permission::create(['name'=>'bidaiak.edit'])->assignRole($role1);

        Permission::create(['name'=>'erreskateak.create'])->assignRole($role1);
        Permission::create(['name'=>'erreskateak.update'])->assignRole($role1);
        Permission::create(['name'=>'erreskateak.destroy'])->assignRole($role1);
        Permission::create(['name'=>'erreskateak.edit'])->assignRole($role1);

        Permission::create(['name'=>'erreskatatuak.create'])->assignRole($role1);
        Permission::create(['name'=>'erreskatatuak.update'])->assignRole($role1);
        Permission::create(['name'=>'erreskatatuak.destroy'])->assignRole($role1);
        Permission::create(['name'=>'erreskatatuak.edit'])->assignRole($role1);


    }
}
