<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
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
                'kegiatan' => 'Office Class',
            ],
            [
                'kegiatan' => 'Multimedia Class',
            ],
            [
                'kegiatan' => 'Programing Class',
            ],
        ])->each(function ($data) {
            Kegiatan::create($data);
        });
    }
}
