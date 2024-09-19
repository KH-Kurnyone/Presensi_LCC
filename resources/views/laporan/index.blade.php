@extends('master.indexadmin')
<title>
    Laporan - E-Presence LCC</title>
{{-- <div class="header-mobile">
    <a class="text-secondary" data-bs-toggle="modal" data-bs-target="#logout">
        <div class="d-flex justify-content-end">
            <i class="bi bi-box-arrow-right fs-1 mx-3 my-4" style="position: absolute"></i>
        </div>
    </a>
    <div class="d-flex">
        <img src="/img_logo/LogoLCC.png" width="70px">
        <p class="fs-4 mt-2 fw-bold">E-Presence LCC</p>
    </div>
    <p style="margin-left: 70px; margin-top: -32px">{{ auth()->user()->username }}</p>
    <div class="border mx-3"></div>
</div> --}}
@section('content')
    @include('sweetalert::alert')
    {{-- <div class="mobile"> --}}
    <div class="pagetitle mt-2">
        <h1 class="fw-bold text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-file-earmark-pdf-fill mb-2" viewBox="0 0 16 16">
                <path
                    d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                <path fill-rule="evenodd"
                    d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
            </svg> Laporan Kehadiran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">

        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card p-2">
            <p class="mx-3 my-3 fs-5 fw-bold"><i class="bi bi-file-earmark-pdf-fill fs-3"></i> Laporan Kehadiran Per Minggu
                / Bulan</p>
            <div class="border border-secondary mx-3"></div>
            <form action="/laporan" method="GET">
                @csrf
                <div class="row mx-1 my-3">
                    {{-- <div class="col-lg-4 my-1">
                        <label for="" class="fw-bold">Nama Kegiatan</label>
                        <select name="" id="" class="form-select shadow-sm">
                            <option disabled selected hidden></option>
                            <option value="">Office Class</option>
                            <option value="">Multimedia Class</option>
                            <option value="">Programing Class</option>
                        </select>
                    </div> --}}
                    <div class="col-lg-4 my-1">
                        <label class="fw-bold">Filter Kegiatan</label>
                        <select name="kegiatan" class="form-select shadow-sm @error('kegiatan') is-invalid @enderror"
                            tabindex="1">
                            <option disabled selected hidden></option>
                            @foreach ($datakegiatan as $item)
                                <option value="{{ $item->id }}" {{ old('kegiatan') == $item->id ? 'selected' : '' }}>
                                    {{ $item->kegiatan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 my-1">
                        <label class="fw-bold">Dari Tanggal</label>
                        <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror shadow-sm"
                            name="tanggal_awal" tabindex="2">
                    </div>
                    <div class="col-lg-4 my-1">
                        <label class="fw-bold">Sampai Tanggal</label>
                        <div class="input-group">
                            <input type="date"
                                class="form-control @error('tanggal_akhir') is-invalid @enderror shadow-sm"
                                style="border-radius: 5px" name="tanggal_akhir" tabindex="3">
                            {{-- <button class="btn btn-login text-white ms-3 me-2 logo-mobile" style="border-radius: 5px"><i
                                    class="bi bi-search"></i></button>
                            <a href="/laporan" class="btn btn-login text-white logo-mobile" style="border-radius: 5px">
                                <div style="margin-top: 30%"><i class="bi bi-arrow-clockwise"></i></div>
                            </a> --}}
                        </div>
                    </div>
                    <div class="d-flex mt-2">
                        <button class="btn btn-danger btn-login text-white me-2" style="border-radius: 5px" tabindex="4"><i
                                class="bi bi-search"></i> Cari
                            Data</button>
                        <a href="/laporan" class="btn btn-danger btn-login text-white" style="border-radius: 5px" tabindex="5">
                            <i class="bi bi-arrow-clockwise"></i> Refresh
                        </a>
                    </div>
                </div>
            </form>

            {{-- <form action=""> --}}
            {{-- <div class="table-responsive mx-3"> --}}
            {{-- @if ($kehadiran && $statuskehadiran) --}}
            @if ($kehadiran->isEmpty())
                <div class="table-responsive mx-3">
                    <table class="table table-bordered table-hover">
                        <thead class="table-secondary text-center" style="white-space: nowrap; vertical-align: middle;">
                            <tr>
                                <th>No.</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kelas</th>
                                <th>Gender</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center text-danger">Filter Data Terlebih Dahulu!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <div class="table-responsive mx-3">
                    <table class="table table-bordered table-hover">
                        <thead class="table-secondary text-center" style="white-space: nowrap; vertical-align: middle;">
                            <tr class="fixed-left">
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
                                <tr class="fixed-left">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                    <td>{{ $mahasiswa->kelas->kelas }}</td>
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
                                                    <span
                                                        class="badge rounded-pill bg-success badge-kehadiran">{{ $statusKehadiran->status_kehadiran }}</span>
                                                @elseif ($statusKehadiran->status_kehadiran == 'Izin')
                                                    <span
                                                        class="badge rounded-pill bg-info text-dark badge-kehadiran">{{ $statusKehadiran->status_kehadiran }}</span>
                                                @elseif ($statusKehadiran->status_kehadiran == 'Sakit')
                                                    <span
                                                        class="badge rounded-pill bg-warning text-dark badge-kehadiran">{{ $statusKehadiran->status_kehadiran }}</span>
                                                @elseif ($statusKehadiran->status_kehadiran == 'Alfa')
                                                    <span
                                                        class="badge rounded-pill bg-danger badge-kehadiran">{{ $statusKehadiran->status_kehadiran }}</span>
                                                @endif
                                            @else
                                                <span class="badge rounded-pill bg-secondary badge-kehadiran">Keluar</span>
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="text-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#keteranganKehadiran{{ $mahasiswa->id }}"><i
                                                class="bi bi-three-dots-vertical"></i></button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="keteranganKehadiran{{ $mahasiswa->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Keterangan
                                                    {{ $mahasiswa->nama }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-lg-flex text-center">
                                                <span
                                                    class="badge rounded-pill bg-success badge-kehadiran mb-2 py-lg-3">{{ $hitunghadir }}
                                                    Hadir </span>
                                                <span
                                                    class="badge rounded-pill bg-warning text-white badge-kehadiran mx-1 mb-2 py-lg-3">{{ $hitungsakit }}
                                                    Sakit </span>
                                                <span
                                                    class="badge rounded-pill bg-info text-white badge-kehadiran mb-2 py-lg-3">{{ $hitungizin }}
                                                    Izin </span>
                                                <span
                                                    class="badge rounded-pill bg-danger badge-kehadiran mx-1 mb-2 py-lg-3">{{ $hitungalfa }}
                                                    Alfa </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end my-3 mx-3">
                    <div class="titik-mobile">
                        <form action="/laporan/create" method="GET" target="_blank">
                            @csrf
                            <input type="hidden" name="kegiatan" value="{{ request('kegiatan') }}">
                            <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                            <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                            <button class="btn btn-danger btn-login text-white">Cetak Laporan <i
                                    class="bi bi-box-arrow-in-right"></i></button>
                        </form>
                    </div>
                </div>
            @endif
            {{-- @else
                <div class="table-responsive mx-3">
                    <table class="table table-bordered table-hover">
                        <thead class="table-secondary text-center" style="white-space: nowrap; vertical-align: middle;">
                            <tr>
                                <th>No.</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kelas</th>
                                <th>Gender</th>
                                <th>Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center">Filter Data Terlebih Dahulu</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif --}}
        </div>

        {{-- </form> --}}
        {{-- </div> --}}

        @can('Admin')
            <div class="card-header bg-primary" style="padding: 2px"></div>
            <div class="card p-2">
                <p class="mx-3 my-3 fs-5 fw-bold"><i class="bi bi-file-earmark-pdf-fill fs-3"></i> Cetak Absensi Anggota LCC
                </p>
                <div class="accordion accordion-flush border mx-3 mb-3" id="accordionFlushExample">
                    <div class="accordion-item border-secondary shadow-sm">
                        <div class="mx-3">
                            <h2 class="accordion-header" id="flush-headingLCC">
                                <button class="accordion-button collapsed fw-bold fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseLCC" aria-expanded="false"
                                    aria-controls="flush-collapseLCC">
                                    Anggota LP3I Computer Club - Tingkat I
                                </button>
                            </h2>
                            <div id="flush-collapseLCC" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingLCC" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="table-responsive my-2">
                                        <table class="table table-bordered">
                                            <thead class="table-secondary text-center" style="white-space: nowrap">
                                                <th>No.</th>
                                                <th>Nama Lengkap</th>
                                                <th>Prodi</th>
                                                <th>Kelas</th>
                                                <th>Gender</th>
                                                <th colspan="2">Tanda Tangan</th>
                                            </thead>
                                            <tbody style="white-space: nowrap">
                                                @foreach ($datalcc as $item)
                                                    <tr class="border">
                                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->kelas->prodi->prodi }}</td>
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
                                    <div class="d-flex justify-content-end">
                                        <div class="titik-mobile">
                                            <a href="/printlcc" target="_blank" class="btn btn-danger btn-danger btn-login text-white">Cetak
                                                Absensi <i class="bi bi-box-arrow-in-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('Petugas')
            <div class="card-header bg-primary" style="padding: 2px"></div>
            <div class="card p-2">
                <p class="mx-3 my-3 fs-5 fw-bold"><i class="bi bi-file-earmark-pdf-fill fs-3"></i> Cetak Absensi Anggota LCC
                </p>
                <div class="accordion accordion-flush border mx-3 mb-3" id="accordionFlushExample">
                    <div class="accordion-item border-secondary shadow-sm">
                        <div class="mx-3">
                            <h2 class="accordion-header" id="flush-headingLCC">
                                <button class="accordion-button collapsed fw-bold fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseLCC" aria-expanded="false"
                                    aria-controls="flush-collapseLCC">
                                    Anggota LP3I Computer Club - Tingkat I
                                </button>
                            </h2>
                            <div id="flush-collapseLCC" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingLCC" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="table-responsive my-2">
                                        <table class="table table-bordered">
                                            <thead class="table-secondary text-center" style="white-space: nowrap">
                                                <th>No.</th>
                                                <th>Nama Lengkap</th>
                                                <th>Prodi</th>
                                                <th>Kelas</th>
                                                <th>Gender</th>
                                                <th colspan="2">Tanda Tangan</th>
                                            </thead>
                                            <tbody style="white-space: nowrap">
                                                @foreach ($datalcc as $item)
                                                    <tr class="border">
                                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->kelas->prodi->prodi }}</td>
                                                        <td class="text-center">{{ $item->kelas->kelas }}</td>
                                                        <td>{{ $item->jenis_kelamin }}</td>
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
                                    <div class="d-flex justify-content-end">
                                        <div class="titik-mobile">
                                            <a href="/printlcc" target="_blank" class="btn btn-danger btn-login text-white">Cetak
                                                Absensi <i class="bi bi-box-arrow-in-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        @can('Admin')
            <div class="card-header bg-primary" style="padding: 2px"></div>
            <div class="card p-2">
                <p class="mx-3 my-3 fs-5 fw-bold"><i class="bi bi-file-earmark-pdf-fill fs-3"></i> Cetak Absensi Per Kelas
                </p>
                @foreach ($datakelas as $item)
                    <div class="accordion accordion-flush mx-3 mb-1" id="accordionFlushExample">
                        <div class="accordion-item border rounded-2">
                            <div class="mx-3">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $item->id }}"
                                        aria-expanded="false" aria-controls="flush-collapseOne{{ $item->id }}">
                                        {{ $loop->iteration }}. {{ $item->prodi->prodi }}, {{ $item->kelas }}
                                    </button>
                                </h2>
                                <div id="flush-collapseOne{{ $item->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive my-2">
                                            <table class="table table-bordered">
                                                <thead class="table-secondary text-center" style="white-space: nowrap">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>NIM</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Kelas</th>
                                                        <th colspan="2">Tanda Tangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="white-space: nowrap">
                                                    @foreach ($item->mahasiswa as $mahasiswa)
                                                        <tr class="border">
                                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                                            <td class="text-center">{{ $mahasiswa->nim }}</td>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td class="text-center">{{ $mahasiswa->jenis_kelamin }}</td>
                                                            <td class="text-center">{{ $mahasiswa->kelas->kelas }}</td>
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
                                        <div class="d-flex justify-content-end">
                                            <div class="titik-mobile">
                                                <a href="#" target="" class="btn btn-danger btn-login text-white">Cetak
                                                    Absensi <i class="bi bi-box-arrow-in-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endcan

        @can('Petugas')
            <div class="card-header bg-primary" style="padding: 2px"></div>
            <div class="card p-2">
                <p class="mx-3 my-3 fs-5 fw-bold"><i class="bi bi-file-earmark-pdf-fill fs-3"></i> Cetak Absensi Per Kelas
                </p>
                @foreach ($datakelas as $item)
                    <div class="accordion accordion-flush mx-3 mb-1" id="accordionFlushExample">
                        <div class="accordion-item border rounded-2">
                            <div class="mx-3">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed fw-bold" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $item->id }}"
                                        aria-expanded="false" aria-controls="flush-collapseOne{{ $item->id }}">
                                        {{ $loop->iteration }}. {{ $item->prodi->prodi }}, {{ $item->kelas }}
                                    </button>
                                </h2>
                                <div id="flush-collapseOne{{ $item->id }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="table-responsive my-2">
                                            <table class="table table-bordered">
                                                <thead class="table-secondary text-center" style="white-space: nowrap">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>NIM</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Kelas</th>
                                                        <th colspan="2">Tanda Tangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="white-space: nowrap">
                                                    @foreach ($item->mahasiswa as $mahasiswa)
                                                        <tr class="border">
                                                            <td class="text-center">{{ $loop->iteration }}.</td>
                                                            <td class="text-center">{{ $mahasiswa->nim }}</td>
                                                            <td>{{ $mahasiswa->nama }}</td>
                                                            <td class="text-center">{{ $mahasiswa->jenis_kelamin }}</td>
                                                            <td class="text-center">{{ $mahasiswa->kelas->kelas }}</td>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endcan

    </section>
    {{-- </div> --}}
    {{-- <div class="container">
        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-center">404</h1>
            <h2 class="text-center">Maaf, Halaman ini masih dalam tahap pengembangan.</h2>
            <img src="/assetsadmin/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
            <div class="credits">
                Created By <a href="/dashboard">KH-Project</a>
            </div>
        </section>
    </div> --}}
@endsection
