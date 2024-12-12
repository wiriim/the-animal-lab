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
        User::create([
            'name'=> 'Test',
            'email' => 'test@gmail.com',
            'password' => 'test',
            'role' => 'user'
        ]);
        User::create([
            'name'=> 'William Viriya Halim',
            'email' => 'william@gmail.com',
            'password' => 'william',
            'role' => 'user'
        ]);
        User::create([
            'name'=> 'Jeremy Sigmatupang',
            'email' => 'jeremy@gmail.com',
            'password' => 'jeremy',
            'role' => 'user'
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin'
        ]);
    }
}
