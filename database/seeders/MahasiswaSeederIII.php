<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeederIII extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            // MI22
            // 1
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '2',
                'nim'           => '10101010',
                'nama'          => 'Ardi Wijaya',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2001-03-10',
                'alamat'        => 'Jl. Merdeka No. 12',
                'asal_sekolah'  => 'SMAN 1 Jakarta',
                'jurusan'       => 'Teknik Informatika',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '3',
                'nim'           => '20202020',
                'nama'          => 'Dewi Lestari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2000-07-22',
                'alamat'        => 'Jl. Dago No. 45',
                'asal_sekolah'  => 'SMAN 3 Bandung',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '4',
                'nim'           => '30303031',
                'nama'          => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '1999-04-15',
                'alamat'        => 'Jl. Diponegoro No. 67',
                'asal_sekolah'  => 'SMAN 2 Surabaya',
                'jurusan'       => 'Akuntansi',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 4
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '5',
                'nim'           => '40404040',
                'nama'          => 'Siti Nurhaliza',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Makassar',
                'tanggal_lahir' => '2002-08-18',
                'alamat'        => 'Jl. Pettarani No. 21',
                'asal_sekolah'  => 'SMAN 1 Makassar',
                'jurusan'       => 'Biologi',
                'no_telpon'     => '08456789012',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 5
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '6',
                'nim'           => '50505050',
                'nama'          => 'Andi Pratama',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '2000-12-24',
                'alamat'        => 'Jl. Sisingamangaraja No. 9',
                'asal_sekolah'  => 'SMAN 7 Medan',
                'jurusan'       => 'Ekonomi',
                'no_telpon'     => '08789012345',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 6
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '7',
                'nim'           => '60606060',
                'nama'          => 'Rina Setiani',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Palembang',
                'tanggal_lahir' => '2002-06-05',
                'alamat'        => 'Jl. Kapten A. Rivai No. 10',
                'asal_sekolah'  => 'SMAN 4 Palembang',
                'jurusan'       => 'Hukum',
                'no_telpon'     => '08123456790',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 7
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '8',
                'nim'           => '70707070',
                'nama'          => 'Fajar Setiawan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Malang',
                'tanggal_lahir' => '2001-02-17',
                'alamat'        => 'Jl. Ijen No. 45',
                'asal_sekolah'  => 'SMAN 2 Malang',
                'jurusan'       => 'Teknik Elektro',
                'no_telpon'     => '08901234567',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 8
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '9',
                'nim'           => '80808080',
                'nama'          => 'Indah Permata',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bali',
                'tanggal_lahir' => '2001-07-09',
                'alamat'        => 'Jl. Kuta No. 12',
                'asal_sekolah'  => 'SMAN 1 Denpasar',
                'jurusan'       => 'Pariwisata',
                'no_telpon'     => '08123456780',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 9
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '10',
                'nim'           => '90909090',
                'nama'          => 'Hendra Wijaya',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Pontianak',
                'tanggal_lahir' => '2000-04-12',
                'alamat'        => 'Jl. Ahmad Yani No. 10',
                'asal_sekolah'  => 'SMAN 3 Pontianak',
                'jurusan'       => 'Kimia',
                'no_telpon'     => '08567890124',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 10
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '11',
                'nim'           => '11001100',
                'nama'          => 'Rizki Ramadhan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Semarang',
                'tanggal_lahir' => '2001-09-14',
                'alamat'        => 'Jl. Pahlawan No. 78',
                'asal_sekolah'  => 'SMAN 5 Semarang',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08567890123',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 11
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '12121212',
                'nama'          => 'Putri Ananda',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2002-01-02',
                'alamat'        => 'Jl. Malioboro No. 21',
                'asal_sekolah'  => 'SMAN 4 Yogyakarta',
                'jurusan'       => 'Sastra Indonesia',
                'no_telpon'     => '08789012346',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 12
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '13131313',
                'nama'          => 'Dian Pratama',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Balikpapan',
                'tanggal_lahir' => '2002-05-15',
                'alamat'        => 'Jl. MT Haryono No. 22',
                'asal_sekolah'  => 'SMAN 2 Balikpapan',
                'jurusan'       => 'Teknik Mesin',
                'no_telpon'     => '08912345678',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 13
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '14141414',
                'nama'          => 'Yudi Prasetyo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surakarta',
                'tanggal_lahir' => '2001-03-11',
                'alamat'        => 'Jl. Slamet Riyadi No. 45',
                'asal_sekolah'  => 'SMAN 6 Surakarta',
                'jurusan'       => 'Geografi',
                'no_telpon'     => '08123456787',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 14
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '15151515',
                'nama'          => 'Ani Susanti',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Padang',
                'tanggal_lahir' => '2001-11-01',
                'alamat'        => 'Jl. Sudirman No. 3',
                'asal_sekolah'  => 'SMAN 2 Padang',
                'jurusan'       => 'Fisika',
                'no_telpon'     => '08567890125',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 15
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '16161616',
                'nama'          => 'Surya Ramadhan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bogor',
                'tanggal_lahir' => '2000-02-25',
                'alamat'        => 'Jl. Pajajaran No. 7',
                'asal_sekolah'  => 'SMAN 1 Bogor',
                'jurusan'       => 'Teknik Lingkungan',
                'no_telpon'     => '08234567892',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 16
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '17171717',
                'nama'          => 'Rina Wijaya',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Batam',
                'tanggal_lahir' => '2002-07-21',
                'alamat'        => 'Jl. Marina No. 6',
                'asal_sekolah'  => 'SMAN 3 Batam',
                'jurusan'       => 'Ilmu Komunikasi',
                'no_telpon'     => '08901234568',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 17
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '18181818',
                'nama'          => 'Fajar Pratama',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Pekanbaru',
                'tanggal_lahir' => '2001-06-19',
                'alamat'        => 'Jl. Sudirman No. 11',
                'asal_sekolah'  => 'SMAN 2 Pekanbaru',
                'jurusan'       => 'Matematika',
                'no_telpon'     => '08123456784',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 18
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '19191919',
                'nama'          => 'Linda Rahmawati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Palangkaraya',
                'tanggal_lahir' => '2000-09-30',
                'alamat'        => 'Jl. G. Obos No. 14',
                'asal_sekolah'  => 'SMAN 1 Palangkaraya',
                'jurusan'       => 'Teknik Arsitektur',
                'no_telpon'     => '08234567893',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 19
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '20202021',
                'nama'          => 'Adi Susanto',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Kupang',
                'tanggal_lahir' => '2001-05-13',
                'alamat'        => 'Jl. El Tari No. 2',
                'asal_sekolah'  => 'SMAN 5 Kupang',
                'jurusan'       => 'Teknik Industri',
                'no_telpon'     => '08123456785',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 20
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '21212121',
                'nama'          => 'Mila Karmila',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Denpasar',
                'tanggal_lahir' => '2000-08-28',
                'alamat'        => 'Jl. Teuku Umar No. 5',
                'asal_sekolah'  => 'SMAN 3 Denpasar',
                'jurusan'       => 'Farmasi',
                'no_telpon'     => '08123456783',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 21
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '22222222',
                'nama'          => 'Ridho Prasetyo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Solo',
                'tanggal_lahir' => '2001-04-29',
                'alamat'        => 'Jl. Slamet Riyadi No. 23',
                'asal_sekolah'  => 'SMAN 2 Solo',
                'jurusan'       => 'Sistem Informasi',
                'no_telpon'     => '08234567894',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 22
            [
                'kelas_id'      => '12',
                'jabatan_id'    => '1',
                'nim'           => '23232323',
                'nama'          => 'Eka Putri',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Gorontalo',
                'tanggal_lahir' => '2002-11-05',
                'alamat'        => 'Jl. Sudirman No. 6',
                'asal_sekolah'  => 'SMAN 2 Gorontalo',
                'jurusan'       => 'Ilmu Politik',
                'no_telpon'     => '08567890126',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // MP03
            // 1
            [
                'kelas_id'      => '13',
                'jabatan_id'    => '1',
                'nim'           => '25252525',
                'nama'          => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2000-10-10',
                'alamat'        => 'Jl. Malioboro No. 1',
                'asal_sekolah'  => 'SMAN 1 Yogyakarta',
                'jurusan'       => 'Teknik Informatika',
                'no_telpon'     => '08123456781',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '13',
                'jabatan_id'    => '1',
                'nim'           => '26262626',
                'nama'          => 'Siti Rahma',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2001-12-12',
                'alamat'        => 'Jl. Braga No. 9',
                'asal_sekolah'  => 'SMAN 3 Bandung',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08123456782',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '13',
                'jabatan_id'    => '1',
                'nim'           => '27272727',
                'nama'          => 'Ahmad Syahrul',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2002-01-15',
                'alamat'        => 'Jl. Tunjungan No. 10',
                'asal_sekolah'  => 'SMAN 2 Surabaya',
                'jurusan'       => 'Ekonomi',
                'no_telpon'     => '08123456783',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 4
            [
                'kelas_id'      => '13',
                'jabatan_id'    => '1',
                'nim'           => '28282828',
                'nama'          => 'Dewi Putri',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-07-20',
                'alamat'        => 'Jl. Sudirman No. 12',
                'asal_sekolah'  => 'SMAN 4 Jakarta',
                'jurusan'       => 'Hukum',
                'no_telpon'     => '08123456784',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 5
            [
                'kelas_id'      => '13',
                'jabatan_id'    => '1',
                'nim'           => '29292929',
                'nama'          => 'Rizky Aditya',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '2001-09-05',
                'alamat'        => 'Jl. Merdeka No. 7',
                'asal_sekolah'  => 'SMAN 5 Medan',
                'jurusan'       => 'Kedokteran',
                'no_telpon'     => '08123456785',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 6
            [
                'kelas_id'      => '13',
                'jabatan_id'    => '1',
                'nim'           => '30303030',
                'nama'          => 'Sri Lestari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Malang',
                'tanggal_lahir' => '2002-03-17',
                'alamat'        => 'Jl. Ijen No. 8',
                'asal_sekolah'  => 'SMAN 6 Malang',
                'jurusan'       => 'Psikologi',
                'no_telpon'     => '08123456786',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // MKP03
            // 1
            [
                'kelas_id'      => '14',
                'jabatan_id'    => '1',
                'nim'           => '210789456',
                'nama'          => 'Asep Mulyadi',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2001-03-22',
                'alamat'        => 'Jalan Merdeka No. 10',
                'asal_sekolah'  => 'SMA Negeri 3',
                'jurusan'       => 'Teknik Elektro',
                'no_telpon'     => '08312345678',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '14',
                'jabatan_id'    => '1',
                'nim'           => '340567891',
                'nama'          => 'Siti Nurul',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-11-11',
                'alamat'        => 'Jalan Kebon Jeruk No. 5',
                'asal_sekolah'  => 'SMA Negeri 2',
                'jurusan'       => 'Sistem Informasi',
                'no_telpon'     => '08234567891',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '14',
                'jabatan_id'    => '1',
                'nim'           => '561690123',
                'nama'          => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '1999-07-30',
                'alamat'        => 'Jalan Pahlawan No. 7',
                'asal_sekolah'  => 'SMA Negeri 4',
                'jurusan'       => 'Teknik Informatika',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // AB16
            // 1
            [
                'kelas_id'      => '15',
                'jabatan_id'    => '1',
                'nim'           => '112233445',
                'nama'          => 'Rina Wulandari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2002-02-14',
                'alamat'        => 'Jalan Kenangan No. 8',
                'asal_sekolah'  => 'SMA Negeri 5',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08567891234',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '15',
                'jabatan_id'    => '1',
                'nim'           => '223344559',
                'nama'          => 'Eko Prabowo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '2001-09-25',
                'alamat'        => 'Jalan Mawar No. 3',
                'asal_sekolah'  => 'SMA Negeri 1',
                'jurusan'       => 'Teknik Mesin',
                'no_telpon'     => '08765432109',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // TO22
            // 1
            [
                'kelas_id'      => '16',
                'jabatan_id'    => '1',
                'nim'           => '334459163',
                'nama'          => 'Dewi Sari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bali',
                'tanggal_lahir' => '2000-12-01',
                'alamat'        => 'Jalan Pantai No. 12',
                'asal_sekolah'  => 'SMA Negeri 6',
                'jurusan'       => 'Desain Grafis',
                'no_telpon'     => '08987654374',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '16',
                'jabatan_id'    => '1',
                'nim'           => '445566799',
                'nama'          => 'Andi Setiawan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1999-06-20',
                'alamat'        => 'Jalan Merpati No. 9',
                'asal_sekolah'  => 'SMA Negeri 2',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '16',
                'jabatan_id'    => '1',
                'nim'           => '738291045',
                'nama'          => 'Rudi Hartono',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2001-08-10',
                'alamat'        => 'Jalan Raya No. 25',
                'asal_sekolah'  => 'SMA Negeri 7',
                'jurusan'       => 'Teknik Elektro',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],
        ])->each(function ($data) {
            Mahasiswa::create($data);
        });
    }
}
