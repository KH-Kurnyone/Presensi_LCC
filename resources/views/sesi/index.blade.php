@extends('master.indexadmin')
<title>Data Sesi - E-Presence LCC</title>
@section('content')
    <div class="pagetitle mt-2">
        <h1 class="text-dark fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clock mb-2"
                viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
            </svg> Data Sesi Waktu
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/sesi">Data Sesi Waktu</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <form action="/sesi" method="POST">
                        @csrf
                        <div class="mx-3 mt-3">
                            <label class="fw-bold ">Sesi</label>
                            <input type="text" name="sesi" id="sesi"
                                class="form-control shadow-sm @error('sesi') is-invalid @enderror" autocomplete="off"
                                tabindex="1" value="{{ old('sesi') }}">
                            @error('sesi')
                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                            @enderror

                            <label class="fw-bold mt-2">Waktu Mulai</label>
                            <input type="time" name="waktu_mulai" id="waktu_mulai"
                                class="form-control shadow-sm @error('waktu_mulai') is-invalid @enderror" autocomplete="off"
                                tabindex="2" value="{{ old('waktu_mulai') }}">
                            @error('waktu_mulai')
                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                            @enderror

                            <label class="fw-bold mt-2">Waktu Selesai</label>
                            <input type="time" name="waktu_selesai" id="waktu_selesai"
                                class="form-control shadow-sm @error('waktu_selesai') is-invalid @enderror"
                                autocomplete="off" tabindex="3" value="{{ old('waktu_selesai') }}">
                            @error('waktu_selesai')
                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-danger btn-login text-white mx-3 mt-3" tabindex="4">Simpan <i
                                class="bi bi-box-arrow-in-right"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <div class="table-responsive my-3 mx-3">
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Sesi</th>
                                    <th scope="col">Waktu Mulai</th>
                                    <th scope="col">Waktu Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSesi as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $item->sesi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}</td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editSesi{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#{{ $dataSesiDet->where('sesi_id', $item->id)->count() > 0 ? 'notdeletesesi' : 'yesdeletesesi' }}{{ $item->id }}"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editSesi{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-default fw-bold"><i
                                                                class="bi bi-pencil-square"></i>
                                                            Edit Data sesi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/sesi/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mx-3" style="margin-top: -10px">
                                                                <label for="sesi" class="fw-bold">Sesi</label>
                                                                <input type="text" id="sesi" name="sesi"
                                                                    class="form-control shadow-sm @error('sesi') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Nama Sesi"
                                                                    value="{{ old('sesi', $item->sesi) }}" tabindex="1">
                                                                @error('sesi')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror

                                                                <label for="waktu_mulai" class="fw-bold mt-2">Waktu
                                                                    Mulai</label>
                                                                <input type="time" id="waktu_mulai" name="waktu_mulai"
                                                                    class="form-control shadow-sm @error('waktu_mulai') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Nama Waktu Mulai"
                                                                    value="{{ old('waktu_mulai', $item->waktu_mulai) }}"
                                                                    tabindex="2">
                                                                @error('waktu_mulai')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror

                                                                <label for="waktu_selesai" class="fw-bold mt-2">Waktu
                                                                    Selesai</label>
                                                                <input type="time" id="waktu_selesai"
                                                                    name="waktu_selesai"
                                                                    class="form-control shadow-sm @error('waktu_selesai') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Nama Waktu Selesai"
                                                                    value="{{ old('waktu_selesai', $item->waktu_selesai) }}"
                                                                    tabindex="3">
                                                                @error('waktu_selesai')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-danger btn-login text-white mx-3 mt-3"
                                                                    tabindex="4">Simpan
                                                                    <i class="bi bi-box-arrow-in-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Modal Not Delete --}}
                                        @if ($dataSesiDet->where('sesi_id', $item->id)->count() > 0)
                                            <div class="modal fade" id="notdeletesesi{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-info-circle"></i>
                                                                Informasi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Data {{ $item->sesi }}
                                                                telah digunakan pada data kehadiran, tidak dapat dihapus!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Not Delete --}}
                                        @else
                                            {{-- Modal Yes Delete --}}
                                            <div class="modal fade" id="yesdeletesesi{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-trash3"></i>
                                                                Hapus Data Sesi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/sesi/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p class="text-center">Apakah yakin akan menghapus data <span
                                                                        class="fw-bold">{{ $item->sesi }}</span>?</p>
                                                                <div class="d-flex justify-content-center">
                                                                    <button class="btn btn-danger mx-3 mt-3"
                                                                        style="padding: 10px 50px 10px 50px">Ya,
                                                                        Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Yes Delete --}}
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- @section('js_sesi')
    
@endsection --}}
