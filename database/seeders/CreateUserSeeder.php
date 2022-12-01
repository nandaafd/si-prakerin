<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Muhammad Syahrul Irmansyah',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'superadmin',
            ],
            [
                'name' => 'Eka Ananda Rusli',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'Alfi Syahrin',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'user',
            ],
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}
