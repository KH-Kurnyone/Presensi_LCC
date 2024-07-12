@extends('master.indexadmin')
<title>Data Kehadiran - E-Presence LCC</title>
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
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-clipboard2-data-fill mb-2" viewBox="0 0 16 16">
                <path
                    d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                <path
                    d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
            </svg> Data Kehadiran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Kehadiran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        @can('Admin')
            <div class="mb-3 d-lg-flex justify-content-between">
                <a href="/kehadiran/create" class="btn btn-login text-white mb-1"><i class="bi bi-plus-lg"></i> Tambah Data
                    Kehadiran</a>
                <button class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#editStatusKehadiran"><i
                        class="bi bi-pencil-square"></i> Edit Status</button>
            </div>
            {{-- Modal Edit Status --}}
            <div class="modal fade" id="editStatusKehadiran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit
                                Status</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateStatusForm" action="{{ route('updateStatusKehadiran') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div>
                                    <label for="status">Status</label>
                                    <select name="status" id="status"
                                        class="form-select shadow-sm @error('status') is-invalid @enderror" tabindex="1">
                                        <option disabled selected hidden></option>
                                        <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="Non Aktif" {{ old('status') == 'Non Aktif' ? 'selected' : '' }}>Non Aktif
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-login text-white">Simpan <i
                                        class="bi bi-box-arrow-in-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        @can('Petugas')
            <div class="mb-3">
                <a href="/kehadiran/create" class="btn btn-login text-white"><i class="bi bi-plus-lg"></i> Tambah Data
                    Kehadiran</a>
            </div>
        @endcan

        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <div class="table-responsive my-3 mx-3">
                <table class="table datatable table-hover">
                    <thead>
                        <tr>
                            @can('Admin')
                                <th>
                                    <input type="checkbox" id="select_all_ids" class="form-check-input border-secondary">
                                </th>
                            @endcan
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal</th>
                            {{-- <th scope="col">Waktu</th> --}}
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Ket. Kegiatan</th>
                            @can('Admin')
                                <th scope="col">Status</th>
                            @endcan
                            @can('Viewer')
                                <th scope="col">Status</th>
                            @endcan
                            {{-- <th scope="col">Pertemuan</th> --}}
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @can('Admin') --}}
                        @foreach ($datakehadiranadmin as $item)
                            <tr>
                                @can('Admin')
                                    <td>
                                        <input class="form-check-input border-secondary checkbox_ids" type="checkbox"
                                            name="selected_ids[]" value="{{ $item->id }}">
                                    </td>
                                @endcan
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                {{-- <td>{{ $item->created_at->format('H:i') }}</td> --}}
                                <td>{{ $item->kegiatan->kegiatan }}</td>
                                <td>{{ $item->ket_kegiatan }}</td>
                                @can('Admin')
                                    <td>
                                        @if ($item->status == 'Aktif')
                                            <span class="badge rounded-pill bg-success py-2 px-4">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Non Aktif')
                                            <span class="badge rounded-pill bg-secondary py-2 px-4">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                @endcan
                                @can('Viewer')
                                    <td>
                                        @if ($item->status == 'Aktif')
                                            <span class="badge rounded-pill bg-success py-2 px-4">{{ $item->status }}</span>
                                        @elseif ($item->status == 'Non Aktif')
                                            <span class="badge rounded-pill bg-secondary py-2 px-4">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                @endcan
                                {{-- <td>{{ $item->pertemuan }}</td> --}}
                                <td class="text-center">
                                    @can('Admin')
                                        <a href="/kehadiran/{{ $item->id }}/edit" class="btn btn-warning"><i
                                                class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    @can('Petugas')
                                        <a href="/kehadiran/{{ $item->id }}/edit" class="btn btn-warning"><i
                                                class="bi bi-pencil-square"></i></a>
                                    @endcan
                                    <a href="/kehadiran/{{ $item->id }}" class="btn btn-primary"><i
                                            class="bi bi-list"></i></a>
                                    @can('Admin')
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletekehadiran{{ $item->id }}"><i
                                                class="bi bi-trash3"></i></button>
                                    @endcan
                                </td>
                                {{-- Modal Delete --}}
                                <div class="modal fade" id="deletekehadiran{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger fw-bold"><i class="bi bi-trash3"></i>
                                                    Hapus Data Kehadiran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/kehadiran/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p class="text-center">Apakah yakin akan menghapus data
                                                        <span class="fw-bold">{{ $item->kegiatan->kegiatan }}</span>,
                                                        keterangan <span class="fw-bold">{{ $item->ket_kegiatan }}</span>
                                                    </p>
                                                    <div class="d-flex justify-content-center">
                                                        <button class="btn btn-danger mx-3 mt-3"
                                                            style="padding: 10px 50px 10px 50px">Ya, Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Delete --}}
                            </tr>
                        @endforeach
                        {{-- @endcan --}}
                        {{-- @can('Petugas')
                                @foreach ($datakehadiran as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                        <td>{{ $item->nama_kegiatan }}</td>
                                        <td>{{ $item->ket_kegiatan }}</td>
                                        <td class="text-center">
                                            <a href="/kehadiran/{{ $item->id }}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a href="/kehadiran/{{ $item->id }}" class="btn btn-primary"><i
                                                    class="bi bi-list"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endcan --}}
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>
    </section>
    {{-- </div> --}}
@endsection
@section('js_editStatus_kehadiran')
    <script>
        document.getElementById('updateStatusForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Ambil semua checkbox yang dipilih
            const checkboxes = document.querySelectorAll('.checkbox_ids:checked');
            const form = document.getElementById('updateStatusForm');

            // Tambahkan input hidden untuk setiap checkbox yang dipilih
            checkboxes.forEach(checkbox => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_ids[]';
                input.value = checkbox.value;
                form.appendChild(input);
            });

            // Submit form
            form.submit();
        });
    </script>
@endsection
