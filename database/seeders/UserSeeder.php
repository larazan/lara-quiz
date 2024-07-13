<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        /*Admin*/
        $admin = User::factory()->withPersonalTeam()->create([
            'name' => 'Super Admin',
            'username' => 'adminus',
            'email' => 'admin@tailadmin.dev',
            'password' => bcrypt('admin1234'),
        ]);

        /*Editor*/
        $editor = User::factory()->withPersonalTeam()->create([
            'name' => 'Editor',
            'username' => 'editorus',
            'email' => 'editor@tailadmin.dev',
            'password' => bcrypt('editor1234'),
        ]);

        /*Simple User*/
        $simpleUser = User::factory()->withPersonalTeam()->create([
            'name' => 'Super User',
            'username' => 'userus',
            'email' => 'user@tailadmin.dev',
            'password' => bcrypt('user1234'),
        ]);

        /*Assign Role*/
        $admin->assignRole('Super Admin');
        $editor->assignRole('Editor');
        $simpleUser->assignRole('Simple User');
    }
}
