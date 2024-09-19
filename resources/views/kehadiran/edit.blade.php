@extends('master.indexadmin')
<title>Edit Data Kehadiran - E-Presence LCC</title>
@section('content')
    {{-- <div class="mobile"> --}}
    <div class="pagetitle">
        <h1 class="text-dark fw-bold">
            <a href="/kehadiran" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-arrow-left mb-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg></a>
            Edit Data Kehadiran
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/kehadiran">Data Kehadiran</a></li>
                <li class="breadcrumb-item active"><a href="/kehadiran/create">Edit Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <form action="{{ route('kehadiran.update', $kehadiran->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- Kolom Input Atas --}}
                <div class="row mx-3 mt-3">
                    <div class="col-lg-6">
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Tanggal Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <input type="date" name="tanggal"
                                    class="form-control shadow-sm @error('tanggal') is-invalid @enderror" tabindex="1"
                                    value="{{ $kehadiran->tanggal }}">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Pemateri</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <select name="mahasiswa_id"
                                    class="form-select shadow-sm @error('mahasiswa_id') is-invalid @enderror"
                                    tabindex="2">
                                    <option disabled selected hidden>- Pilih Pemateri -</option>
                                    <option value="0" {{ (old('mahasiswa_id') ?? $kehadiran->mahasiswa_id) == '0' ? 'selected' : '' }}>
                                        BPH LCC</option>
                                    @foreach ($dataPemateri as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('mahasiswa_id', $kehadiran->mahasiswa_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Waktu Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <div class="row">
                                    {{-- @foreach ($dataSesi as $item)
                                        <div class="col-4">
                                            <input class="form-check-input @error('sesi_id') is-invalid @enderror"
                                                type="checkbox" name="sesi_id[]" value="{{ $item->id }}"
                                                {{ in_array($item->id, $dataSesiChecked->pluck('sesi_id')->toArray()) ? 'checked' : '' }}
                                                tabindex="5" disabled>
                                            <label>{{ $item->sesi }}</label>
                                        </div>
                                    @endforeach --}}
                                    <ul class="ms-4">
                                        @foreach ($dataSesiChecked as $item)
                                            <li>
                                                {{ $item->sesi->sesi }}
                                                ({{ \Carbon\Carbon::parse($item->sesi->waktu_mulai)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($item->sesi->waktu_selesai)->format('H:i') }})
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Nama Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <select name="kegiatan_id"
                                    class="form-select shadow-sm @error('kegiatan_id') is-invalid @enderror" tabindex="3">
                                    <option value="{{ $kehadiran->kegiatan_id }}" hidden>
                                        {{ $kehadiran->kegiatan->kegiatan }}
                                    </option>
                                    @foreach ($datakegiatan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kegiatan_id', $kehadiran->kegiatan_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->kegiatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Keterangan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <input type="text" name="ket_kegiatan"
                                    class="form-control shadow-sm @error('ket_kegiatan') is-invalid @enderror"
                                    tabindex="4" autocomplete="off" value="{{ $kehadiran->ket_kegiatan }}">
                                {{-- <textarea name="ket_kegiatan" cols="30" rows="2"
                                    class="form-control shadow-sm @error('ket_kegiatan') is-invalid @enderror">{{ $kehadiran->ket_kegiatan }}</textarea> --}}
                            </div>
                        </div>

                        @can('Admin')
                            <div class="row my-1">
                                <div class="col-lg-4 fw-bold">Status</div>
                                <div class="col-lg-1 fw-bold titik-mobile">:</div>
                                <div class="col-lg-7">
                                    <select name="status" class="form-select shadow-sm @error('status') is-invalid @enderror"
                                        tabindex="5">
                                        <option value="Aktif"
                                            {{ (old('status') ?? $kehadiran->status) == 'Aktif' ? 'selected' : '' }}>
                                            Aktif</option>
                                        <option value="Non Aktif"
                                            {{ (old('status') ?? $kehadiran->status) == 'Non Aktif' ? 'selected' : '' }}>
                                            Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
                {{-- End Kolom Input Atas --}}

                {{-- Table Kehadiran --}}
                <div class="table-responsive mx-3 my-2">
                    <table class="table table-bordered">
                        <thead class="table-secondary text-center" style="white-space: nowrap">
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            {{-- <th>Prodi</th> --}}
                            <th>Kelas</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Waktu Hadir</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody style="white-space: nowrap">
                            @foreach ($statuskehadiran as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item->mahasiswa->nama }}</td>
                                    {{-- <td class="text-center">{{ $item->mahasiswa->kelas->prodi->prodi }}</td> --}}
                                    <td class="text-center">{{ $item->mahasiswa->kelas->kelas }}</td>
                                    <td class="text-center">{{ $item->mahasiswa->jenis_kelamin }}</td>
                                    <td class="text-center">
                                        {{-- <select name="status_kehadiran[{{ $item->id }}]"
                                            class="form-select @error('status_kehadiran') is-invalid @enderror"
                                            tabindex="5" disabled>
                                            <option value="Hadir"
                                                {{ $item->status_kehadiran === 'Hadir' ? 'selected' : '' }}>Hadir
                                            </option>
                                            <option value="Sakit"
                                                {{ $item->status_kehadiran === 'Sakit' ? 'selected' : '' }}>Sakit
                                            </option>
                                            <option value="Izin"
                                                {{ $item->status_kehadiran === 'Izin' ? 'selected' : '' }}>Izin
                                            </option>
                                            <option value="Alfa"
                                                {{ $item->status_kehadiran === 'Alfa' ? 'selected' : '' }}>Alfa
                                            </option>
                                        </select> --}}
                                        {{-- {{ $item->status_kehadiran }} --}}
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
                                    @if ($item->waktu_hadir === null)
                                        <td class="text-center">-</td>
                                    @else
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($item->waktu_hadir)->format('H:i') }}
                                        </td>
                                    @endif
                                    <td class="text-center">{{ $item->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- End Tabel Kehadiran --}}
                <div class="d-flex justify-content-end mx-3 mb-5">
                    <button class="btn btn-danger btn-login text-white mt-2" style="padding-left: 20px; padding-right: 20px;"
                        tabindex="6">Simpan <i class="bi bi-box-arrow-in-right"></i></button>
                </div>
            </form>
        </div>

    </section>
    {{-- </div> --}}
@endsection
