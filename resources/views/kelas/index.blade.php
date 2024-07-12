@extends('master.indexadmin')
<title>Data Kelas - E-Presence LCC</title>
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
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                class="bi bi-columns-gap mb-2" viewBox="0 0 16 16">
                <path
                    d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
            </svg> Data Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/kelas">Data Kelas</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="mb-3 d-lg-flex justify-content-between">
            <button class="btn btn-login text-white" tabindex="1" data-bs-toggle="modal" data-bs-target="#tambahKelas"><i
                    class="bi bi-plus-lg"></i> Tambah Data
                Kelas</button>
            <div class="my-1">
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editStatus"><i
                        class="bi bi-pencil-square"></i> Edit Status</button>
            </div>
        </div>
        {{-- Modal Edit Status --}}
        <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class="bi bi-pencil-square"></i> Edit
                            Status</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="updateStatusForm" action="{{ route('updateStatus') }}" method="POST">
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

        {{-- Modal Tambah data Kelas --}}
        <div class="modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class="bi bi-plus-lg"></i> Tambah
                            Data Kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/kelas" method="POST">
                        <div class="modal-body">
                            <div class="mt-3">
                                @csrf
                                <div class="mx-3" style="margin-top: -10px">
                                    {{-- Select Prodi --}}
                                    <select name="prodi_id"
                                        class="form-select shadow-sm @error('prodi_id') is-invalid @enderror"
                                        tabindex="1">
                                        <option disabled selected hidden>- Pilih Prodi -</option>
                                        @foreach ($dataprodi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('prodi_id') == $item->id ? 'selected' : '' }}>{{ $item->prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('prodi_id')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                    {{-- Input Kelas --}}
                                    <input type="text" name="kelas"
                                        class="form-control shadow-sm mt-2 @error('kelas') is-invalid @enderror"
                                        autocomplete="off" placeholder="Nama Kelas" tabindex="2"
                                        value="{{ old('kelas') }}">
                                    @error('kelas')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                    {{-- Input Angkatan --}}
                                    <input type="number" name="angkatan"
                                        class="form-control shadow-sm mt-2 @error('angkatan') is-invalid @enderror"
                                        autocomplete="off" placeholder="Angkatan" tabindex="3"
                                        value="{{ old('angkatan') }}">
                                    @error('angkatan')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-login text-white" tabindex="3">Simpan <i
                                    class="bi bi-box-arrow-in-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <div class="table-responsive my-3 mx-3">
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="select_all_ids"
                                            class="form-check-input border-secondary">
                                    </th>
                                    <th scope="col">No.</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Angkatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakelas as $item)
                                    <tr>
                                        <td>
                                            <input class="form-check-input border-secondary checkbox_ids" type="checkbox"
                                                name="selected_ids[]" value="{{ $item->id }}">
                                        </td>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $item->prodi->prodi }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        {{-- <td>{{ $item->status }}</td> --}}
                                        <td>
                                            @if ($item->status == 'Aktif')
                                                <span
                                                    class="badge rounded-pill bg-success py-2 px-4">{{ $item->status }}</span>
                                            @elseif ($item->status == 'Non Aktif')
                                                <span
                                                    class="badge rounded-pill bg-secondary py-2 px-4">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->angkatan }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editkelas{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#{{ $datamahasiswa->where('kelas_id', $item->id)->count() > 0 ? 'notdeletekelas' : 'yesdeletekelas' }}{{ $item->id }}"><i
                                                    class="bi bi-trash3"></i></button>
                                        </td>
                                        @if ($datamahasiswa->where('kelas_id', $item->id)->count() > 0)
                                            {{-- Modal Not Delete --}}
                                            <div class="modal fade" id="notdeletekelas{{ $item->id }}"
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
                                                            <p class="text-center">Data kelas {{ $item->kelas }}
                                                                sedang
                                                                digunakan pada data mahasiswa, tidak dapat dihapus!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Not Delete --}}
                                        @else
                                            {{-- Modal Yes Delete --}}
                                            <div class="modal fade" id="yesdeletekelas{{ $item->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-danger fw-bold"><i
                                                                    class="bi bi-trash3"></i>
                                                                Hapus Data Kelas</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/kelas/{{ $item->id }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p class="text-center">Apakah yakin akan menghapus data
                                                                    kelas
                                                                    {{ $item->kelas }}?</p>
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
                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editkelas{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold"><i
                                                                class="bi bi-pencil-square"></i>
                                                            Edit Data Kelas</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/kelas/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mx-3" style="margin-top: -10px">
                                                                {{-- Update Prodi --}}
                                                                <label for="prodi" class="fw-bold">Nama
                                                                    Prodi</label>
                                                                <select name="prodi_id"
                                                                    class="form-select shadow-sm @error('prodi_id') is-invalid @enderror"
                                                                    tabindex="1">
                                                                    <option value="{{ $item->prodi_id }}" hidden>
                                                                        {{ $item->prodi->prodi }}</option>
                                                                    @foreach ($dataprodi as $items)
                                                                        <option value="{{ $items->id }}"
                                                                            {{ old('prodi_id', $item->prodi_id) == $items->id ? 'selected' : '' }}>
                                                                            {{ $items->prodi }}</option>
                                                                    @endforeach
                                                                </select>
                                                                {{-- Update Kelas --}}
                                                                <label for="kelas" class="fw-bold mt-2">Nama
                                                                    Kelas</label>
                                                                <input type="text" id="kelas" name="kelas"
                                                                    class="form-control shadow-sm @error('kelas') is-invalid @enderror"
                                                                    autocomplete="off" placeholder=""
                                                                    value="{{ old('kelas', $item->kelas) }}">
                                                                @error('kelas')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                                {{-- Update Angkatan --}}
                                                                <label for="angkatan"
                                                                    class="fw-bold mt-2">Angkatan</label>
                                                                <input type="number" id="angkatan" name="angkatan"
                                                                    class="form-control shadow-sm @error('angkatan') is-invalid @enderror"
                                                                    autocomplete="off" placeholder=""
                                                                    value="{{ old('angkatan', $item->angkatan) }}">
                                                                @error('angkatan')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                                {{-- Update Status --}}
                                                                <label for="status" class="fw-bold mt-2">Status</label>
                                                                <select name="status" id="status"
                                                                    class="form-select shadow-sm @error('status') is-invalid @enderror"
                                                                    tabindex="4">
                                                                    <option value="Aktif"
                                                                        {{ (old('status') ?? $item->status) == 'Aktif' ? 'selected' : '' }}>
                                                                        Aktif</option>
                                                                    <option value="Non Aktif"
                                                                        {{ (old('status') ?? $item->status) == 'Non Aktif' ? 'selected' : '' }}>
                                                                        Non Aktif</option>
                                                                </select>
                                                                @error('status')
                                                                    <span
                                                                        class="invalid-feedback  mb-2">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-login text-white mx-3 mt-3">Simpan
                                                                    <i class="bi bi-box-arrow-in-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal Edit --}}

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

{{-- @section('js_modal')
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    @if ($errors->has('prodi_id') || $errors->has('kelas') || $errors->has('angkatan'))
        <script>
            $(document).ready(function() {
                $('#tambahKelas').modal('show');
            });
        </script>
    @endif
@endsection --}}

@section('js_editStatus')
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
