<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
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
            ['prodi'=>'Manajemen Informatika', 'singkatan'=>'MI',],
            // 2
            ['prodi'=>'Manajemen Pemasaran', 'singkatan'=>'MP',],
            // 3
            ['prodi'=>'Manajemen Keuangan Perbankan', 'singkatan'=>'MKP',],
            // 4
            ['prodi'=>'Administrasi Bisnis', 'singkatan'=>'AB',],
            // 5
            ['prodi'=>'Teknik Otomotif', 'singkatan'=>'TO',],
        ])->each(function($data){
            Prodi::create($data);
        });
    }
}
