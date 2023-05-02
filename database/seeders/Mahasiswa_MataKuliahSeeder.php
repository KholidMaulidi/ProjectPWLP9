<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa_MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'mahasiswa_id' => 2141720139,
                'matakuliah_id' => 1,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720139,
                'matakuliah_id' => 2,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720139,
                'matakuliah_id' => 3,
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => 2141720139,
                'matakuliah_id' => 4,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 1203156,
                'matakuliah_id' => 1,
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => 1203156,
                'matakuliah_id' => 2,
                'nilai' => 'C',
            ],
            [
                'mahasiswa_id' => 1203156,
                'matakuliah_id' => 3,
                'nilai' => 'B',
            ],
        ];
        DB::table('mahasiswa_matakuliah')->insert($datas);
    }
}