<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Userを指定している　追加
use App\Models\User;

//Hashを使った暗号化をしている　追加
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'testuser',
            'email' => 'testuser@co.com',
            'password' => Hash::make('password'),
        ]);
    }
}
