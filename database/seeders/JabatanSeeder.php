<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'jabatan' => 'Anggota',
            ],
            [
                'jabatan' => 'Ketua',
            ],
            [
                'jabatan' => 'Wakil Ketua',
            ],
            [
                'jabatan' => 'Sekretaris I',
            ],
            [
                'jabatan' => 'Sekretaris II',
            ],
            [
                'jabatan' => 'Bendahara I',
            ],
            [
                'jabatan' => 'Bendahara II',
            ],
            [
                'jabatan' => 'Biro Pendidikan I',
            ],
            [
                'jabatan' => 'Biro Pendidikan II',
            ],
            [
                'jabatan' => 'Biro IT & Sosmed I',
            ],
            [
                'jabatan' => 'Biro IT & Sosmed II',
            ],
        ])->each(function ($data) {
            Jabatan::create($data);
        });
    }
}
