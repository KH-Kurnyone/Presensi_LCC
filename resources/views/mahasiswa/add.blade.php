@extends('master.indexadmin')
<title>Tambah Data Mahasiswa - E-Presence LCC</title>
@section('content')
    {{-- <div class="mobile"> --}}
    <div class="pagetitle">
        <h1 class="text-dark fw-bold">
            <a href="/mahasiswa" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-arrow-left mb-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg></a>
            Tambah Data Mahasiswa
        </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"><a href="/mahasiswa">Data Mahasiswa</a></li>
                <li class="breadcrumb-item active"><a href="/mahasiswa/create">Tambah Data</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <div class="mx-3 my-3">
                <form action="/mahasiswa" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 my-2">
                            {{-- Input NIM --}}
                            <div>
                                <label for="NIM">NIM</label>
                                <input type="number" name="nim" id="NIM"
                                    class="form-control shadow-sm @error('nim') is-invalid @enderror" autocomplete="off"
                                    tabindex="1" value="{{ old('nim') }}">
                                @error('nim')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Input Nama Mahasiswa --}}
                            <div class="mt-3">
                                <label for="Nama_Mahasiswa">Nama Mahasiswa</label>
                                <input type="text" name="nama" id="Nama_Mahasiswa"
                                    class="form-control shadow-sm @error('nama') is-invalid @enderror" autocomplete="off"
                                    tabindex="2" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Input Jenis Kelamin --}}
                            <div class="mt-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-select shadow-sm @error('jenis_kelamin') is-invalid @enderror"
                                    tabindex="3">
                                    <option disabled selected hidden></option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row mt-3">
                                {{-- Input Tempat Lahir --}}
                                <div class="col-6">
                                    <label for="Tempat_Lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="Tempat_Lahir"
                                        class="form-control shadow-sm @error('tempat_lahir') is-invalid @enderror"
                                        autocomplete="off" tabindex="4" value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Input Tanggal Lahir --}}
                                <div class="col-6">
                                    <label for="Tanggal_Lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="Tanggal_Lahir"
                                        class="form-control shadow-sm @error('tanggal_lahir') is-invalid @enderror"
                                        tabindex="5" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Input Alamat --}}
                            <div class="mt-3">
                                <label for="Alamat">Alamat</label>
                                <textarea name="alamat" id="Alamat" cols="30" rows="2"
                                    class="form-control shadow-sm @error('alamat') is-invalid @enderror" autocomplete="off" tabindex="6">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 my-2">
                            <div class="row">
                                {{-- Input Asal Sekolah --}}
                                <div class="col-6">
                                    <label for="Asal_Sekolah">Asal Sekolah</label>
                                    <input type="text" name="asal_sekolah" id="Asal_Sekolah"
                                        class="form-control shadow-sm @error('asal_sekolah') is-invalid @enderror"
                                        autocomplete="off" tabindex="7" value="{{ old('asal_sekolah') }}">
                                    @error('asal_sekolah')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Input Jurusan --}}
                                <div class="col-6">
                                    <label for="Jurusan">Jurusan</label>
                                    <input type="text" name="jurusan" id="Jurusan"
                                        class="form-control shadow-sm @error('jurusan') is-invalid @enderror"
                                        autocomplete="off" tabindex="8" value="{{ old('jurusan') }}">
                                    @error('jurusan')
                                        <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Input No. Telpon --}}
                            <div class="mt-3">
                                <label for="angkatan">Nomor Telepon</label>
                                <input type="number" name="no_telpon" id="angkatan"
                                    class="form-control shadow-sm @error('no_telpon') is-invalid @enderror"
                                    autocomplete="off" tabindex="9" value="{{ old('no_telpon') }}">
                                @error('no_telpon')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- Input Kelas --}}
                            <div class="mt-3">
                                <label for="Kelas">Kelas</label>
                                <select name="kelas_id" id="Kelas"
                                    class="form-select shadow-sm @error('kelas_id') is-invalid @enderror" tabindex="10">
                                    <option disabled selected hidden></option>
                                    @php
                                        $kelasTingkat = $datakelas->groupBy('tingkat');
                                    @endphp
                                    @foreach ($kelasTingkat as $tingkat => $kelas)
                                        <optgroup
                                            @if ($tingkat == 1) label="Tingkat 1"
                                            @elseif ($tingkat == 2)
                                            label="Tingkat 2" 
                                            @elseif ($tingkat == 3)
                                            label="Tingkat 3"
                                            @elseif ($tingkat == 4)
                                            label="Alumni" @endif>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->kelas }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                    {{-- @foreach ($datakelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kelas_id') == $item->id ? 'selected' : '' }}>{{ $item->kelas }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                @error('kelas_id')
                                    <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Input Status UKM --}}
                            <div class="mt-3">
                                <label for="Status_UKM">Status UKM</label>
                                <select name="status_ukm" id="Status_UKM"
                                    class="form-select shadow-sm @error('status_ukm') is-invalid @enderror"
                                    tabindex="11">
                                    <option value="Bukan Anggota" selected hidden>Bukan Anggota</option>
                                    <option value="BPH" {{ old('status_ukm') == 'BPH' ? 'selected' : '' }}>BPH</option>
                                    <option value="Anggota LCC"
                                        {{ old('status_ukm') == 'Anggota LCC' ? 'selected' : '' }}>Anggota LCC</option>
                                    <option value="Bukan Anggota"
                                        {{ old('status_ukm') == 'Bukan Anggota' ? 'selected' : '' }}>Bukan Anggota</option>
                                </select>
                                @error('status_ukm')
                                    <span class="invalid-feedback mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Input Jabatan --}}
                            <div class="mt-3">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan_id" id="jabatan"
                                    class="form-select shadow-sm @error('jabatan_id') is-invalid @enderror"
                                    tabindex="12">
                                    <option value="1" selected>Mahasiswa</option>
                                </select>
                                @error('jabatan_id')
                                    <span class="invalid-feedback mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Input Alasan --}}
                            <div class="mt-3">
                                <label for="alasan">Alasan Masuk LCC</label>
                                <textarea name="alasan" id="alasan" cols="30" rows="2"
                                    class="form-control shadow-sm @error('alasan') is-invalid @enderror" autocomplete="off" tabindex="13">{{ old('alasan') }}</textarea>
                                @error('alasan')
                                    <span class="invalid-feedback mb-2">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="row">
                                    <div class="col-6">
                                        <div class="mt-3">
                                            <label for="tingkat">Tingkat</label>
                                            <select name="tingkat" id="tingkat"
                                                class="form-select shadow-sm @error('tingkat') is-invalid @enderror"
                                                tabindex="13">
                                                <option disabled selected hidden></option>
                                                <option value="1" {{ old('tingkat') == '1' ? 'selected' : '' }}>
                                                    Satu
                                                </option>
                                                <option value="2" {{ old('tingkat') == '2' ? 'selected' : '' }}>Dua
                                                </option>
                                                <option value="3" {{ old('tingkat') == '3' ? 'selected' : '' }}>
                                                    Tiga
                                                </option>
                                                <option value="4" {{ old('tingkat') == '4' ? 'selected' : '' }}>
                                                    Alumni</option>
                                            </select>
                                            @error('tingkat')
                                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mt-3">
                                            <label for="angkatan">Angkatan</label>
                                            <input type="number" name="angkatan" id="angkatan"
                                                class="form-control shadow-sm @error('angkatan') is-invalid @enderror"
                                                autocomplete="off" tabindex="14" value="{{ old('angkatan') }}">
                                            @error('angkatan')
                                                <span class="invalid-feedback  mb-2">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                            {{-- Button Konfirmasi --}}
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-danger btn-login text-white mt-4"
                                    style="padding-left: 20px; padding-right: 20px;" tabindex="14">Simpan <i
                                        class="bi bi-box-arrow-in-right"></i></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </section>

    {{-- </div> --}}
@endsection
@section('js_mahasiswaAdd')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusUKMSelect = document.getElementById('Status_UKM');
            const jabatanSelect = document.getElementById('jabatan');

            // Store the original options
            const originalOptions = [{
                    value: '1',
                    text: 'Mahasiswa'
                },
                @foreach ($dataJabatan as $item)
                    {
                        value: '{{ $item->id }}',
                        text: '{{ $item->jabatan }}'
                    },
                @endforeach
            ];

            statusUKMSelect.addEventListener('change', function() {
                const selectedStatus = this.value;

                // Clear current options
                jabatanSelect.innerHTML = '';

                // Add appropriate options based on selected status
                if (selectedStatus === 'BPH') {
                    originalOptions.forEach(option => {
                        if (option.value !== '1') { // exclude "Mahasiswa"
                            const newOption = document.createElement('option');
                            newOption.value = option.value;
                            newOption.text = option.text;
                            jabatanSelect.add(newOption);
                        }
                    });
                } else {
                    // Only include "Mahasiswa"
                    const mahasiswaOption = originalOptions.find(option => option.value === '1');
                    const newOption = document.createElement('option');
                    newOption.value = mahasiswaOption.value;
                    newOption.text = mahasiswaOption.text;
                    jabatanSelect.add(newOption);
                }
            });
        });
    </script>
@endsection
