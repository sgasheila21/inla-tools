<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Sheila Gracia Angelina',
            'email' => 'sheila.angelina@binus.ac.id',
            // 'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now()
        ]);
    }
}
