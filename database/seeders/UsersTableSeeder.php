<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'Yanto Mulyanto',
        'email' => 'yanto@utomo.com',
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
        'role' => 'Murid',
        ]);
        DB::table('users')->insert([
        'name' => 'Lena Marlena',
        'email' => 'lena@utomo.com',
        'email_verified_at' => now(),
        
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
        'role' => 'Murid',
        ]);
        DB::table('users')->insert([
        'name' => 'administrator',
        'email' => 'administrator@tomo.com',
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
        'role' => 'Sekolah',
        ]);
        }
}
