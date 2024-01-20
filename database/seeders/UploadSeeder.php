<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUser = DB::table('users')->first();

        DB::table('uploads')->insert([
            'user_id' => $defaultUser->id,
            'year' => '2020',
            'upload_date' => Carbon::now(),
            'title' => 'Data Kasus Malaria Tahun 2020'
        ]);
    }
}
