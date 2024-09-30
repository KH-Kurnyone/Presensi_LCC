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
    <style>
        @media print {
            @page {
                margin: 2cm;
            }

            body {
                margin: 0;
            }
        }
    </style>

</head>

<body style="font-family: 'Times New Roman', Times, serif; font-size: 12px; background-color:#fff; color:#000;">
    <section class="section">
        <img src="/img_logo/Logo_Politeknik_LP3I.png" alt="" class="mx-4"
            style="position: absolute; width: 55px;">
        <div class="mx-3" style="display: flex; justify-content: end;">
            <img src="/assetsadmin/img/LogoLCC.png" alt=""
                style="position: absolute; width: 100px; margin-top: -15px;">
        </div>
        <div class="text-center">
            <p class="fw-bold" style="font-size: 16px">Laporan Kehadiran UKM LCC</p>
            <p class="fw-bold" style="margin-top: -17px; font-size: 16px">Politeknik LP3I Tasikmalaya</p>
            <p style="margin-top: -17px">Jl. Ir. H. Juanda, Panglayungan, Kec. Cipedes, Kab. Tasikmalaya</p>
        </div>
        <div class="border-bottom border-dark mx-3 mb-1 mt-4"></div>
        <div class="border-bottom border-dark mx-3"></div>
        <div class="mx-3 mt-3">
            {{-- <div class="row">
                <div class="col-6">
                    <div class="d-flex">
                        <div style="width: 100px;">Kegiatan</div>
                        <div class="ms-lg-5 ms-2">: {{ $kehadiran->kegiatan->kegiatan }},</div>
                    </div>

                    <div class="d-flex">
                        <div style="width: 100px;">Waktu</div>
                        <div class="ms-lg-5 ms-2">:
                            @foreach ($dataSesi as $item)
                                {{ $item->sesi }},
                            @endforeach
                        </div>
                    </div>

                    <div class="d-flex">
                        <div style="width: 100px;">Keterangan</div>
                        <div class="ms-lg-5 ms-2">: {{ $kehadiran->ket_kegiatan }}.</div>
                    </div>
                </div>
                <div class="col-6 text-end mt-md-0">
                    @php
                        use Carbon\Carbon;
                        Carbon::setLocale('id');
                    @endphp
                    <div>
                        {{ Carbon::parse($kehadiran->tanggal)->translatedFormat('l, d F Y') }}
                    </div>
                    <div>
                        Pemateri : {{ $kehadiran->mahasiswa->nama }}
                    </div>
                </div>
            </div> --}}
            @php
                use Carbon\Carbon;
                Carbon::setLocale('id');
            @endphp
            <div class="row">
                <div class="col-lg-8 col-8 ">
                    <div class="row">
                        <div class="col-lg-3 col-4">Kegiatan</div>
                        <div class="col-lg-1 col-1">:</div>
                        <div class="col-lg-8 col-7" style="margin-left: -4%">{{ $kehadiran->kegiatan->kegiatan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-4">Keterangan</div>
                        <div class="col-lg-1 col-1">:</div>
                        <div class="col-lg-8 col-7" style="margin-left: -4%">{{ $kehadiran->ket_kegiatan }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-4">Waktu</div>
                        <div class="col-lg-1 col-1">:</div>
                        <div class="col-lg-8 col-7" style="margin-left: -8%">
                            <ul>
                                @foreach ($dataSesi as $item)
                                    <li>
                                        {{ $item->sesi }}
                                        ({{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-4 text-end">
                    <div>
                        {{ Carbon::parse($kehadiran->tanggal)->translatedFormat('l, d F Y') }}
                    </div>
                    <div>
                        Pemateri :
                        @if ($kehadiran->mahasiswa_id == 0)
                            BPH LCC
                        @else
                            {{ $kehadiran->mahasiswa->nama }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive mx-3">
            <table class="table table-bordered border-dark table-sm">
                <thead class="text-center">
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    {{-- <th>Prodi</th> --}}
                    <th>Kelas</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Waktu Hadir</th>
                    <th>Keterangan</th>
                </thead>
                <tbody>
                    @foreach ($statuskehadiran as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item->mahasiswa->nama }}</td>
                            {{-- <td>{{ $item->mahasiswa->kelas->prodi->prodi }}</td> --}}
                            <td class="text-center">{{ $item->mahasiswa->kelas->kelas }}</td>
                            <td class="text-center">{{ $item->mahasiswa->jenis_kelamin }}</td>
                            <td class="text-center">{{ $item->status_kehadiran }}</td>
                            @if ($item->waktu_hadir === null)
                                <td class="text-center">-</td>
                            @else
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->waktu_hadir)->format('H:i') }}
                                </td>
                            @endif
                            <td class="text-center">{{ $item->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mx-3">
            <div class="fw-bold fs-6">Keterangan Kehadiran</div>
            <div class="d-flex">
                <div class="col-2">
                    - Total Hadir
                </div>
                <div class="col-10">
                    : {{ $jumlahHadir }} Mahasiswa ({{ $jumlahDisiplin }} Awal/Tepat Waktu dan {{ $jumlahTelat }}
                    Telat)
                </div>
            </div>
            <div class="d-flex">
                <div class="col-2">
                    - Total Sakit
                </div>
                <div class="col-10">
                    : {{ $jumlahSakit }} Mahasiswa
                </div>
            </div>
            <div class="d-flex">
                <div class="col-2">
                    - Total Izin
                </div>
                <div class="col-10">
                    : {{ $jumlahIzin }} Mahasiswa
                </div>
            </div>
            <div class="d-flex">
                <div class="col-2">
                    - Total Alfa
                </div>
                <div class="col-10">
                    : {{ $jumlahAlfa }} Mahasiswa
                </div>
            </div>
        </div>
    </section>

    <script>
        addEventListener('load', function myfunction() {
            window.print()
        });
    </script>
</body>

</html>
