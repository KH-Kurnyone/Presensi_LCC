<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            JabatanSeeder::class,
            KegiatanSeeder::class,
            KelasSeeder::class,
            // MahasiswaSeeder::class,
            // MahasiswaSeederII::class,
            // MahasiswaSeederIII::class,
            // MahasiswaSeederIV::class,
            ProdiSeeder::class,
            SesiSeeder::class,
            UserSeeder::class,
        ]);
    }
}
