<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model\null
    */
    public function model(array $row)
    {
         // Create a new Mahasiswa instance and save it to the database
         $mahasiswa = Mahasiswa::create([
            'kelas_id'      => $row[1],
            'jabatan_id'    => $row[2],
            'nim'           => $row[3],
            'nama'          => $row[4],
            'jenis_kelamin' => $row[5],
            'tempat_lahir'  => $row[6],
            'tanggal_lahir' => $row[7],
            'alamat'        => $row[8],
            'asal_sekolah'  => $row[9],
            'jurusan'       => $row[10],
            'no_telpon'     => $row[11],
            'status_ukm'    => $row[12],
            'alasan'        => $row[13],
        ]);

        // Create a new User instance using the data from the Mahasiswa instance
        $user = new User([
            'mahasiswa_id'  => $mahasiswa->id,
            'username'      => $mahasiswa->nim,
            'password'      => Hash::make($mahasiswa->nim),
            'role'          => 'mahasiswa',
        ]);

        // Save the User instance to the database
        $user->save();

        // Return the Mahasiswa instance
        return $mahasiswa;

        // return new Mahasiswa([
        //     'kelas_id'      => $row[1],
        //     'nim'           => $row[2],
        //     'nama'          => $row[3],
        //     'jenis_kelamin' => $row[4],
        //     'tempat_lahir'  => $row[5],
        //     'tanggal_lahir' => $row[6],
        //     'alamat'        => $row[7],
        //     'asal_sekolah'  => $row[8],
        //     'jurusan'       => $row[9],
        //     'no_telpon'     => $row[10],
        //     'status_ukm'    => $row[11],
        // ]);

        // return new User ([
        //     'mahasiswa_id'  => 'mahasiswa_id' -> $row[1],
        //     'username'  => 'nama' -> $row[2],
        //     'password'  => 'nim' -> $row[3],
        //     'role'      => 'mahasiswa' -> $row[4],
        // ]);
    }
}
