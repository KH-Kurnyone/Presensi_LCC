@extends('master.indexadmin')
<title>Anggota LCC - E-Presence LCC</title>
@section('content')
    @include('sweetalert::alert')
    <div class="pagetitle mt-2">
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-mortarboard-fill mb-2" viewBox="0 0 16 16">
                <path
                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                <path
                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
            </svg> Anggota LCC <span class="text-secondary fs-5 mb-2"></span></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/anggotalcc">Anggota LCC</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <div class="table-responsive my-3 mx-3">
                <table class="table datatable table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Tingkat</th>
                            <th scope="col">Angkatan</th>
                            {{-- <th scope="col">Status UKM</th> --}}
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas->prodi->prodi }}</td>
                                <td>{{ $item->kelas->kelas }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                @if ($item->tingkat == 1)
                                    <td>Satu</td>
                                @elseif($item->tingkat == 2)
                                    <td>Dua</td>
                                @elseif($item->tingkat == 3)
                                    <td>Tiga</td>
                                @elseif($item->tingkat == 4)
                                    <td>Alumni</td>
                                @endif
                                <td>{{ $item->angkatan }}</td>
                                {{-- <td>
                                        @if ($item->status_ukm == 'Anggota LCC')
                                            <span class="badge rounded-pill bg-success p-2">{{ $item->status_ukm }}</span>
                                        @elseif ($item->status_ukm == 'Bukan Anggota')
                                            <span class="badge rounded-pill bg-secondary p-2">{{ $item->status_ukm }}</span>
                                        @endif
                                    </td> --}}
                                <td class="text-center">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#detailmahasiswa{{ $item->id }}"><i
                                            class="bi bi-list"></i></button>
                                </td>
                                <div class="modal fade" id="detailmahasiswa{{ $item->id }}" tabindex="-1">
                                    <div
                                        class="modal-dialog @can('Admin') modal-lg @endcan @can('Petugas') modal-lg @endcan">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold" style="color: #012970">
                                                    <i class="bi bi-mortarboard-fill fs-3"></i> Detail Mahasiswa
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card text-size-mobile">
                                                    <div class="border border-secondary" style="border-radius: 10px">
                                                        <div class="mx-3 my-3 d-flex">
                                                            <img src="img_logo/Logo_LP3I_2.png" alt=""
                                                                style="width: 150px; padding:0">
                                                        </div>
                                                        <div class="border border-secondary mx-3 mb-4"></div>
                                                        <div class="row">
                                                            @can('Admin')
                                                                <div class="col-lg-1"><span style="display: none">.</span>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="text-center">
                                                                        <div class="d-flex justify-content-center">
                                                                            {!! DNS2D::getBarcodeHTML("$item->nim", 'QRCODE', 6, 6) !!}
                                                                        </div>
                                                                        <h5 class="fw-bold mt-2">Barcode</p>
                                                                    </div>
                                                                </div>
                                                            @endcan
                                                            @can('Petugas')
                                                                <div class="col-lg-1"><span style="display: none">.</span>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="text-center">
                                                                        <div class="d-flex justify-content-center">
                                                                            {!! DNS2D::getBarcodeHTML("$item->nim", 'QRCODE', 6, 6) !!}
                                                                        </div>
                                                                        <h5 class="fw-bold mt-2">Barcode</p>
                                                                    </div>
                                                                </div>
                                                            @endcan
                                                            @can('Admin')
                                                                <div class="col-lg-8">
                                                                @endcan
                                                                @can('Petugas')
                                                                    <div class="col-lg-8">
                                                                    @endcan
                                                                    <div class="row mx-3">
                                                                        <div class="col-4 fw-bold">NIM</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->nim }}</div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Nama</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->nama }}</div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Prodi</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">
                                                                            {{ $item->kelas->prodi->prodi }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Kelas</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->Kelas->kelas }}</div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Gender</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->jenis_kelamin }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Tempat Lahir</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->tempat_lahir }}</div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Tanggal Lahir</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">
                                                                            {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Alamat</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->alamat }}</div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Asal Sekolah</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->asal_sekolah }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">Jurusan</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->jurusan }}</div>
                                                                    </div>
                                                                    <div class="row mx-3 ">
                                                                        <div class="col-4 fw-bold">No. Telp.</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->no_telpon }}</div>
                                                                    </div>
                                                                    <div class="row mx-3">
                                                                        <div class="col-4 fw-bold">Status UKM</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->status_ukm }}</div>
                                                                    </div>
                                                                    <div class="row mx-3">
                                                                        <div class="col-4 fw-bold">Tingkat</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">
                                                                            @if ($item->tingkat == 1)
                                                                                <span>Satu</span>
                                                                            @elseif($item->tingkat == 2)
                                                                                <span>Dua</span>
                                                                            @elseif($item->tingkat == 3)
                                                                                <span>Tiga</span>
                                                                            @elseif($item->tingkat == 4)
                                                                                <span>Alumni</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mx-3 mb-4">
                                                                        <div class="col-4 fw-bold">Angkatan</div>
                                                                        <div class="col-1">:</div>
                                                                        <div class="col-7">{{ $item->angkatan }}</div>
                                                                    </div>
                                                                    @can('Admin')
                                                                    </div>
                                                                @endcan
                                                                @can('Petugas')
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>

    </section>
@endsection
