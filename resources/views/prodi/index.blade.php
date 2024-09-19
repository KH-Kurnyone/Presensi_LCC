@extends('master.indexadmin')
<title>Data Prodi - E-Presence LCC</title>
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
    {{-- @include('sweetalert::alert') --}}
    {{-- <div class="mobile"> --}}
    <div class="pagetitle mt-2">
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-grid mb-2" viewBox="0 0 16 16">
                <path
                    d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
            </svg> Data Prodi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/prodi">Data Prodi</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <p class="fw-bold mx-3 my-3"><i class="bi bi-plus-lg"></i> Tambah Data Prodi</p>
                    <form action="/prodi" method="POST">
                        @csrf
                        <div class="mx-3" style="margin-top: -10px">
                            <input type="text" name="prodi"
                                class="form-control shadow-sm @error('prodi') is-invalid @enderror" autocomplete="off"
                                placeholder="Nama Prodi" tabindex="1">
                            @error('prodi')
                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                            @enderror

                            <input type="text" name="singkatan"
                                class="form-control shadow-sm @error('singkatan') is-invalid @enderror mt-2"
                                autocomplete="off" placeholder="Singkatan" tabindex="2">
                            @error('singkatan')
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
                                    <th scope="col">Nama Prodi</th>
                                    <th scope="col">#</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataprodi as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->prodi }}</td>
                                        <td class="text-center">{{ $item->singkatan }}</td>
                                        <td class="text-center">
                                            {{-- Button Edit --}}
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editprodi{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            {{-- Button Delete --}}
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#{{ $datakelas->where('prodi_id', $item->id)->count() > 0 ? 'notdeleteprodi' : 'yesdeleteprodi' }}{{ $item->id }}"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editprodi{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-warning fw-bold"><i
                                                                class="bi bi-pencil-square"></i>
                                                            Edit Data Prodi</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/prodi/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mx-3" style="margin-top: -10px">
                                                                <label for="prodi" class="fw-bold">Nama
                                                                    Prodi</label>
                                                                <input type="text" id="prodi" name="prodi"
                                                                    class="form-control shadow-sm @error('prodi') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Nama Prodi"
                                                                    value="{{ old('prodi', $item->prodi) }}">
                                                                @error('prodi')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror

                                                                <label for="singkatan"
                                                                    class="mt-2 fw-bold">Singkatan</label>
                                                                <input type="text" id="singkatan" name="singkatan"
                                                                    class="form-control shadow-sm @error('singkatan') is-invalid @enderror"
                                                                    autocomplete="off" placeholder="Singkatan"
                                                                    value="{{ old('singkatan', $item->singkatan) }}">
                                                                @error('singkatan')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-warning text-white mx-3 mt-3">Simpan <i
                                                                        class="bi bi-box-arrow-in-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal Edit --}}

                                        {{-- Modal Not Delete --}}
                                        @if ($datakelas->where('prodi_id', $item->id)->count() > 0)
                                            <div class="modal fade" id="notdeleteprodi{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-info-circle"></i>
                                                                Informasi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Data prodi {{ $item->prodi }}
                                                                sedang
                                                                digunakan pada data kelas, tidak dapat dihapus!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Not Delete --}}
                                        @else
                                            {{-- Modal Yes Delete --}}
                                            <div class="modal fade" id="yesdeleteprodi{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-trash3"></i>
                                                                Hapus Data Prodi</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/prodi/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p class="text-center">Apakah yakin akan menghapus data
                                                                    prodi {{ $item->prodi }}?</p>
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
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- </div> --}}
@endsection
