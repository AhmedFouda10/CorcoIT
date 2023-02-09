<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$b42Yf4ghdtNwo5QaLeibJuiZd51uRchE6F.G18X1M2jEYASG2mU8q', // 123456
        ]);
    }
}
