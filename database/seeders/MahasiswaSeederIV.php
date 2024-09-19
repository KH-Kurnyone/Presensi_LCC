<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeederIV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            // MI21
            // 1
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '2',
                'nim'           => '162539805',
                'nama'          => 'Ali Rachman',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-01-15',
                'alamat'        => 'Jalan Kebon Kacang No. 7',
                'asal_sekolah'  => 'SMA Negeri 10',
                'jurusan'       => 'Teknik Informatika',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '3',
                'nim'           => '987654326',
                'nama'          => 'Siti Rahmawati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1999-03-22',
                'alamat'        => 'Jalan Merdeka No. 14',
                'asal_sekolah'  => 'SMA Negeri 12',
                'jurusan'       => 'Desain Grafis',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '4',
                'nim'           => '112233441',
                'nama'          => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2001-06-30',
                'alamat'        => 'Jalan Pahlawan No. 9',
                'asal_sekolah'  => 'SMA Negeri 8',
                'jurusan'       => 'Teknik Mesin',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 4
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '5',
                'nim'           => '223344577',
                'nama'          => 'Dewi Sari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '2000-11-25',
                'alamat'        => 'Jalan Kembang No. 20',
                'asal_sekolah'  => 'SMA Negeri 5',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08765432109',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 5
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '6',
                'nim'           => '334450185',
                'nama'          => 'Rina Wulandari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bali',
                'tanggal_lahir' => '1999-07-14',
                'alamat'        => 'Jalan Pantai No. 3',
                'asal_sekolah'  => 'SMA Negeri 6',
                'jurusan'       => 'Desain Grafis',
                'no_telpon'     => '08987654375',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 6
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '7',
                'nim'           => '445566361',
                'nama'          => 'Andi Setiawan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2001-02-18',
                'alamat'        => 'Jalan Mawar No. 5',
                'asal_sekolah'  => 'SMA Negeri 2',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 7
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '8',
                'nim'           => '936283777',
                'nama'          => 'Eko Prabowo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Semarang',
                'tanggal_lahir' => '1998-12-05',
                'alamat'        => 'Jalan Bunga No. 11',
                'asal_sekolah'  => 'SMA Negeri 3',
                'jurusan'       => 'Teknik Elektro',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 8
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '9',
                'nim'           => '019371625',
                'nama'          => 'Nina Wijaya',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-10-10',
                'alamat'        => 'Jalan Sudirman No. 7',
                'asal_sekolah'  => 'SMA Negeri 4',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08567891234',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 9
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '10',
                'nim'           => '778899003',
                'nama'          => 'Tono Nugroho',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1999-05-20',
                'alamat'        => 'Jalan Riau No. 8',
                'asal_sekolah'  => 'SMA Negeri 7',
                'jurusan'       => 'Akuntansi',
                'no_telpon'     => '08345678912',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 10
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '11',
                'nim'           => '889900012',
                'nama'          => 'Susi Dewi',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2001-04-25',
                'alamat'        => 'Jalan Cendana No. 2',
                'asal_sekolah'  => 'SMA Negeri 8',
                'jurusan'       => 'Sistem Informasi',
                'no_telpon'     => '08765432108',
                'status_ukm'    => 'BPH',
                'alasan'        => '-',
            ],

            // 11
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '980011223',
                'nama'          => 'Yudi Hartono',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '1998-11-15',
                'alamat'        => 'Jalan Asoka No. 16',
                'asal_sekolah'  => 'SMA Negeri 5',
                'jurusan'       => 'Teknik Komputer',
                'no_telpon'     => '08234567891',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 12
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '101112233',
                'nama'          => 'Dina Kurnia',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '1999-07-22',
                'alamat'        => 'Jalan Bambu No. 6',
                'asal_sekolah'  => 'SMA Negeri 6',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08987654322',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 13
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '112233442',
                'nama'          => 'Rina Setiawati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-12-01',
                'alamat'        => 'Jalan Raya No. 3',
                'asal_sekolah'  => 'SMA Negeri 7',
                'jurusan'       => 'Desain Grafis',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 14
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '223344564',
                'nama'          => 'Rudi Susanto',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2001-09-10',
                'alamat'        => 'Jalan Kencana No. 8',
                'asal_sekolah'  => 'SMA Negeri 9',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08567891234',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 15
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '334401724',
                'nama'          => 'Maya Indah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '1999-05-25',
                'alamat'        => 'Jalan Anggrek No. 14',
                'asal_sekolah'  => 'SMA Negeri 10',
                'jurusan'       => 'Ilmu Sosial',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 16
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '445566820',
                'nama'          => 'Tari Wulandari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2001-02-28',
                'alamat'        => 'Jalan Kuning No. 4',
                'asal_sekolah'  => 'SMA Negeri 3',
                'jurusan'       => 'Sistem Informasi',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 17
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '029373881',
                'nama'          => 'Fajar Nugroho',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '1999-08-12',
                'alamat'        => 'Jalan Mangga No. 6',
                'asal_sekolah'  => 'SMA Negeri 2',
                'jurusan'       => 'Teknik Elektro',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 18
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '910286724',
                'nama'          => 'Lina Farida',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-07-18',
                'alamat'        => 'Jalan Cempaka No. 5',
                'asal_sekolah'  => 'SMA Negeri 4',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08765432109',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 19
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '77889725',
                'nama'          => 'Hadi Prabowo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2000-05-05',
                'alamat'        => 'Jalan Melati No. 12',
                'asal_sekolah'  => 'SMA Negeri 5',
                'jurusan'       => 'Akuntansi',
                'no_telpon'     => '08567891234',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 20
            [
                'kelas_id'      => '17',
                'jabatan_id'    => '1',
                'nim'           => '889909271',
                'nama'          => 'Wina Alamsyah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bali',
                'tanggal_lahir' => '1999-10-30',
                'alamat'        => 'Jalan Flamboyan No. 7',
                'asal_sekolah'  => 'SMA Negeri 6',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08234567891',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // MP02
            // 1
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '234567810',
                'nama'          => 'Ika Puspita',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-03-15',
                'alamat'        => 'Jalan Cendana No. 8',
                'asal_sekolah'  => 'SMA Negeri 10',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '312267890',
                'nama'          => 'Joni Prasetyo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1999-11-20',
                'alamat'        => 'Jalan Anggrek No. 6',
                'asal_sekolah'  => 'SMA Negeri 5',
                'jurusan'       => 'Teknik Elektro',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '456789832',
                'nama'          => 'Lia Anggraini',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2001-07-25',
                'alamat'        => 'Jalan Melati No. 3',
                'asal_sekolah'  => 'SMA Negeri 6',
                'jurusan'       => 'Desain Grafis',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 4
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '119890123',
                'nama'          => 'Rudi Santosa',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '1998-06-18',
                'alamat'        => 'Jalan Pahlawan No. 7',
                'asal_sekolah'  => 'SMA Negeri 7',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08456789012',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 5
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '691901234',
                'nama'          => 'Budi Wicaksono',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '2000-08-12',
                'alamat'        => 'Jalan Raya No. 9',
                'asal_sekolah'  => 'SMA Negeri 4',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08567890123',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 6
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '789010013',
                'nama'          => 'Sari Fitriani',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Semarang',
                'tanggal_lahir' => '1999-12-30',
                'alamat'        => 'Jalan Flamboyan No. 2',
                'asal_sekolah'  => 'SMA Negeri 3',
                'jurusan'       => 'Akuntansi',
                'no_telpon'     => '08678901234',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 7
            [
                'kelas_id'      => '18',
                'jabatan_id'    => '1',
                'nim'           => '010123456',
                'nama'          => 'Eka Nuraini',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bali',
                'tanggal_lahir' => '2001-04-10',
                'alamat'        => 'Jalan Kembang No. 1',
                'asal_sekolah'  => 'SMA Negeri 8',
                'jurusan'       => 'Sistem Informasi',
                'no_telpon'     => '08765432109',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // MKP02
            // 1
            [
                'kelas_id'      => '19',
                'jabatan_id'    => '1',
                'nim'           => '263019455',
                'nama'          => 'Ardiansyah Pratama',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '1998-11-25',
                'alamat'        => 'Jalan Kenangan No. 15',
                'asal_sekolah'  => 'SMA Negeri 1',
                'jurusan'       => 'Teknik Mesin',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '19',
                'jabatan_id'    => '1',
                'nim'           => '234111780',
                'nama'          => 'Rina Setiawati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1999-10-15',
                'alamat'        => 'Jalan Cendana No. 8',
                'asal_sekolah'  => 'SMA Negeri 2',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '19',
                'jabatan_id'    => '1',
                'nim'           => '345778901',
                'nama'          => 'Joko Santoso',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2000-02-20',
                'alamat'        => 'Jalan Melati No. 4',
                'asal_sekolah'  => 'SMA Negeri 3',
                'jurusan'       => 'Sistem Informasi',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 4
            [
                'kelas_id'      => '19',
                'jabatan_id'    => '1',
                'nim'           => '451389012',
                'nama'          => 'Maya Indah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2001-03-10',
                'alamat'        => 'Jalan Anggrek No. 12',
                'asal_sekolah'  => 'SMA Negeri 4',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08765432109',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],


            // AB15
            // 1
            [
                'kelas_id'      => '20',
                'jabatan_id'    => '1',
                'nim'           => '582690123',
                'nama'          => 'Ayu Wulandari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Medan',
                'tanggal_lahir' => '2001-05-15',
                'alamat'        => 'Jalan Merpati No. 9',
                'asal_sekolah'  => 'SMA Negeri 8',
                'jurusan'       => 'Desain Komunikasi Visual',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '20',
                'jabatan_id'    => '1',
                'nim'           => '678901200',
                'nama'          => 'Budi Setiawan',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '1999-12-20',
                'alamat'        => 'Jalan Jati No. 6',
                'asal_sekolah'  => 'SMA Negeri 2',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08567890123',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '20',
                'jabatan_id'    => '1',
                'nim'           => '70191245',
                'nama'          => 'Dewi Saraswati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2000-04-10',
                'alamat'        => 'Jalan Kencana No. 7',
                'asal_sekolah'  => 'SMA Negeri 5',
                'jurusan'       => 'Ilmu Komputer',
                'no_telpon'     => '08765432109',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 4
            [
                'kelas_id'      => '20',
                'jabatan_id'    => '1',
                'nim'           => '891923456',
                'nama'          => 'Eko Prabowo',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2001-06-05',
                'alamat'        => 'Jalan Kembang No. 2',
                'asal_sekolah'  => 'SMA Negeri 4',
                'jurusan'       => 'Akuntansi',
                'no_telpon'     => '08678901234',
                'status_ukm'    => 'Bukan Anggota',
                'alasan'        => '-',
            ],

            // 5
            [
                'kelas_id'      => '20',
                'jabatan_id'    => '1',
                'nim'           => '901234567',
                'nama'          => 'Fita Rahmawati',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Yogyakarta',
                'tanggal_lahir' => '2000-09-30',
                'alamat'        => 'Jalan Mawar No. 10',
                'asal_sekolah'  => 'SMA Negeri 6',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08765432110',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // TO21
            // 1
            [
                'kelas_id'      => '21',
                'jabatan_id'    => '1',
                'nim'           => '829182846',
                'nama'          => 'Lena Yuliana',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2000-01-15',
                'alamat'        => 'Jalan Rawa No. 11',
                'asal_sekolah'  => 'SMA Negeri 9',
                'jurusan'       => 'Desain Grafis',
                'no_telpon'     => '08123456789',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 2
            [
                'kelas_id'      => '21',
                'jabatan_id'    => '1',
                'nim'           => '004167890',
                'nama'          => 'Hendra Wijaya',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '1999-05-22',
                'alamat'        => 'Jalan Cendana No. 4',
                'asal_sekolah'  => 'SMA Negeri 10',
                'jurusan'       => 'Teknik Sipil',
                'no_telpon'     => '08234567890',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],

            // 3
            [
                'kelas_id'      => '21',
                'jabatan_id'    => '1',
                'nim'           => '345678991',
                'nama'          => 'Maya Sari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2001-07-19',
                'alamat'        => 'Jalan Anggrek No. 5',
                'asal_sekolah'  => 'SMA Negeri 12',
                'jurusan'       => 'Manajemen',
                'no_telpon'     => '08345678901',
                'status_ukm'    => 'Anggota LCC',
                'alasan'        => '-',
            ],


        ])->each(function ($data) {
            Mahasiswa::create($data);
        });
    }
}
