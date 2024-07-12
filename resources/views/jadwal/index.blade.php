@extends('master.indexadmin')
<title>Data Jadwal - E-Presence LCC</title>
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
    <div class="mobile">
        <div class="pagetitle mt-2">
            <nav class="header-nav ms-auto">
                <ul>
                    <li class="nav-item dropdown">
                        <a href="#" class="logo-dekstop" data-bs-toggle="dropdown">
                            <div class="d-flex justify-content-end">
                                <i class="bi bi-filter-right text-primary" style="position: absolute; font-size:50px"></i>
                            </div>
                        </a>
                        <div>
                            <ul class="dropdown-menu dropdown-menu-arrow ">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/prodi">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-grid me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
                                        </svg> Prodi
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/kelas">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-columns-gap me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                                        </svg> Kelas
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="/mahasiswa">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-mortarboard me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917zM8 8.46 1.758 5.965 8 3.052l6.242 2.913z" />
                                            <path
                                                d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46z" />
                                        </svg> Mahasiswa
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center {{ $title === 'jadwal' ? 'text-primary' : '' }}" href="/jadwal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-journal-text me-2" viewBox="0 0 16 16">
                                            <path
                                                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                            <path
                                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                            <path
                                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                                        </svg> Jadwal
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <h1><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-journal-text mb-2" viewBox="0 0 16 16">
                    <path
                        d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                    <path
                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                    <path
                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                </svg> Data Jadwal Kelas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Data Jadwal Kelas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-header bg-primary" style="padding: 2px"></div>
                    <div class="card">
                        <p class="fw-bold mx-3 my-3"><i class="bi bi-plus-lg"></i> Tambah Jadwal Kelas</p>
                        <form action="/jadwal" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mx-3" style="margin-top: -10px">
                                {{-- <select name="prodi_id" class="form-select shadow-sm @error('prodi_id') is-invalid @enderror"
                                tabindex="1">
                                @foreach ($dataprodi as $item)
                                    <option disabled selected hidden>- Pilih Prodi -</option>
                                    <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                            @error('prodi_id')
                                <span class="invalid-feedback mb-2">{{ $message }}</span>
                            @enderror --}}
                                <select name="kelas_id"
                                    class="form-select shadow-sm mt-2 @error('kelas_id') is-invalid @enderror"
                                    tabindex="2">
                                    @foreach ($datakelas as $item)
                                        <option disabled selected hidden>- Pilih Kelas -</option>
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <span class="invalid-feedback mb-2">{{ $message }}</span>
                                @enderror
                                <input type="file" name="file"
                                    class="form-control shadow-sm mt-2 @error('file') is-invalid @enderror"
                                    accept=".pdf, .docx" tabindex="3">
                                @error('file')
                                    <span class="invalid-feedback mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary mx-3 mt-3" tabindex="4">Konfirmasi <i
                                    class="bi bi-box-arrow-in-right"></i></button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-header bg-primary" style="padding: 2px"></div>
                    <div class="card">
                        <div class="table-responsive my-3 mx-3">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Prodi</th>
                                        <th scope="col">Jadwal Kelas</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datajadwal as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $item->kelas->prodi->prodi }}</td>
                                            <td>{{ $item->kelas->kelas }}</td>
                                            <td class="text-center">
                                                <a href="/jadwal/{{ $item->id }}" class="btn btn-primary"><i
                                                        class="bi bi-eye"></i></a>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deletejadwal{{ $item->id }}"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="deletejadwal{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-danger fw-bold"><i
                                                                class="bi bi-trash3"></i>
                                                            Hapus Jadwal kelas</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/jadwal/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <p class="text-center">Apakah yakin akan menghapus jadwal kelas
                                                                {{ $item->kelas->kelas }}?</p>
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
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
