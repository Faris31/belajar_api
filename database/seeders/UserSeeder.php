<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'Faris',
                'email' => 'faris@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'Lukas',
                'email' => 'lukas@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'Miya',
                'email' => 'miya@gmail.com',
                'password' => '12345678'
            ],
            [
                'name' => 'Jonson',
                'email' => 'jonson@gmail.com',
                'password' => '12345678'
            ],
        ];

        User::insert($users);
    }
}
