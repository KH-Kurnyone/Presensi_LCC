@extends('master.indexadmin')
<title>Data Mahasiswa - E-Presence LCC</title>
@section('content')
    @include('sweetalert::alert')
    <div class="pagetitle mt-2">
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-mortarboard-fill mb-2" viewBox="0 0 16 16">
                <path
                    d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                <path
                    d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
            </svg> Data Mahasiswa <span class="text-secondary fs-5 mb-2"></span></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/mahasiswa">Data Mahasiswa</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="mb-3 d-lg-flex justify-content-between">
            <a href="/mahasiswa/create" class="btn btn-danger btn-login text-white my-1" tabindex="1"><i
                    class="bi bi-plus-lg"></i>
                Tambah Data Mahasiswa</a>
            <div class="my-1">
                <a data-bs-toggle="modal" data-bs-target="#exportExcel" class="btn btn-success"><i
                        class="bi bi-file-earmark-excel"></i>
                    Export Ke Excel</a>
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importdata">
                    <i class="bi bi-file-earmark-excel"></i>
                    <span class="d-none d-lg-inline">Import Dari Excel</span>
                </a>
                {{-- <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edittingkat">
                    <i class="bi bi-pencil-square"></i>
                    <span class="d-none d-lg-inline">Edit Tingkat</span>
                </a> --}}
                @if ($datakehadiran->where('mahasiswa_id')->count() > 0)
                    <button type="submit" class="btn btn-danger d-none"><i class="bi bi-trash3"></i> Hapus Semua</button>
                @else
                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteallmahasiswa">
                        <i class="bi bi-trash3"></i>
                        <span class="d-none d-lg-inline">Hapus Semua</span>
                    </button>
                @endif
            </div>
        </div>

        {{-- Modal Export Ke Excel --}}
        <div class="modal fade" id="exportExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold text-success" id="exampleModalLabel"><i
                                class="bi bi-file-earmark-excel-fill"></i>
                            Export Data
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="text-center">
                            Apakah anda yakin akan ekspor/mengirim data ke excel?
                        </span>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('exportmahasiswa') }}" class="btn btn-success">Ya, Export Ke Excel</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Delete All --}}
        <div class="modal fade" id="deleteallmahasiswa" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger fw-bold"><i class="bi bi-trash3"></i>
                            Hapus Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('mahasiswaDeleteAll') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <p class="text-center">Apakah yakin akan menghapus seluruh data mahasiswa?</p>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger mx-3 mt-3"
                                    style="padding: 10px 50px 10px 50px">Ya, Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Import Dari Excel --}}
        <div class="modal fade" id="importdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold text-success" id="exampleModalLabel"><i
                                class="bi bi-file-earmark-excel-fill"></i> Import Data Excel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('importmahasiswa') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label for="fileexcel" class="text-dark">Kirim data mahasiswa dari excel ke website</label>
                            <input type="file" class="form-control" name="fileexcel" id="fileexcel"
                                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success px-5">Simpan <i
                                    class="bi bi-box-arrow-in-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <div class="table-responsive my-3 mx-3">
                <table class="table datatable table-hover table-sm" id="mahasiswaTable">
                    <thead>
                        <tr>
                            {{-- <th>
                                <input type="checkbox" id="select_all_ids" class="form-check-input border-secondary">
                            </th> --}}
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            {{-- <th scope="col">Prodi</th> --}}
                            <th scope="col">Kelas</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Status UKM</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Tingkat</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;
                            Carbon::setLocale('id');
                        @endphp
                        @foreach ($datamahasiswa as $item)
                            <tr>
                                {{-- <td class="text-center">
                                    <input class="form-check-input border-secondary checkbox_ids" type="checkbox"
                                        name="selected_ids[]" value="{{ $item->id }}">
                                </td> --}}
                                <td class="text-center">{{ $loop->iteration }}.</td>
                                <td>{{ $item->nama }}</td>
                                {{-- <td class="text-center">{{ $item->kelas->prodi->singkatan }}</td> --}}
                                <td class="text-center">{{ $item->kelas->kelas }}</td>
                                <td class="text-center">{{ $item->jenis_kelamin }}</td>

                                <td class="text-center">
                                    @if ($item->status_ukm == 'Anggota LCC')
                                        <span class="badge rounded-pill bg-success py-2"
                                            style="padding: 0px 15px 0px 15px">{{ $item->status_ukm }}</span>
                                    @elseif ($item->status_ukm == 'Bukan Anggota')
                                        <span class="badge rounded-pill bg-secondary py-2">{{ $item->status_ukm }}</span>
                                    @elseif ($item->status_ukm == 'BPH')
                                        <span class="badge rounded-pill bg-primary py-2"
                                            style="padding: 0px 43px 0px 43px">{{ $item->status_ukm }}</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->jabatan->jabatan }}</td>
                                <td class="text-center">
                                    @if ($item->kelas->tingkat == 1)
                                        <span class="badge rounded-pill bg-success py-2 px-4">I</span>
                                    @elseif ($item->kelas->tingkat == 2)
                                        <span class="badge rounded-pill text-dark bg-warning py-2 px-4">II</span>
                                    @elseif ($item->kelas->tingkat == 3)
                                        <span class="badge rounded-pill bg-danger py-2 px-4">III</span>
                                    @elseif ($item->kelas->tingkat == 4)
                                        <span class="badge rounded-pill bg-secondary p-2">Alumni</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $item->kelas->angkatan }}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#crud{{ $item->id }}"><i
                                            class="bi bi-three-dots-vertical"></i></button>
                                </td>
                                {{-- Modal Crud --}}
                                <div class="modal fade" id="crud{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Aksi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <a href="/mahasiswa/{{ $item->id }}/edit" class="btn btn-warning"><i
                                                        class="bi bi-pencil-square"></i> <span
                                                        class="d-lg-inline d-none">Edit Data</span></a>
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#detailmahasiswa{{ $item->id }}"><i
                                                        class="bi bi-list"></i> <span class="d-lg-inline d-none">Detail
                                                        Mahasiswa</span></button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#{{ $datakehadiran->where('mahasiswa_id', $item->id)->count() > 0 ? 'notdeletemahasiswa' : 'yesdeletemahasiswa' }}{{ $item->id }}"><i
                                                        class="bi bi-trash3"></i> <span class="d-lg-inline d-none">Hapus
                                                        Data</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($datakehadiran->where('mahasiswa_id', $item->id)->count() > 0)
                                    {{-- Modal Not Delete --}}
                                    <div class="modal fade" id="notdeletemahasiswa{{ $item->id }}" tabindex="-1">
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
                                                    <p class="text-center">Data {{ $item->nama }} sedang
                                                        digunakan pada data kehadiran, tidak dapat dihapus!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Not Modal Delete --}}
                                @else
                                    {{-- Modal Yes Delete --}}
                                    <div class="modal fade" id="yesdeletemahasiswa{{ $item->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger fw-bold"><i
                                                            class="bi bi-trash3"></i>
                                                        Hapus Data Mahasiswa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/mahasiswa/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p class="text-center">Apakah yakin akan menghapus data
                                                            {{ $item->nama }}?</p>
                                                        <div class="d-flex justify-content-center">
                                                            <button class="btn btn-danger mx-3 mt-3"
                                                                style="padding: 10px 50px 10px 50px">Ya, Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Yes Modal Delete --}}
                                @endif
                                {{-- Modal Detail Mahasiswa --}}
                                <div class="modal fade" id="detailmahasiswa{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                                            <div class="col-lg-1"><span style="display: none">.</span>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="text-center">
                                                                    <div class="d-flex justify-content-center">
                                                                        {!! DNS2D::getBarcodeHTML("$item->nim", 'QRCODE', 7, 7) !!}
                                                                    </div>
                                                                    {{-- <h5 class="fw-bold mt-2">Barcode</p> --}}
                                                                    <div class="fw-bold fs-6 mt-2">{{ $item->nama }}
                                                                    </div>
                                                                    <div class="fs-6">{{ $item->jabatan->jabatan }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="row mx-3">
                                                                    <div class="col-4 fw-bold">NIM</div>
                                                                    <div class="col-1">:</div>
                                                                    <div class="col-7">{{ $item->nim }}</div>
                                                                </div>
                                                                {{-- <div class="row mx-3 ">
                                                                    <div class="col-4 fw-bold">Nama</div>
                                                                    <div class="col-1">:</div>
                                                                    <div class="col-7">{{ $item->nama }}</div>
                                                                </div> --}}
                                                                <div class="row mx-3 ">
                                                                    <div class="col-4 fw-bold">Prodi</div>
                                                                    <div class="col-1">:</div>
                                                                    <div class="col-7">{{ $item->kelas->prodi->prodi }}
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
                                                                    <div class="col-7">{{ $item->jenis_kelamin }}</div>
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
                                                                        {{ Carbon::parse($item->tanggal_lahir)->translatedFormat('l, d F Y') }}
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
                                                                    <div class="col-7">{{ $item->asal_sekolah }}</div>
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
                                                                        @if ($item->kelas->tingkat == 1)
                                                                            <span>I</span>
                                                                        @elseif($item->kelas->tingkat == 2)
                                                                            <span>II</span>
                                                                        @elseif($item->kelas->tingkat == 3)
                                                                            <span>III</span>
                                                                        @elseif($item->kelas->tingkat == 4)
                                                                            <span>Alumni</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="row mx-3">
                                                                    <div class="col-4 fw-bold">Angkatan</div>
                                                                    <div class="col-1">:</div>
                                                                    <div class="col-7">{{ $item->kelas->angkatan }}</div>
                                                                </div>
                                                                <div class="row mx-3 mb-4">
                                                                    <div class="col-4 fw-bold">Alasan Masuk LCC</div>
                                                                    <div class="col-1">:</div>
                                                                    <div class="col-7">{{ $item->alasan }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Detail Mahasiswa --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
            </div>
        </div>

    </section>
    {{-- </div> --}}
@endsection

@section('js_editTingkat')
    <script>
        document.getElementById('updateTingkatForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Ambil semua checkbox yang dipilih
            const checkboxes = document.querySelectorAll('.checkbox_ids:checked');
            const form = document.getElementById('updateTingkatForm');

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
