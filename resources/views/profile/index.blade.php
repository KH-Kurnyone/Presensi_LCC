@extends('master.indexadmin')
<title>Profile - E-Presence LCC</title>
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
                class="bi bi-person-fill mb-2" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg> Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @can('Admin')
                            <img src="img_logo/LogoLCC.png" alt="Profile" class="rounded-circle">
                            <h2>LP3I Computer Club</h2>
                            <h3>LCC - Tasikmalaya</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="twitter"><i class="bi bi-tiktok"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            </div>
                        @endcan
                        @can('Petugas')
                            <img src="img_logo/LogoLCC.png" alt="Profile" class="rounded-circle">
                            <h2>LP3I Computer Club</h2>
                            <h3>LCC - Tasikmalaya</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="twitter"><i class="bi bi-tiktok"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            </div>
                        @endcan
                        @can('Viewer')
                            <img src="img_logo/LogoLCC.png" alt="Profile" class="rounded-circle">
                            <h2>LP3I Computer Club</h2>
                            <h3>LCC - Tasikmalaya</h3>
                            <div class="social-links mt-2">
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="twitter"><i class="bi bi-tiktok"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            </div>
                        @endcan
                        @can('Mahasiswa')
                            <img src="img_logo/profile.png" alt="Profile" class="rounded-circle border border-secondary mt-2"
                                width="60%">
                            <h2 class="text-dark">{{ Auth()->user()->mahasiswa->nama }}</h2>
                            <h3>{{ Auth()->user()->mahasiswa->status_ukm }}</h3>
                            <button class="btn btn-warning form-control mt-3" data-bs-toggle="modal"
                                data-bs-target="#barcodeMahasiswa">Barcode</button>
                        @endcan
                    </div>
                </div>
            </div>

            {{-- Barcode --}}
            @can('Mahasiswa')
                <div class="modal fade" id="barcodeMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i class="bi bi-upc-scan"></i> Barcode</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-center">
                                    {!! DNS2D::getBarcodeHTML('' . Auth::user()->mahasiswa->nim, 'QRCODE', 10, 10) !!}
                                </div>
                                <h4 class="fw-bold text-center text-dark mt-3">{{ Auth()->user()->mahasiswa->nama }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            <div class="col-xl-8">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Detail</button>
                            </li>

                            @can('Admin')
                                <li class="nav-item">
                                    <a href="/profile/ubahpassword" class="nav-link">Ubah Password</a>
                                </li>
                            @endcan
                            @can('Petugas')
                                <li class="nav-item">
                                    <a href="/profile/ubahpassword" class="nav-link">Ubah Password</a>
                                </li>
                            @endcan
                            @can('Mahasiswa')
                                <li class="nav-item">
                                    <a href="/profile/ubahpassword" class="nav-link">Ubah Password</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/profile-edit" class="nav-link fs-4"><i class="bi bi-pencil-square"></i></a>
                                </li>
                            @endcan

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                @can('Admin')
                                    <h5 class="card-title text-dark">Tentang Website</h5>
                                    <p class="small fst-italic text-secondary">E-Presence LCC adalah aplikasi inovatif yang
                                        dirancang
                                        khusus
                                        untuk memberikan solusi cerdas dalam manajemen absensi. Aplikasi ini membawa
                                        revolusi
                                        dalam pencatatan kehadiran, memberikan kemudahan, efisiensi, dan akurasi
                                        dalam pengelolaan waktu atau peserta.</p>
                                    <h5 class="card-title text-dark">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark">Nama UKM</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">LCC (LP3I Computer Club)</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 label text-dark">Kampus</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">Politeknik LP3I Tasikmalaya</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 label text-dark">Alamat</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">Jl. Ir. H. Juanda, Panglayungan, Kec.
                                            Cipedes, Kab. Tasikmalaya</div>
                                    </div>
                                @endcan
                                @can('Petugas')
                                    <h5 class="card-title text-dark">Tentang Website</h5>
                                    <p class="small fst-italic text-secondary">E-Presence LCC adalah aplikasi inovatif yang
                                        dirancang
                                        khusus
                                        untuk memberikan solusi cerdas dalam manajemen absensi. Aplikasi ini membawa
                                        revolusi
                                        dalam pencatatan kehadiran, memberikan kemudahan, efisiensi, dan akurasi
                                        dalam pengelolaan waktu atau peserta.</p>
                                    <h5 class="card-title text-dark">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark">Nama UKM</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">LCC (LP3I Computer Club)</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 label text-dark">Kampus</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">Politeknik LP3I Tasikmalaya</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 label text-dark">Alamat</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">Jl. Ir. H. Juanda, Panglayungan, Kec.
                                            Cipedes, Kab. Tasikmalaya</div>
                                    </div>
                                @endcan
                                @can('Viewer')
                                    <h5 class="card-title text-dark">Tentang Website</h5>
                                    <p class="small fst-italic text-secondary">E-Presence LCC adalah aplikasi inovatif yang
                                        dirancang
                                        khusus
                                        untuk memberikan solusi cerdas dalam manajemen absensi. Aplikasi ini membawa
                                        revolusi
                                        dalam pencatatan kehadiran, memberikan kemudahan, efisiensi, dan akurasi
                                        dalam pengelolaan waktu atau peserta.</p>
                                    <h5 class="card-title text-dark">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label text-dark">Nama UKM</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">LCC (LP3I Computer Club)</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 label text-dark">Kampus</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">Politeknik LP3I Tasikmalaya</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 label text-dark">Alamat</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">Jl. Ir. H. Juanda, Panglayungan, Kec.
                                            Cipedes, Kab. Tasikmalaya</div>
                                    </div>
                                @endcan
                                @can('Mahasiswa')
                                    <h5 class="text-default mt-4 fw-bold">Profile Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 text-dark">NIM</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">: {{ Auth()->user()->mahasiswa->nim }}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">: {{ Auth()->user()->mahasiswa->nama }}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Jenis Kelamin</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">:
                                            {{ Auth()->user()->mahasiswa->jenis_kelamin }}</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Tempat Lahir</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">:
                                            {{ Auth()->user()->mahasiswa->tempat_lahir }}</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Tanggal Lahir</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">:
                                            {{ Auth()->user()->mahasiswa->tanggal_lahir }}</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Alamat</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">: {{ Auth()->user()->mahasiswa->alamat }}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Asal Sekolah</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">:
                                            {{ Auth()->user()->mahasiswa->asal_sekolah }}</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">Jurusan</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">:
                                            {{ Auth()->user()->mahasiswa->jurusan }}</div>
                                    </div>
                                    <div class="row" style="margin-top: -3%">
                                        <div class="col-lg-3 col-md-4 text-dark">No. Telpon</div>
                                        <div class="col-lg-9 col-md-8 text-secondary">:
                                            {{ Auth()->user()->mahasiswa->no_telpon }}</div>
                                    </div>
                                @endcan
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                            New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- </div> --}}
@endsection
