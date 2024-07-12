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
        <div class="mx-3 mt-3">
            <div class="row">
                <div class="col-2">Tanggal</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px">
                    {{ \Carbon\Carbon::parse($kehadiran->tanggal)->format('d/m/Y') }}</div>
            </div>
            <div class="row">
                <div class="col-2">Nama Kegiatan</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px">{{ $kehadiran->kegiatan->kegiatan }}</div>
            </div>
            {{-- <div class="row">
                <div class="col-2">Pertemuan Ke</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px">{{ $kehadiran->pertemuan }}</div>
            </div> --}}
            <div class="row">
                <div class="col-2">Keterangan</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px">{{ $kehadiran->ket_kegiatan }}</div>
            </div>
        </div>

        <div class="table-responsive mx-3 my-3">
            <table class="table table-bordered border-dark table-sm">
                <thead class="text-center">
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Kelas</th>
                    <th>Gender</th>
                    <th>Status Kehadiran</th>
                </thead>
                <tbody>
                    @foreach ($statuskehadiran as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item->mahasiswa->nama }}</td>
                            <td class="text-center">{{ $item->mahasiswa->kelas->prodi->prodi }}</td>
                            <td class="text-center">{{ $item->mahasiswa->kelas->kelas }}</td>
                            <td class="text-center">{{ $item->mahasiswa->jenis_kelamin }}</td>
                            <td class="text-center">{{ $item->status_kehadiran }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script>
        addEventListener('load', function myfunction() {
            window.print()
        });
    </script>
</body>

</html>
