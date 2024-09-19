<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Favicons -->
    <link href="/img_logo/LogoLCC.png" rel="icon">
    <link href="/img_logo/LogoLCC.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assetsadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/simple-datatables/style.css" rel="stylesheet">
</head>

<body>
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <div class="card border">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#a50000" fill-opacity="1"
                d="M0,256L30,224C60,192,120,128,180,138.7C240,149,300,235,360,256C420,277,480,235,540,208C600,181,660,171,720,165.3C780,160,840,160,900,181.3C960,203,1020,245,1080,250.7C1140,256,1200,224,1260,202.7C1320,181,1380,171,1410,165.3L1440,160L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z">
            </path>
        </svg>
        <div class="card-body p-4">
            <div class="text-center">
                <div class="fw-bold">
                    <div class="fs-5">Kartu Tanda Anggota</div>
                    <div class="fs-5" style="margin-top: -1%">Website E-Presence LCC</div>
                    <div class="fs-5" style="margin-top: -1%">LP3I Computer CLub</div>
                </div>
                <div class="d-flex justify-content-center mt-3 mb-1">
                    {!! DNS2D::getBarcodeHTML('' . Auth::user()->mahasiswa->nim, 'QRCODE', 7, 7) !!}
                </div>
                <div>
                    NIM : {{ auth()->user()->mahasiswa->nim }}
                </div>
            </div>
            <div class="border border-dark mt-3"></div>
            <div class="border border-dark mt-1 mb-3"></div>
            <div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">Nama Lengkap</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->nama }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">Jenis Kelamin</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->jenis_kelamin }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">TTL</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->tempat_lahir }},
                        {{ Carbon::parse($user->mahasiswa->tanggal_lahir)->translatedFormat('d F Y') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">Alamat</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->alamat }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">Asal Sekolah</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->asal_sekolah }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">Jurusan</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->jurusan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 text-dark fw-bold">No. Telp.</div>
                    <div class="col-lg-1">:</div>
                    <div class="col-lg-7 text-dark" style="margin-left: -4%">
                        {{ $user->mahasiswa->no_telpon }}
                    </div>
                </div>

            </div>
        </div>
        <div style="margin-top: -7%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#a50000" fill-opacity="1"
                    d="M0,256L30,224C60,192,120,128,180,138.7C240,149,300,235,360,256C420,277,480,235,540,208C600,181,660,171,720,165.3C780,160,840,160,900,181.3C960,203,1020,245,1080,250.7C1140,256,1200,224,1260,202.7C1320,181,1380,171,1410,165.3L1440,160L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                </path>
            </svg>
        </div>
    </div>
</body>

</html>
