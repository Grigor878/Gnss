<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@gnss.com',
            'role_id' =>  1,
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);
    }
}
