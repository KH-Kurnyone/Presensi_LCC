@extends('master.indexadmin')
<title>Detail Data Kehadiran - E-Presence LCC</title>
@section('content')
    {{-- <div class="mobile"> --}}
    <div class="pagetitle">
        <h1 class="text-dark fw-bold">
            <a href="/kehadiran" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-arrow-left mb-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg></a>
            Detail Data Kehadiran
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/kehadiran">Data Kehadiran</a></li>
                <li class="breadcrumb-item active"><a href="/kehadiran/create">Detail Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <img src="/img_logo/Logo_Politeknik_LP3I.png" alt="" class="mt-3 mx-4 logo-lp3i-dekstop logo-lp3i-mobile">
            <div class="mx-3" style="display: flex; justify-content: end;">
                <img src="/assetsadmin/img/LogoLCC.png" alt="" class="logo-lcc-dekstop logo-lcc-mobile">
            </div>
            <div class="text-center">
                <h3 class="fw-bold mt-4 text-kehadiran-mobile">Laporan Kehadiran UKM LCC</h3>
                <h4 class="fw-bold text-kehadiran-mobile" style="margin-top: -10px;">Politeknik LP3I Tasikmalaya</h4>
                <p class="text-kehadiran-mobile2" style="margin-top: -10px;">Jl. Ir. H. Juanda, Panglayungan, Kec.
                    Cipedes, Kab. Tasikmalaya</p>
            </div>
            <div class="border-bottom border-dark mx-3 mb-1"></div>
            <div class="border-bottom border-dark mx-3"></div>
            <div class="mx-3 mt-3 text-detail-mobile">
                <div class="row">
                    <div class="col-lg-2 col-4">Tanggal</div>
                    <div class="col-lg-1 col-1">:</div>
                    <div class="col-lg-9 col-7 margin-left-dekstop">
                        {{ \Carbon\Carbon::parse($kehadiran->tanggal)->format('d/m/Y') }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-4">Kegiatan</div>
                    <div class="col-lg-1 col-1">:</div>
                    <div class="col-lg-9 col-7 margin-left-dekstop ">{{ $kehadiran->kegiatan->kegiatan }}</div>
                </div>
                {{-- <div class="row">
                        <div class="col-lg-2 col-4">Pertemuan</div>
                        <div class="col-lg-1 col-1">:</div>
                        <div class="col-lg-9 col-7 margin-left-dekstop">{{ $kehadiran->pertemuan }}</div>
                    </div> --}}
                <div class="row">
                    <div class="col-lg-2 col-4">Keterangan</div>
                    <div class="col-lg-1 col-1">:</div>
                    <div class="col-lg-9 col-7 margin-left-dekstop">{{ $kehadiran->ket_kegiatan }}</div>
                </div>
            </div>

            {{-- Table Kehadiran --}}
            <div class="table-responsive mx-3 my-3">
                <table class="table table-bordered">
                    <thead class="table-secondary text-center" style="white-space: nowrap">
                        <th>No.</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Kelas</th>
                        <th>Gender</th>
                        <th>Status Kehadiran</th>
                    </thead>
                    <tbody style="white-space: nowrap">
                        @foreach ($statuskehadiran as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td class="text-center">{{ $item->mahasiswa->kelas->prodi->prodi }}</td>
                                <td class="text-center">{{ $item->mahasiswa->kelas->kelas }}</td>
                                <td class="text-center">{{ $item->mahasiswa->jenis_kelamin }}</td>
                                {{-- <td class="text-center">{{ $item->status_kehadiran }}</td> --}}
                                <td class="text-center">
                                    @if ($item->status_kehadiran == 'Hadir')
                                        <span
                                            class="badge rounded-pill bg-success badge-kehadiran">{{ $item->status_kehadiran }}</span>
                                    @elseif ($item->status_kehadiran == 'Izin')
                                        <span
                                            class="badge rounded-pill bg-info text-dark badge-kehadiran">{{ $item->status_kehadiran }}</span>
                                    @elseif ($item->status_kehadiran == 'Sakit')
                                        <span
                                            class="badge rounded-pill bg-warning text-dark badge-kehadiran">{{ $item->status_kehadiran }}</span>
                                    @elseif ($item->status_kehadiran == 'Alfa')
                                        <span
                                            class="badge rounded-pill bg-danger badge-kehadiran">{{ $item->status_kehadiran }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- End Tabel Kehadiran --}}
        </div>

        <div class="d-flex justify-content-end mb-5">
            <div class="titik-mobile">
                <a href="{{ route('kehadiran.cetak-laporan', $kehadiran->id) }}" target="_blank" class="btn btn-login text-white">Cetak Laporan
                    Kehadiran <i class="bi bi-box-arrow-in-right"></i></a>
            </div>
        </div>

    </section>
    {{-- </div> --}}
@endsection
