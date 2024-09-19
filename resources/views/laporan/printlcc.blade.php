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
                <div class="col-9" style="margin-left: -50px"></div>
            </div>
            <div class="row">
                <div class="col-2">Nama Kegiatan</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px"></div>
            </div>
            <div class="row">
                <div class="col-2">Keterangan</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px"></div>
            </div>
            <div class="row">
                <div class="col-2">Waktu</div>
                <div class="col-1">:</div>
                <div class="col-9" style="margin-left: -50px"></div>
            </div>
        </div>

        <div class="table-responsive my-3">
            <table class="table table-bordered">
                <thead class="text-center">
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Prodi</th>
                    <th>Kelas</th>
                    <th>Gender</th>
                    <th colspan="2">Tanda Tangan</th>
                </thead>
                <tbody>
                    @foreach ($datalcc as $item)
                        <tr class="border">
                            <td class="text-center">{{ $loop->iteration }}.</td>
                            <td>{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->kelas->prodi->prodi }}</td>
                            <td class="text-center">{{ $item->kelas->kelas }}</td>
                            <td class="text-center">{{ $item->jenis_kelamin }}</td>
                            <td rowspan="2">{{ $loop->iteration }}.</td>
                        </tr>
                    @endforeach
                    <tr height="50px">
                        <td colspan="5"></td>
                        <td></td>
                    </tr>
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
