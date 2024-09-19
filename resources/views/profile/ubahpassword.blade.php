@extends('master.indexadmin')
<title>Ubah Password - E-Presence LCC</title>
@section('content')
    {{-- <div class="mobile"> --}}
    @include('sweetalert::alert')
    <div class="pagetitle">
        <h1 class="text-dark fw-bold">
            <a href="/profile" class="text-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-arrow-left mb-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </a> Ubah Password
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="/profile">Profile</a></li>
                <li class="breadcrumb-item"><a href="/ubahpassword">Ubah Password</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <form action="/profile/ubahpassword/{{ auth()->user()->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-lg-6 my-1">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card" style="border-radius: 0">
                    <div class="mx-4 my-1 mt-4">
                        <label for="Password_Lama" class="fs-6">Password
                            Lama</label>
                        <input type="hidden" name="password" value="{{ auth()->user()->password }}">
                        <input name="Password_Lama" type="password"
                            class="form-control @error('Password_Lama') is-invalid @enderror shadow-sm" id="Password_Lama"
                            tabindex="1">
                        @error('Password_Lama')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mx-4 my-1">
                        <label for="Password_Baru" class="fs-6">Password
                            Baru</label>
                        <input name="Password_Baru" type="password"
                            class="form-control @error('Password_Baru') is-invalid @enderror shadow-sm" id="Password_Baru"
                            tabindex="2">
                        @error('Password_Baru')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mx-4 my-1 mb-3">
                        <label for="Konfirmasi_Password" class="fs-6">Konfirmasi Password</label>
                        <input name="Konfirmasi_Password" type="password"
                            class="form-control @error('Konfirmasi_Password') is-invalid @enderror shadow-sm"
                            id="Konfirmasi_Password" tabindex="3">
                        @error('Konfirmasi_Password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Button Konfirmasi --}}
                    <div class="d-flex justify-content-end mb-4 mx-4">
                        <button class="btn btn-danger btn-login text-white mt-4" style="padding-left: 20px; padding-right: 20px;"
                            tabindex="4">Simpan <i class="bi bi-box-arrow-in-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    {{-- </div> --}}
@endsection
