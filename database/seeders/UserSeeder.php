<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Administrador Biblioteca",
            'username'=>"admin",
            'email' => 'admin@gmail.com',
            'password' =>   Hash::make('admin'),
            'rol'=>'admin'
        ]);
    }
}
