@extends('master.indexadmin')
<title>Data Jabatan - E-Presence LCC</title>
@section('content')
    <div class="pagetitle mt-2">
        <h1 class="text-dark fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-universal-access mb-2" viewBox="0 0 16 16">
                <path
                    d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0M6 5.5l-4.535-.442A.531.531 0 0 1 1.531 4H14.47a.531.531 0 0 1 .066 1.058L10 5.5V9l.452 6.42a.535.535 0 0 1-1.053.174L8.243 9.97c-.064-.252-.422-.252-.486 0l-1.156 5.624a.535.535 0 0 1-1.053-.174L6 9z" />
            </svg> Data Jabatan
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/jabatan">Data Jabatan</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <p class="fw-bold mx-3 my-3"><i class="bi bi-plus-lg"></i> Tambah Data Jabatan</p>
                    <form action="/jabatan" method="POST">
                        @csrf
                        <div class="mx-3" style="margin-top: -10px">
                            <input type="text" name="jabatan"
                                class="form-control shadow-sm @error('jabatan') is-invalid @enderror" autocomplete="off"
                                placeholder="Nama Jabatan" tabindex="1">
                            @error('jabatan')
                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-danger btn-login text-white mx-3 mt-3" tabindex="3">Simpan <i
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
                                    <th scope="col">Nama Jabatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataJabatan as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editJabatan{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            @if ($item->id == 1)
                                                <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                                            @else
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#{{ $dataMahasiswa->where('jabatan_id', $item->id)->count() > 0 ? 'notDeleteJabatan' : 'yesDeleteJabatan' }}{{ $item->id }}"><i
                                                        class="bi bi-trash3"></i></button>
                                            @endif
                                        </td>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editJabatan{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-default fw-bold"><i
                                                                class="bi bi-pencil-square"></i>
                                                            Edit Data Jabatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/jabatan/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mx-3" style="margin-top: -10px">
                                                                <label for="jabatan" class="fw-bold">Nama
                                                                    Jabatan</label>
                                                                <input type="text" id="jabatan" name="jabatan"
                                                                    class="form-control shadow-sm @error('jabatan') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Nama Jabatan"
                                                                    value="{{ old('jabatan', $item->jabatan) }}">
                                                                @error('jabatan')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-danger btn-login text-white mx-3 mt-3">Simpan
                                                                    <i class="bi bi-box-arrow-in-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal Edit --}}
                                        {{-- Modal Not Delete --}}
                                        @if ($dataMahasiswa->where('jabatan_id', $item->id)->count() > 0)
                                            <div class="modal fade" id="notDeleteJabatan{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-info-circle"></i>
                                                                Informasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Data jabatan {{ $item->jabatan }}
                                                                telah digunakan pada data mahasiswa, tidak dapat dihapus!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Not Delete --}}
                                        @else
                                            {{-- Modal Yes Delete --}}
                                            <div class="modal fade" id="yesDeleteJabatan{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-trash3"></i>
                                                                Hapus Data Jabatan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/jabatan/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p class="text-center">Apakah yakin akan menghapus data
                                                                    jabatan <span
                                                                        class="fw-bold">{{ $item->jabatan }}</span>?</p>
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
