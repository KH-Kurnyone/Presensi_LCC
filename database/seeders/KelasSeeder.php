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
                'prodi_id' => '1',
                'kelas' => 'MI24',
                'tingkat' => '1',
                'angkatan' => '2024',
            ],
            // 2
            [
                'prodi_id' => '2',
                'kelas' => 'MP05',
                'tingkat' => '1',
                'angkatan' => '2024',
            ],
            // 3
            [
                'prodi_id' => '3',
                'kelas' => 'MKP05',
                'tingkat' => '1',
                'angkatan' => '2024',
            ],
            // 4
            [
                'prodi_id' => '4',
                'kelas' => 'AB18',
                'tingkat' => '1',
                'angkatan' => '2024',
            ],
            // 5
            [
                'prodi_id' => '5',
                'kelas' => 'TO24',
                'tingkat' => '1',
                'angkatan' => '2024',
            ],


            // 1A
            [
                'prodi_id' => '1',
                'kelas' => 'MI23A',
                'tingkat' => '2',
                'angkatan' => '2023',
            ],
            // 1B
            [
                'prodi_id' => '1',
                'kelas' => 'MI23B',
                'tingkat' => '2',
                'angkatan' => '2023',
            ],
            // 2
            [
                'prodi_id' => '2',
                'kelas' => 'MP04',
                'tingkat' => '2',
                'angkatan' => '2023',
            ],
            // 3
            [
                'prodi_id' => '3',
                'kelas' => 'MKP04',
                'tingkat' => '2',
                'angkatan' => '2023',
            ],
            // 4
            [
                'prodi_id' => '4',
                'kelas' => 'AB17',
                'tingkat' => '2',
                'angkatan' => '2023',
            ],
            // 5
            [
                'prodi_id' => '5',
                'kelas' => 'TO23',
                'tingkat' => '2',
                'angkatan' => '2023',
            ],


            // 1
            [
                'prodi_id' => '1',
                'kelas' => 'MI22',
                'tingkat' => '3',
                'angkatan' => '2022',
            ],
            // 2
            [
                'prodi_id' => '2',
                'kelas' => 'MP03',
                'tingkat' => '3',
                'angkatan' => '2022',
            ],
            // 3
            [
                'prodi_id' => '3',
                'kelas' => 'MKP03',
                'tingkat' => '3',
                'angkatan' => '2022',
            ],
            // 4
            [
                'prodi_id' => '4',
                'kelas' => 'AB16',
                'tingkat' => '3',
                'angkatan' => '2022',
            ],
            // 5
            [
                'prodi_id' => '5',
                'kelas' => 'TO22',
                'tingkat' => '3',
                'angkatan' => '2022',
            ],


            // 1
            [
                'prodi_id' => '1',
                'kelas' => 'MI21',
                'tingkat' => '4',
                'angkatan' => '2021',
            ],
            // 2
            [
                'prodi_id' => '2',
                'kelas' => 'MP02',
                'tingkat' => '4',
                'angkatan' => '2021',
            ],
            // 3
            [
                'prodi_id' => '3',
                'kelas' => 'MKP02',
                'tingkat' => '4',
                'angkatan' => '2021',
            ],
            // 4
            [
                'prodi_id' => '4',
                'kelas' => 'AB15',
                'tingkat' => '4',
                'angkatan' => '2021',
            ],
            // 5
            [
                'prodi_id' => '5',
                'kelas' => 'TO21',
                'tingkat' => '4',
                'angkatan' => '2021',
            ],
        ])->each(function ($data) {
            Kelas::create($data);
        });
    }
}
