<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Tuğran',
            'surname' => 'Demirel',
            'email' => 'tugran@demirel.com',
            'phone' => '05443380633',
            'date_of_birth' => '2023-05-06',
            'gender' => true,
            'password' => bcrypt('123456789'),
        ]);
    }
}
