<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        // DB::table('users')->insert([
        //     'name' => 'Le Van Minh',
        //     'email' => 'thptdaian.levanminhk1821@gmail.com',
        //     'password' => Hash::make('12345'),
        // ]);
        $this->call([
            UserSeeder::class
        ]);
    }
}
