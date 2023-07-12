<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Moderator'],
            ['name' => 'Agent'],
        ];

        foreach ( $roles as $role ) {
            Role::create($role);
        }

        User::factory()->create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@gnss.com',
            'role_id' =>  1,
            'username' => 'admin',
            'password' => '$2y$10$Dc5G1w5udMbz4iSgJrykPO24c3ymPQmQZGJITrb3wyq.UokdBkGmG', // admin
        ]);

        User::factory(10)->create();

    }
}
