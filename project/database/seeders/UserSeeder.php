<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'fio' => 'admin',
            'email' => 'admin@flight.ru',
            'password' => 'QWEasd123',
            'role'     => 'admin',
        ]);

        User::factory()->create([
            'fio' => 'user',
            'email' => 'user@flight.ru',
            'password' => 'password',
        ]);
    }
}
