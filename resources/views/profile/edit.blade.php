@extends('master.indexadmin')
<title>Edit Profile - E-Presence LCC</title>
@section('content')
    <div class="pagetitle">
        <h1 class="fw-bold text-dark">
            <a href="/profile" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-arrow-left mb-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg></a>
            Edit Data Mahasiswa
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/profile">Profile</a></li>
                <li class="breadcrumb-item active"><a href="/profile-edit">Edit Data</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <div class="mx-3 my-3">
                <form action="{{ url('/profile-update/' . auth()->user()->mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 my-2">
                            {{-- Input NIM --}}
                            <div>
                                <label for="NIM"
                                    class="@if (old('nim') && old('nim') != auth()->user()->mahasiswa->nim) text-success @endif">NIM</label>
                                <input type="number" name="nim" id="NIM"
                                    class="form-control shadow-sm @if (old('nim') && old('nim') != auth()->user()->mahasiswa->nim) border-success text-success @endif @error('nim') is-invalid @enderror"
                                    autocomplete="off" tabindex="1" disabled
                                    value="{{ old('nim', auth()->user()->mahasiswa->nim) }}">
                                @error('nim')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Input Nama Mahasiswa --}}
                            <div class="mt-3">
                                <label for="Nama_Mahasiswa"
                                    class="@if (old('nama') && old('nama') != auth()->user()->mahasiswa->nama) text-success @endif">Nama Mahasiswa</label>
                                <input type="text" name="nama" id="Nama_Mahasiswa"
                                    class="form-control shadow-sm @if (old('nama') && old('nama') != auth()->user()->mahasiswa->nama) border-success text-success @endif @error('nama') is-invalid @enderror"
                                    autocomplete="off" tabindex="2"
                                    value="{{ old('nama', auth()->user()->mahasiswa->nama) }}">
                                @error('nama')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3">
                                {{-- Input Jenis Kelamin --}}
                                <label for="jenis_kelamin"
                                    class="@if (old('jenis_kelamin') && old('jenis_kelamin') != auth()->user()->mahasiswa->jenis_kelamin) text-success @endif">Jenis
                                    Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-select shadow-sm @if (old('jenis_kelamin') && old('jenis_kelamin') != auth()->user()->mahasiswa->jenis_kelamin) border-success text-success @endif @error('jenis_kelamin') is-invalid @enderror"
                                    tabindex="3">
                                    <option value="{{ auth()->user()->mahasiswa->jenis_kelamin }}" hidden>
                                        {{ auth()->user()->mahasiswa->jenis_kelamin }}
                                    </option>
                                    <option value="Laki-Laki"
                                        {{ (old('jenis_kelamin') ?? auth()->user()->mahasiswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ (old('jenis_kelamin') ?? auth()->user()->mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                {{-- Input Tempat Lahir --}}
                                <div class="col-6">
                                    <label for="Tempat_Lahir"
                                        class="@if (old('tempat_lahir') && old('tempat_lahir') != auth()->user()->mahasiswa->tempat_lahir) text-success @endif">Tempat
                                        Lahir</label>
                                    <input type="text" name="tempat_lahir" id="Tempat_Lahir"
                                        class="form-control shadow-sm @if (old('tempat_lahir') && old('tempat_lahir') != auth()->user()->mahasiswa->tempat_lahir) border-success text-success @endif @error('tempat_lahir') is-invalid @enderror"
                                        autocomplete="off" tabindex="4"
                                        value="{{ old('tempat_lahir', auth()->user()->mahasiswa->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Input Tanggal Lahir --}}
                                <div class="col-6">
                                    <label for="Tanggal_Lahir"
                                        class="@if (old('tanggal_lahir') && old('tanggal_lahir') != auth()->user()->mahasiswa->tanggal_lahir) text-success @endif">Tanggal
                                        Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="Tanggal_Lahir"
                                        class="form-control shadow-sm @if (old('tanggal_lahir') && old('tanggal_lahir') != auth()->user()->mahasiswa->tanggal_lahir) border-success text-success @endif @error('tanggal_lahir') is-invalid @enderror"
                                        tabindex="5"
                                        value="{{ old('tanggal_lahir', auth()->user()->mahasiswa->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 my-2">
                            {{-- Input Alamat --}}
                            <div>
                                <label for="Alamat"
                                    class="@if (old('alamat') && old('alamat') != auth()->user()->mahasiswa->alamat) text-success @endif">Alamat</label>
                                <textarea name="alamat" id="Alamat" cols="30" rows="2"
                                    class="form-control shadow-sm @if (old('alamat') && old('alamat') != auth()->user()->mahasiswa->alamat) border-success text-success @endif @error('alamat') is-invalid @enderror"
                                    autocomplete="off" tabindex="6">{{ old('alamat', auth()->user()->mahasiswa->alamat) }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mt-3">
                                {{-- Input Asal Sekolah --}}
                                <div class="col-lg-6 my-1">
                                    <label for="Asal_Sekolah"
                                        class="@if (old('asal_sekolah') && old('asal_sekolah') != auth()->user()->mahasiswa->asal_sekolah) text-success @endif">Asal
                                        Sekolah</label>
                                    <input type="text" name="asal_sekolah" id="Asal_Sekolah"
                                        class="form-control shadow-sm @if (old('asal_sekolah') && old('asal_sekolah') != auth()->user()->mahasiswa->asal_sekolah) border-success text-success @endif @error('asal_sekolah') is-invalid @enderror"
                                        autocomplete="off" tabindex="7"
                                        value="{{ old('asal_sekolah', auth()->user()->mahasiswa->asal_sekolah) }}">
                                    @error('asal_sekolah')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Input Jurusan --}}
                                <div class="col-lg-6 my-1">
                                    <label for="Jurusan"
                                        class="@if (old('jurusan') && old('jurusan') != auth()->user()->mahasiswa->jurusan) text-success @endif">Jurusan</label>
                                    <input type="text" name="jurusan" id="Jurusan"
                                        class="form-control shadow-sm @if (old('jurusan') && old('jurusan') != auth()->user()->mahasiswa->jurusan) border-success text-success @endif @error('jurusan') is-invalid @enderror"
                                        autocomplete="off" tabindex="8"
                                        value="{{ old('jurusan', auth()->user()->mahasiswa->jurusan) }}">
                                    @error('jurusan')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Input No. Telpon --}}
                            <div class="mt-3">
                                <label for="Nomor_Telepon"
                                    class="@if (old('no_telpon') && old('no_telpon') != auth()->user()->mahasiswa->no_telpon) text-success @endif">Nomor
                                    Telepon</label>
                                <input type="text" name="no_telpon" id="Nomor_Telepon"
                                    class="form-control shadow-sm @if (old('no_telpon') && old('no_telpon') != auth()->user()->mahasiswa->no_telpon) border-success text-success @endif @error('no_telpon') is-invalid @enderror"
                                    autocomplete="off" tabindex="9"
                                    value="{{ old('no_telpon', auth()->user()->mahasiswa->no_telpon) }}">
                                @error('no_telpon')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Button Konfirmasi --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-login text-white mt-4"
                                    style="padding-left: 20px; padding-right: 20px;" tabindex="15">Simpan <i
                                        class="bi bi-box-arrow-in-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
