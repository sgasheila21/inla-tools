<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUser = DB::table('users')->first();
        
        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'label' => 'Jumlah Kasus Malaria',
            'name' => 'sheila_jumlah_kasus_malaria_2020',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_persentase_rumah_tangga_miskin_menggunakan_air_layak',
            'label' => 'Persentase Rumah Tangga Miskin Menggunakan Air Layak',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_jumlah_dokter',
            'label' => 'Jumlah Dokter',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_jumlah_perawat',
            'label' => 'Jumlah Perawat',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_jumlah_bidan',
            'label' => 'Jumlah Bidan',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_jumlah_tenaga_kefarmasian',
            'label' => 'Jumlah Tenaga Kefarmasian',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_jumlah_tenaga_gizi',
            'label' => 'Jumlah Tenaga Gizi',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_jumlah_penduduk_miskin',
            'label' => 'Jumlah Penduduk Miskin',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_persentase_rumah_tangga_memiliki_akses_sumber_air_minum_layak',
            'label' => 'Persentase Rumah Tangga Memiliki Akses Sumber Air Minum Layak',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_persentase_pengeluaran_per_kapita_sebulan_di_perkotaan_dan_perdesaan_makanan',
            'label' => 'Persentase Pengeluaran per Kapita Sebulan di Perkotaan dan Perdesaan Makanan',
            'hint' => null
        ]);

        DB::table('variables')->insert([
            'user_id' => $defaultUser->id,
            'name' => 'sheila_persentase_pengeluaran_per_kapita_sebulan_di_perkotaan_dan_perdesaan_bukan_makanan',
            'label' => 'Persentase Pengeluaran per Kapita Sebulan di Perkotaan dan Perdesaan Bukan Makanan',
            'hint' => null
        ]);
    }
}
