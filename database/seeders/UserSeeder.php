<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'username'=>'Administrator',
                'password'=>bcrypt('password1'),
                'role'=>'Admin',
            ],
            // 2
            [
                'username'=>'Sekretaris',
                'password'=>bcrypt('password2'),
                'role'=>'Petugas',
            ],
            // 3
            [
                'username'=>'Koordinator',
                'password'=>bcrypt('password3'),
                'role'=>'Viewer',
            ],
        ])->each(function($data){
            User::create($data);
        });
    }
}
