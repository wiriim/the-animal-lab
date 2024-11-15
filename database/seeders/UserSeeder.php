<?php

namespace Database\Seeders;


use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['user1', 'user2', 'user3', 'user4', 'user5'];
        $emails = ['user1@gmail.com', 'user2@gmail.com', 'user3@gmail.com', 'user4@gmail.com', 'user5@gmail.com'];
        $passwords = ['pass1', 'pass2', 'pass3', 'pass4', 'pass5'];
        for ($i = 0; $i < 5; $i++){
            User::create([
                'name' => $names[$i],
                'email' => $emails[$i],
                'password' => $passwords[$i],
            ]);
        }
    }
}
