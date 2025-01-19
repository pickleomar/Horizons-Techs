<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => 'editor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sanae Amari',
                'email' => 'sanae@example.com',
                'password' => Hash::make('password'),
                'role' => 'subscriber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jawad Amari',
                'email' => 'jawad@example.com',
                'password' => Hash::make('password'),
                'role' => 'subscriber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // You can add more data as needed
        $this->command->info('Users seeded successfully!');
    }
}