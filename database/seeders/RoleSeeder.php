<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         /*Super Admin*/
         Role::create(
            ['name' => 'Super Admin']
        );

        /*Editor*/
        $editor = Role::create(
            ['name' => 'Editor'],
        );

        /*Simple User*/
        $simpleUser = Role::create(
            ['name' => 'Simple User'],
        );

        /*Assign Permission*/
        $editor->givePermissionTo(['create', 'edit-all', 'delete-all', 'view-all']);
        $simpleUser->givePermissionTo(['create', 'edit-own', 'delete-own', 'view-own']);
    }
}
