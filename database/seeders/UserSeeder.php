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
        User::create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'cashier',
        ]);
    }
}
