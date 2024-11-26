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
        ]);
        User::create([
            'name'=> 'William',
            'email' => 'william@gmail.com',
            'password' => 'william',
        ]);
        User::create([
            'name'=> 'Jeremy',
            'email' => 'jeremy@gmail.com',
            'password' => 'jeremy',
        ]);
    }
}
