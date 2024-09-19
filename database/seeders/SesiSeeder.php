<?php

namespace Database\Seeders;

use App\Models\Sesi;
use Illuminate\Database\Seeder;

class SesiSeeder extends Seeder
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
                'sesi'          => 'Sesi 1',
                'waktu_mulai'   => '08:00',
                'waktu_selesai' => '09:40',
            ],
            [
                'sesi'          => 'Sesi 2',
                'waktu_mulai'   => '09:50',
                'waktu_selesai' => '11:30',
            ],
            [
                'sesi'          => 'Sesi 3',
                'waktu_mulai'   => '12:30',
                'waktu_selesai' => '14:10',
            ],
            [
                'sesi'          => 'Sesi 4',
                'waktu_mulai'   => '14:20',
                'waktu_selesai' => '16:00',
            ],
            [
                'sesi'          => 'Sesi 5',
                'waktu_mulai'   => '16:10',
                'waktu_selesai' => '17:50',
            ],
            [
                'sesi'          => 'Sesi 6',
                'waktu_mulai'   => '18:30',
                'waktu_selesai' => '20:10',
            ],
        ])->each(function ($data) {
            Sesi::create($data);
        });
    }
}
