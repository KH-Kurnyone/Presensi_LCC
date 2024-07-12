<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            // 1
            [
                'prodi_id'=>'1',
                'kelas'=>'MI23A',
                'angkatan'=>'2023',
            ],
            // 2
            [
                'prodi_id'=>'1',
                'kelas'=>'MI23B',
                'angkatan'=>'2023',
            ],
            // 3
            [
                'prodi_id'=>'2',
                'kelas'=>'MP04',
                'angkatan'=>'2023',
            ],
            // 4
            [
                'prodi_id'=>'3',
                'kelas'=>'MKP04',
                'angkatan'=>'2023',
            ],
            // 5
            [
                'prodi_id'=>'4',
                'kelas'=>'AB17',
                'angkatan'=>'2023',
            ],
            // 6
            [
                'prodi_id'=>'5',
                'kelas'=>'TO23',
                'angkatan'=>'2023',
            ],
        ])->each(function($data){
            Kelas::create($data);
        });
    }
}
