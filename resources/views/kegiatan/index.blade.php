@extends('master.indexadmin')
<title>Data Kegiatan - E-Presence LCC</title>
@section('content')
    <div class="pagetitle mt-2">
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-activity mb-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
            </svg> Data Kegiatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/kegiatan">Data Kegiatan</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <p class="fw-bold mx-3 my-3"><i class="bi bi-plus-lg"></i> Tambah Data Kegiatan</p>
                    <form action="/kegiatan" method="POST">
                        @csrf
                        <div class="mx-3" style="margin-top: -10px">
                            <input type="text" name="kegiatan"
                                class="form-control shadow-sm @error('kegiatan') is-invalid @enderror" autocomplete="off"
                                placeholder="Nama Kegiatan" tabindex="1">
                            @error('kegiatan')
                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-login text-white mx-3 mt-3" tabindex="3">Simpan <i
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
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakegiatan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editkegiatan{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#{{ $datakehadiran->where('kegiatan_id', $item->id)->count() > 0 ? 'notdeletekegiatan' : 'yesdeletekegiatan' }}{{ $item->id }}"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editkegiatan{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-warning fw-bold"><i
                                                                class="bi bi-pencil-square"></i>
                                                            Edit Data Kegiatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/kegiatan/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mx-3" style="margin-top: -10px">
                                                                <label for="kegiatan" class="fw-bold">Nama
                                                                    Kegiatan</label>
                                                                <input type="text" id="kegiatan" name="kegiatan"
                                                                    class="form-control shadow-sm @error('kegiatan') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Nama Kegiatan"
                                                                    value="{{ old('kegiatan', $item->kegiatan) }}">
                                                                @error('kegiatan')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-warning text-white mx-3 mt-3">Simpan
                                                                    <i class="bi bi-box-arrow-in-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal Edit --}}
                                        {{-- Modal Not Delete --}}
                                        @if ($datakehadiran->where('kegiatan_id', $item->id)->count() > 0)
                                            <div class="modal fade" id="notdeletekegiatan{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-info-circle"></i>
                                                                Informasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Data kegiatan {{ $item->kegiatan }}
                                                                telah digunakan pada data kehadiran, tidak dapat dihapus!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Not Delete --}}
                                        @else
                                            {{-- Modal Yes Delete --}}
                                            <div class="modal fade" id="yesdeletekegiatan{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-trash3"></i>
                                                                Hapus Data Kegiatan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/kegiatan/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p class="text-center">Apakah yakin akan menghapus data
                                                                    kegiatan {{ $item->kegiatan }}?</p>
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
