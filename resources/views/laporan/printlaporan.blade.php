<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Print - E-Presence LCC</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img_logo/LogoLCC.png" rel="icon">
    <link href="/img_logo/LogoLCC.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assetsadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assetsadmin/css/style.css" rel="stylesheet">
</head>

<body style="font-family: 'Times New Roman', Times, serif; font-size: 12px; background-color:#fff; color:#000">
    <section class="section">
        <img src="/img_logo/Logo_Politeknik_LP3I.png" alt="" class="mt-3 mx-4"
            style="position: absolute; width: 55px;">
        <div class="mx-3" style="display: flex; justify-content: end;">
            <img src="/assetsadmin/img/LogoLCC.png" alt="" style="position: absolute; width: 100px;">
        </div>
        <div class="text-center">
            <p class="fw-bold mt-4" style="font-size: 16px">Laporan Kehadiran UKM LCC</p>
            <p class="fw-bold" style="margin-top: -17px; font-size: 16px">Politeknik LP3I Tasikmalaya</p>
            <p style="margin-top: -17px">Jl. Ir. H. Juanda, Panglayungan, Kec. Cipedes, Kab. Tasikmalaya</p>
        </div>
        <div class="border-bottom border-dark mx-3 mb-1 mt-4"></div>
        <div class="border-bottom border-dark mx-3"></div>

        <div class="table-responsive mx-3 my-3" style="font-size: 8px !important;">
            <table class="table table-bordered border-dark">
                <thead class="text-center" style="white-space: nowrap; vertical-align: middle;">
                    <tr>
                        <th>No.</th>
                        <th>Nama Mahasiswa</th>
                        <th>Kelas</th>
                        <th>Gender</th>
                        @foreach ($kehadiran as $item)
                            <th>
                                {{ $item->kegiatan->kegiatan }} <br>
                                <small>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</small>
                            </th>
                        @endforeach
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody style="white-space: nowrap">
                    @foreach ($statuskehadiran->groupBy('mahasiswa_id') as $mahasiswaKehadiran)
                        @php
                            $mahasiswa = $mahasiswaKehadiran->first()->mahasiswa;
                            $hitunghadir = $mahasiswaKehadiran->where('status_kehadiran', 'Hadir')->count();
                            $hitungizin = $mahasiswaKehadiran->where('status_kehadiran', 'Izin')->count();
                            $hitungsakit = $mahasiswaKehadiran->where('status_kehadiran', 'Sakit')->count();
                            $hitungalfa = $mahasiswaKehadiran->where('status_kehadiran', 'Alfa')->count();
                        @endphp
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td class="text-center">{{ $mahasiswa->kelas->kelas }}</td>
                            <td class="text-center">{{ $mahasiswa->jenis_kelamin }}</td>
                            @foreach ($kehadiran as $kehadiranItem)
                                @php
                                    $statusKehadiran = $mahasiswaKehadiran->firstWhere(
                                        'kehadiran_id',
                                        $kehadiranItem->id,
                                    );
                                @endphp
                                <td class="text-center">
                                    @if ($statusKehadiran)
                                        @if ($statusKehadiran->status_kehadiran == 'Hadir')
                                            <span>{{ $statusKehadiran->status_kehadiran }}</span>
                                        @elseif ($statusKehadiran->status_kehadiran == 'Izin')
                                            <span>{{ $statusKehadiran->status_kehadiran }}</span>
                                        @elseif ($statusKehadiran->status_kehadiran == 'Sakit')
                                            <span>{{ $statusKehadiran->status_kehadiran }}</span>
                                        @elseif ($statusKehadiran->status_kehadiran == 'Alfa')
                                            <span>{{ $statusKehadiran->status_kehadiran }}</span>
                                        @endif
                                    @else
                                        <span>Keluar</span>
                                    @endif
                                </td>
                            @endforeach
                            <td class="text-center">
                                <span>{{ $hitunghadir }} Hadir </span>,
                                <span>{{ $hitungsakit }} Sakit </span>,
                                <span>{{ $hitungizin }} Izin </span>,
                                <span>{{ $hitungalfa }} Alfa </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </section>

    <script>
        addEventListener('load',function myfunction(){
            window.print()
        });
    </script>
</body>

</html>

{{-- <div>
            @foreach ($statuskehadiran->groupBy('mahasiswa_id') as $mahasiswaKehadiran)
                @php
                    $mahasiswa = $mahasiswaKehadiran->first()->mahasiswa;
                    $hitunghadir = $mahasiswaKehadiran->where('status_kehadiran', 'Hadir')->count();
                    $hitungizin = $mahasiswaKehadiran->where('status_kehadiran', 'Izin')->count();
                    $hitungsakit = $mahasiswaKehadiran->where('status_kehadiran', 'Sakit')->count();
                    $hitungalfa = $mahasiswaKehadiran->where('status_kehadiran', 'Alfa')->count();
                @endphp
                <table>
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>
                                <span>{{ $hitunghadir }} Hadir </span>,
                                <span>{{ $hitungsakit }} Sakit </span>,
                                <span>{{ $hitungizin }} Izin </span>,
                                <span>{{ $hitungalfa }} Alfa </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endforeach
        </div> --}}
