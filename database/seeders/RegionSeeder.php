<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'name' => 'Sumba Barat'
        ]);

        DB::table('regions')->insert([
            'name' => 'Sumba Timur'
        ]);

        DB::table('regions')->insert([
            'name' => 'Kupang'
        ]);

        DB::table('regions')->insert([
            'name' => 'Timor Tengah Selatan'
        ]);

        DB::table('regions')->insert([
            'name' => 'Timor Tengah Utara'
        ]);

        DB::table('regions')->insert([
            'name' => 'Belu'
        ]);

        DB::table('regions')->insert([
            'name' => 'Alor'
        ]);

        DB::table('regions')->insert([
            'name' => 'Lembata'
        ]);

        DB::table('regions')->insert([
            'name' => 'Flores Timur'
        ]);

        DB::table('regions')->insert([
            'name' => 'Sikka'
        ]);

        DB::table('regions')->insert([
            'name' => 'Ende'
        ]);

        DB::table('regions')->insert([
            'name' => 'Ngada'
        ]);

        DB::table('regions')->insert([
            'name' => 'Manggarai'
        ]);

        DB::table('regions')->insert([
            'name' => 'Rote Ndao'
        ]);

        DB::table('regions')->insert([
            'name' => 'Manggarai Barat'
        ]);

        DB::table('regions')->insert([
            'name' => 'Sumba Tengah'
        ]);

        DB::table('regions')->insert([
            'name' => 'Sumba Barat Daya'
        ]);

        DB::table('regions')->insert([
            'name' => 'Nagekeo'
        ]);

        DB::table('regions')->insert([
            'name' => 'Manggarai Timur'
        ]);

        DB::table('regions')->insert([
            'name' => 'Sabu Raijua'
        ]);

        DB::table('regions')->insert([
            'name' => 'Malaka'
        ]);

        DB::table('regions')->insert([
            'name' => 'Kota Kupang'
        ]);
    }
}
