<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultUpload = DB::table('uploads')->first();

        // variable 1
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 1,
            'value' => 3912
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 2,
            'value' => 1636
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 3,
            'value' => 138
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 4,
            'value' => 86
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 5,
            'value' => 16
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 6,
            'value' => 24
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 7,
            'value' => 218
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 8,
            'value' => 3
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 9,
            'value' => 11
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 10,
            'value' => 73
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 11,
            'value' => 5
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 12,
            'value' => 0
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 13,
            'value' => 6
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 14,
            'value' => 1
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 15,
            'value' => 2
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 16,
            'value' => 127
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 17,
            'value' => 8496
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 18,
            'value' => 5
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 19,
            'value' => 1
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 20,
            'value' => 6
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 21,
            'value' => 55
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 1,
            'region_id' => 22,
            'value' => 29
        ]);

        // variable 2
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 1,
            'value' => 60.76
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 2,
            'value' => 56.84
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 3,
            'value' => 61.01
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 4,
            'value' => 40.08
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 5,
            'value' => 61.56
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 6,
            'value' => 74.49
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 7,
            'value' => 48.09
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 8,
            'value' => 86.21
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 9,
            'value' => 90.91
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 10,
            'value' => 73.75
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 11,
            'value' => 72.68
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 12,
            'value' => 73.34
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 13,
            'value' => 53.73
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 14,
            'value' => 70.85
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 15,
            'value' => 41.33
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 16,
            'value' => 57.67
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 17,
            'value' => 50.88
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 18,
            'value' => 82.89
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 19,
            'value' => 42.94
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 20,
            'value' => 43.74
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 21,
            'value' => 38.93
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 2,
            'region_id' => 22,
            'value' => 75.16
        ]);

        // variable 3
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 1,
            'value' => 57
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 2,
            'value' => 100
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 3,
            'value' => 70
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 4,
            'value' => 94
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 5,
            'value' => 76
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 6,
            'value' => 83
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 7,
            'value' => 74
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 8,
            'value' => 40
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 9,
            'value' => 65
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 10,
            'value' => 101
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 11,
            'value' => 50
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 12,
            'value' => 52
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 13,
            'value' => 79
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 14,
            'value' => 50
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 15,
            'value' => 83
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 16,
            'value' => 32
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 17,
            'value' => 83
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 18,
            'value' => 51
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 19,
            'value' => 22
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 20,
            'value' => 21
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 21,
            'value' => 49
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 3,
            'region_id' => 22,
            'value' => 466
        ]);

        // variable 4
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 1,
            'value' => 481
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 2,
            'value' => 633
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 3,
            'value' => 466
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 4,
            'value' => 542
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 5,
            'value' => 550
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 6,
            'value' => 587
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 7,
            'value' => 683
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 8,
            'value' => 291
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 9,
            'value' => 695
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 10,
            'value' => 849
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 11,
            'value' => 433
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 12,
            'value' => 535
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 13,
            'value' => 899
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 14,
            'value' => 267
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 15,
            'value' => 615
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 16,
            'value' => 279
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 17,
            'value' => 600
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 18,
            'value' => 306
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 19,
            'value' => 654
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 20,
            'value' => 190
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 21,
            'value' => 309
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 4,
            'region_id' => 22,
            'value' => 2
        ]);

        // variable 5
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 1,
            'value' => 135
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 2,
            'value' => 279
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 3,
            'value' => 667
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 4,
            'value' => 583
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 5,
            'value' => 597
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 6,
            'value' => 278
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 7,
            'value' => 512
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 8,
            'value' => 320
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 9,
            'value' => 666
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 10,
            'value' => 691
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 11,
            'value' => 220
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 12,
            'value' => 456
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 13,
            'value' => 870
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 14,
            'value' => 240
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 15,
            'value' => 505
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 16,
            'value' => 128
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 17,
            'value' => 247
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 18,
            'value' => 342
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 19,
            'value' => 346
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 20,
            'value' => 178
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 21,
            'value' => 281
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 5,
            'region_id' => 22,
            'value' => 646
        ]);

        // variable 6
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 1,
            'value' => 28
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 2,
            'value' => 32
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 3,
            'value' => 41
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 4,
            'value' => 67
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 5,
            'value' => 82
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 6,
            'value' => 70
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 7,
            'value' => 96
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 8,
            'value' => 49
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 9,
            'value' => 76
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 10,
            'value' => 78
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 11,
            'value' => 48
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 12,
            'value' => 58
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 13,
            'value' => 93
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 14,
            'value' => 34
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 15,
            'value' => 69
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 16,
            'value' => 15
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 17,
            'value' => 47
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 18,
            'value' => 29
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 19,
            'value' => 35
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 20,
            'value' => 26
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 21,
            'value' => 47
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 6,
            'region_id' => 22,
            'value' => 215
        ]);

        // variable 7
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 1,
            'value' => 45
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 2,
            'value' => 32
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 3,
            'value' => 67
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 4,
            'value' => 87
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 5,
            'value' => 75
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 6,
            'value' => 56
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 7,
            'value' => 80
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 8,
            'value' => 39
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 9,
            'value' => 52
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 10,
            'value' => 68
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 11,
            'value' => 23
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 12,
            'value' => 39
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 13,
            'value' => 77
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 14,
            'value' => 48
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 15,
            'value' => 79
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 16,
            'value' => 22
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 17,
            'value' => 41
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 18,
            'value' => 28
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 19,
            'value' => 52
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 20,
            'value' => 30
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 21,
            'value' => 51
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 7,
            'region_id' => 22,
            'value' => 93
        ]);

        // variable 8
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 1,
            'value' => 36.95
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 2,
            'value' => 77.3
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 3,
            'value' => 94.94
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 4,
            'value' => 128.98
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 5,
            'value' => 56.98
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 6,
            'value' => 34.18
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 7,
            'value' => 43.55
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 8,
            'value' => 37.92
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 9,
            'value' => 27.89
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 10,
            'value' => 42.18
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 11,
            'value' => 65.22
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 12,
            'value' => 20.62
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 13,
            'value' => 69.52
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 14,
            'value' => 48.77
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 15,
            'value' => 49.4
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 16,
            'value' => 25.37
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 17,
            'value' => 97.81
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 18,
            'value' => 18.51
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 19,
            'value' => 76.69
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 20,
            'value' => 30.14
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 21,
            'value' => 31.12
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 8,
            'region_id' => 22,
            'value' => 39.72
        ]);

        // variable 9
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 1,
            'value' => 57.8
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 2,
            'value' => 56.91
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 3,
            'value' => 57.43
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 4,
            'value' => 52.53
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 5,
            'value' => 60.87
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 6,
            'value' => 64.72
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 7,
            'value' => 46.1
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 8,
            'value' => 80.02
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 9,
            'value' => 82.23
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 10,
            'value' => 62.84
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 11,
            'value' => 75.31
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 12,
            'value' => 79.79
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 13,
            'value' => 74.77
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 14,
            'value' => 76.65
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 15,
            'value' => 47.5
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 16,
            'value' => 44.53
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 17,
            'value' => 52.61
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 18,
            'value' => 60.16
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 19,
            'value' => 50.53
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 20,
            'value' => 49.35
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 21,
            'value' => 37.05
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 9,
            'region_id' => 22,
            'value' => 30.09
        ]);

        // variable 10
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 1,
            'value' => 55.92
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 2,
            'value' => 59.65
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 3,
            'value' => 53.42
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 4,
            'value' => 61.81
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 5,
            'value' => 62.33
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 6,
            'value' => 55.2
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 7,
            'value' => 61.26
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 8,
            'value' => 53.79
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 9,
            'value' => 56.98
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 10,
            'value' => 52.49
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 11,
            'value' => 54.28
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 12,
            'value' => 55.5
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 13,
            'value' => 59.03
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 14,
            'value' => 55.04
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 15,
            'value' => 54.89
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 16,
            'value' => 58.78
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 17,
            'value' => 67.4
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 18,
            'value' => 56.1
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 19,
            'value' => 67.86
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 20,
            'value' => 59.2
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 21,
            'value' => 60.51
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 10,
            'region_id' => 22,
            'value' => 42.3
        ]);

        // variable 11
        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 1,
            'value' => 44.08
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 2,
            'value' => 40.35
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 3,
            'value' => 46.58
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 4,
            'value' => 38.19
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 5,
            'value' => 37.67
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 6,
            'value' => 44.8
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 7,
            'value' => 38.74
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 8,
            'value' => 46.21
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 9,
            'value' => 43.02
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 10,
            'value' => 47.51
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 11,
            'value' => 45.72
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 12,
            'value' => 44.5
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 13,
            'value' => 40.97
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 14,
            'value' => 44.96
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 15,
            'value' => 45.11
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 16,
            'value' => 41.22
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 17,
            'value' => 32.6
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 18,
            'value' => 43.9
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 19,
            'value' => 32.14
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 20,
            'value' => 40.8
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 21,
            'value' => 39.49
        ]);

        DB::table('datas')->insert([
            'upload_id' => $defaultUpload->id,
            'variable_id' => 11,
            'region_id' => 22,
            'value' => 57.7
        ]);
    }
}
