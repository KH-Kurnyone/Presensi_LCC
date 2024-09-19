@extends('master.indexadmin')
<title>Tambah Data Kehadiran - E-Presence LCC</title>
@section('content')
    {{-- <div class="mobile"> --}}
    <div class="row">
        <div class="col-lg-6">
            <div class="pagetitle">
                <h1 class="text-dark fw-bold">
                    <a href="/kehadiran" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-arrow-left mb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg></a>
                    Tambah Data Kehadiran
                </h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="/kehadiran">Data Kehadiran</a></li>
                        <li class="breadcrumb-item active"><a href="/kehadiran/create">Tambah Data</a></li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
        </div>
        <div class="col-lg-6">
            {{-- Scanner Barcode --}}
            <div class="my-lg-3 mb-2 d-lg-flex justify-content-end">
                <button id="btn-scanner" class="btn btn-danger btn-login text-white d-none" data-bs-toggle="modal"
                    data-bs-target="#scannerModal"><i class="bi bi-upc-scan"></i> Scanner
                    Barcode</button>
            </div>
        </div>
    </div>

    {{-- <div class="scanner-container">
        <div class="scanner-line"></div>
    </div> --}}


    <div class="modal fade" id="scannerModal" tabindex="-1" aria-labelledby="scannerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scannerModalLabel"><i class="bi bi-upc-scan"></i> Scanner Barcode</h5>
                    <button id="btn-close-scanner" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div class="scanner-container">
                        <video id="preview" class="scanner-video" {{-- style="height: 100%; border:1px dashed #000" --}}></video>
                        <div class="scanner-line"></div>
                        <div class="corner top-left"></div>
                        <div class="corner top-right"></div>
                        <div class="corner bottom-left"></div>
                        <div class="corner bottom-right"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <audio id="notification-sound" src="/assetsadmin/notification.mp3" preload="auto"></audio>
        {{-- <a href="/scan" target="_blank" class="btn btn-primary">Scaner Barcode</a> --}}
        <div class="card-header bg-primary" style="padding: 2px"></div>
        <div class="card">
            <form action="/kehadiran" method="POST">
                @csrf
                <div class="row mx-3 mt-3">
                    <div class="col-lg-6">

                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Tanggal Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <input type="date" id="tanggal" name="tanggal"
                                    class="form-control shadow-sm @error('tanggal') is-invalid @enderror"
                                    value="{{ old('tanggal') }}">
                            </div>
                        </div>

                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Pemateri</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <select id="mahasiswa_id" name="mahasiswa_id"
                                    class="form-select shadow-sm @error('mahasiswa_id') is-invalid @enderror"
                                    tabindex="1">
                                    <option hidden value="">- Pilih Pemateri -</option>
                                    <option value="0">BPH LCC</option>
                                    @foreach ($dataPemateri as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('mahasiswa_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Nama Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <select id="kegiatan_id" name="kegiatan_id"
                                    class="form-select shadow-sm @error('kegiatan_id') is-invalid @enderror" tabindex="2">
                                    <option hidden value="">- Pilih Kegiatan -</option>
                                    @foreach ($datakegiatan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kegiatan_id') == $item->id ? 'selected' : '' }}>{{ $item->kegiatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-4 fw-bold">Keterangan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-7">
                                <input id="ket_kegiatan" type="text" name="ket_kegiatan"
                                    class="form-control shadow-sm @error('ket_kegiatan') is-invalid @enderror"
                                    tabindex="3" autocomplete="off" value="{{ old('ket_kegiatan') }}"
                                    placeholder="Tambahkan Keterangan">
                                {{-- <textarea name="ket_kegiatan" id="ket_kegiatan" cols="30" rows="1"
                                    class="form-control shadow-sm @error('ket_kegiatan') is-invalid @enderror" tabindex="3" autocomplete="off"
                                    value="{{ old('ket_kegiatan') }}" placeholder="Tambahkan Keterangan"></textarea> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-3 mt-2 mb-4">
                    <div class="col-lg-2 fw-bold">Waktu Kegiatan</div>
                    <div class="col-lg-1 fw-bold titik-mobile">:</div>
                    @if ($dataSesi->isEmpty())
                        <div class="col-lg-8 checkbox-sesi">Belum Ada Sesi!</div>
                    @else
                        <div class="col-lg-8 checkbox-sesi">
                            <div class="row">
                                @foreach ($dataSesi as $item)
                                    <div class="col-4 col-md-6 col-lg-2 my-1">
                                        {{-- Checkbox Sesi --}}
                                        <input
                                            class="sesi-checkbox form-check-input @error('sesi_id') is-invalid @enderror"
                                            type="checkbox" name="sesi_id[]" value="{{ $item->id }}"
                                            {{ in_array($item->id, old('sesi_id', [])) ? 'checked' : '' }} tabindex="4">
                                        {{-- Label Sesi --}}
                                        <label class="label-sesi" style="cursor: pointer" data-bs-toggle="modal"
                                            data-bs-target="#info-sesi{{ $item->id }}">{{ $item->sesi }}<span
                                                class="ms-1"><i class="bi bi-info-circle-fill"></i></span></label>
                                        {{-- Input Hidden Sesi --}}
                                        <input type="hidden" id="sesi-{{ $item->id }}"
                                            data-waktu-mulai="{{ $item->waktu_mulai }}">
                                    </div>
                                    <!-- Modal Detail Sesi -->
                                    <div class="modal fade" id="info-sesi{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel"><i
                                                            class="bi bi-info-circle-fill fs-4"></i> Detail
                                                        {{ $item->sesi }}
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6 fw-bold">
                                                            Waktu Mulai
                                                        </div>
                                                        <div class="col-6">
                                                            :
                                                            {{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 fw-bold">
                                                            Waktu Selesai
                                                        </div>
                                                        <div class="col-6">
                                                            :
                                                            {{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end mx-3">
                    <button id="btn-confirmation" class="btn btn-danger btn-login text-white" tabindex="5">Konfirmasi <i
                            class="bi bi-box-arrow-in-right"></i></button>
                </div>

                <div id="presence-table" class="d-none">
                    <div class="table-responsive mx-3 my-2">
                        <table class="table table-bordered">
                            <thead class="table-secondary text-center" style="white-space: nowrap">
                                <th>No.</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kelas</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Waktu Hadir</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody style="white-space: nowrap;">
                                {{-- @foreach ($datamahasiswa as $item)
                                    <tr>  
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->nama }} <input type="text" name="mahasiswa_id[]" value="{{ $item->id }}"></td>
                                        <td class="text-center">{{ $item->kelas->kelas }}</td>
                                        <td class="text-center">{{ $item->jenis_kelamin }}</td>
                                        <td class="text-center">
                                            <select name="status_kehadiran[{{ $item->id }}]"
                                                id="status-kehadiran-{{ $item->nim }}"
                                                class="form-select @error('status_kehadiran') is-invalid @enderror"
                                                tabindex="6" required onchange="updateTimeInput(this)">
                                                <option disabled selected hidden></option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Alfa">Alfa</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <input type="time" name="waktu_hadir[]"
                                                id="time-input-{{ $item->nim }}" class="form-control time-input"
                                                value="">
                                        </td>
                                        <td class="text-center" style="width: 150px">
                                            <input type="text" name="keterangan[]" data-nim="{{ $item->nim }}"
                                                class="form-control text-input" value="-" readonly>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                @foreach ($datamahasiswa as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}.</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->kelas->kelas }}</td>
                                        <td class="text-center">{{ $item->jenis_kelamin }}</td>
                                        <td class="text-center">
                                            <select name="status_kehadiran[{{ $item->id }}]"
                                                id="status-kehadiran-{{ $item->nim }}"
                                                class="form-select @error('status_kehadiran') is-invalid @enderror"
                                                tabindex="6" required onchange="updateTimeInput(this)">
                                                <option disabled selected hidden></option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</< /option>
                                                <option value="Alfa">Alfa</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <input type="time" name="waktu_hadir[{{ $item->id }}]"
                                                id="time-input-{{ $item->nim }}" class="form-control time-input"
                                                value="">
                                        </td>
                                        <td class="text-center" style="width: 150px">
                                            <input type="text" name="keterangan[{{ $item->id }}]"
                                                data-nim="{{ $item->nim }}" class="form-control text-input"
                                                value="-" readonly>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end mx-3 mb-5">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#submit-presence" class="btn btn-danger btn-login text-white mt-2" style="padding-left: 20px; padding-right: 20px;"
                            tabindex="7">Simpan <i class="bi bi-box-arrow-in-right"></i></button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="submit-presence" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold text-primary" id="exampleModalLabel"><i class="bi bi-info-circle-fill"></i> Informasi</h1>
                                </div>
                                <div class="modal-body text-center">
                                    <p>Periksa kembali data kehadiran, data yang disimpan tidak dapat diubah lanjutkan menyimpan?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="bi bi-box-arrow-left"></i> Kembali Cek</button>
                                    <button type="submit" class="btn btn-primary">Ya, Simpan <i class="bi bi-box-arrow-in-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </section>
@endsection

@section('js_input')
    {{-- <script>
        function updateTimeInput(selectElement) {
            const timeInput = document.getElementById('time-input-' + selectElement.id.split('-').pop());
            if (selectElement.value === "Hadir") {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                timeInput.value = `${hours}:${minutes}:${seconds}`;
            } else {
                timeInput.value = "-";
            }
        }
    </script> --}}

    {{-- Pilih Header Dulu Baru Presensi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnConfirmation = document.getElementById('btn-confirmation');
            const btnScanner = document.getElementById('btn-scanner');

            // ID dari kolom input dan select yang harus diisi
            const idsToCheck = ['tanggal', 'mahasiswa_id', 'kegiatan_id', 'ket_kegiatan'];
            const checkboxName = 'sesi_id[]';

            btnConfirmation.addEventListener('click', function() {
                let isValid = true;

                // Mengecek semua elemen input dan select
                idsToCheck.forEach(id => {
                    const element = document.getElementById(id);
                    if (element) {
                        if (element.tagName === 'SELECT') {
                            // Jika select belum dipilih (nilai default atau kosong)
                            if (!element.value) {
                                isValid = false;
                                element.classList.add('is-invalid');
                            } else {
                                element.classList.remove('is-invalid');
                            }
                        } else if (element.type === 'text' && !element.value.trim()) {
                            // Validasi untuk input type=text
                            isValid = false;
                            element.classList.add('is-invalid');
                        } else {
                            element.classList.remove('is-invalid');
                        }
                    }
                });

                // Mengecek semua checkbox dengan name 'sesi_id[]'
                const checkboxes = document.querySelectorAll(`input[name="${checkboxName}"]`);
                const isAnyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                if (!isAnyChecked) {
                    isValid = false;
                    // Jika tidak ada checkbox yang dicentang, tambahkan class error
                    checkboxes.forEach(checkbox => checkbox.classList.add('is-invalid'));
                } else {
                    checkboxes.forEach(checkbox => checkbox.classList.remove('is-invalid'));
                }

                // Jika semua validasi lolos
                if (isValid) {
                    // Menambahkan class CSS untuk menonaktifkan interaksi pengguna
                    idsToCheck.forEach(id => {
                        const element = document.getElementById(id);
                        if (element) {
                            element.classList.add('disabled-form');
                        }
                    });

                    // Menambahkan class CSS untuk menonaktifkan semua checkbox
                    checkboxes.forEach(checkbox => {
                        checkbox.classList.add('disabled-form');
                    });

                    // Menghapus class "d-none" pada #presence-table
                    const presenceTable = document.getElementById('presence-table');
                    if (presenceTable) {
                        presenceTable.classList.remove('d-none');
                    }

                    // Menambahkan class "d-none" pada #btn-confirmation
                    btnConfirmation.classList.add('d-none');

                    // Menghapus class "d-none" pada #btn-scanner
                    if (btnScanner) {
                        btnScanner.classList.remove('d-none');
                    }

                    // Menampilkan nilai yang telah diisi (opsional)
                    console.log('Tanggal:', document.getElementById('tanggal').value);
                    console.log('Pemateri:', document.getElementById('mahasiswa_id').value);
                    console.log('Kegiatan:', document.getElementById('kegiatan_id').value);
                    console.log('Keterangan Kegiatan:', document.getElementById('ket_kegiatan').value);

                    const selectedSesi = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value);
                    console.log('Sesi yang Dipilih:', selectedSesi);
                }
            });
        });
    </script>

    {{-- Tanpa [] --}}
    {{-- <script>
        function updateTimeInput(selectElement) {
            const nim = selectElement.id.split('-').pop();
            const timeInput = document.getElementById('time-input-' + nim);
            const keteranganInput = document.querySelector('input[name="keterangan"][data-nim="' + nim + '"]');
            const sesiIdInputs = document.querySelectorAll('input[name="sesi_id[]"]:checked');

            if (selectElement.value === "Hadir") {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                timeInput.value = `${hours}:${minutes}`;
            } else {
                timeInput.value = "-";
            }

            updateKeterangan(nim, timeInput, sesiIdInputs);
        }

        function updateKeterangan(nim, timeInput, sesiIdInputs) {
            const keteranganInput = document.querySelector('input[name="keterangan"][data-nim="' + nim + '"]');
            const waktuHadirs = timeInput.value;

            if (waktuHadirs === '-') {
                keteranganInput.value = 'Keterangan -';
                return;
            }

            const sesiData = Array.from(sesiIdInputs).map(input => ({
                id: input.value,
                waktuMulai: document.querySelector(`#sesi-${input.value}`).dataset.waktuMulai
            }));

            if (sesiData.length === 0) {
                keteranganInput.value = 'Pilih Sesi !';
                return;
            }

            // Temukan waktu mulai terkecil dari semua sesi yang dipilih
            const minSesiWaktu = sesiData.reduce((min, sesi) => {
                const sesiWaktu = new Date('1970-01-01T' + sesi.waktuMulai + 'Z');
                return sesiWaktu < min ? sesiWaktu : min;
            }, new Date('2100-01-01T00:00:00Z'));

            const waktuHadirsDate = new Date('1970-01-01T' + waktuHadirs + 'Z');

            let keterangan = '';
            if (waktuHadirsDate < minSesiWaktu) {
                keterangan = 'Lebih Awal';
            } else if (waktuHadirsDate.getTime() === minSesiWaktu.getTime()) {
                keterangan = 'Tepat Waktu';
            } else if (waktuHadirsDate > minSesiWaktu) {
                const diffMs = waktuHadirsDate - minSesiWaktu;
                const diffMins = Math.floor(diffMs / (1000 * 60));
                keterangan = `Telat ${diffMins} menit`;
            }

            if (keterangan === '') {
                keterangan = 'Tidak Hadir';
            }

            keteranganInput.value = keterangan;
        }
    </script> --}}

    {{-- waktu_hadir[] dan keterangan[] --}}
    {{-- <script>
        function updateTimeInput(selectElement) {
            const nim = selectElement.id.split('-').pop();
            const timeInput = document.getElementById('time-input-' + nim);
            const keteranganInput = document.querySelector('input[name="keterangan[]"][data-nim="' + nim + '"]');
            const sesiIdInputs = document.querySelectorAll('input[name="sesi_id[]"]:checked');

            if (selectElement.value === "Hadir") {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                timeInput.value = `${hours}:${minutes}`;
            } else {
                timeInput.value = ""; // Mengosongkan waktu_hadir jika bukan "Hadir"
            }

            updateKeterangan(nim, timeInput, sesiIdInputs);
        }

        function updateKeterangan(nim, timeInput, sesiIdInputs) {
            const keteranganInput = document.querySelector('input[name="keterangan[]"][data-nim="' + nim + '"]');
            const waktuHadirs = timeInput.value;

            if (waktuHadirs === '-') {
                keteranganInput.value = 'Keterangan -';
                return;
            }

            const sesiData = Array.from(sesiIdInputs).map(input => ({
                id: input.value,
                waktuMulai: document.querySelector(`#sesi-${input.value}`).dataset.waktuMulai
            }));

            if (sesiData.length === 0) {
                keteranganInput.value = 'Pilih Sesi !';
                return;
            }

            const minSesiWaktu = sesiData.reduce((min, sesi) => {
                const sesiWaktu = new Date('1970-01-01T' + sesi.waktuMulai + 'Z');
                return sesiWaktu < min ? sesiWaktu : min;
            }, new Date('2100-01-01T00:00:00Z'));

            const waktuHadirsDate = new Date('1970-01-01T' + waktuHadirs + 'Z');

            let keterangan = '';
            if (waktuHadirsDate < minSesiWaktu) {
                keterangan = 'Lebih Awal';
            } else if (waktuHadirsDate.getTime() === minSesiWaktu.getTime()) {
                keterangan = 'Tepat Waktu';
            } else if (waktuHadirsDate > minSesiWaktu) {
                const diffMs = waktuHadirsDate - minSesiWaktu;
                const diffMins = Math.floor(diffMs / (1000 * 60));
                keterangan = `Telat ${diffMins} menit`;
            }

            if (keterangan === '') {
                keterangan = 'Tidak Hadir';
            }

            keteranganInput.value = keterangan;
        }
    </script> --}}

    <script>
        function updateTimeInput(selectElement) {
            const nim = selectElement.id.split('-').pop();
            const mahasiswaId = selectElement.name.match(/\[(.*?)\]/)[1]; // Extract the mahasiswaId from the name attribute
            const timeInput = document.querySelector(`input[name="waktu_hadir[${mahasiswaId}]"]`);
            const keteranganInput = document.querySelector(`input[name="keterangan[${mahasiswaId}]"]`);
            const sesiIdInputs = document.querySelectorAll('input[name="sesi_id[]"]:checked');

            if (selectElement.value === "Hadir") {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                timeInput.value = `${hours}:${minutes}`;
            } else {
                timeInput.value = ""; // Mengosongkan waktu_hadir jika bukan "Hadir"
            }

            updateKeterangan(mahasiswaId, timeInput, sesiIdInputs);
        }

        function updateKeterangan(mahasiswaId, timeInput, sesiIdInputs) {
            const keteranganInput = document.querySelector(`input[name="keterangan[${mahasiswaId}]"]`);
            const waktuHadirs = timeInput.value;

            if (waktuHadirs === '-') {
                keteranganInput.value = 'Keterangan -';
                return;
            }

            const sesiData = Array.from(sesiIdInputs).map(input => ({
                id: input.value,
                waktuMulai: document.querySelector(`#sesi-${input.value}`).dataset.waktuMulai
            }));

            if (sesiData.length === 0) {
                keteranganInput.value = 'Pilih Sesi !';
                return;
            }

            const minSesiWaktu = sesiData.reduce((min, sesi) => {
                const sesiWaktu = new Date('1970-01-01T' + sesi.waktuMulai + 'Z');
                return sesiWaktu < min ? sesiWaktu : min;
            }, new Date('2100-01-01T00:00:00Z'));

            const waktuHadirsDate = new Date('1970-01-01T' + waktuHadirs + 'Z');

            let keterangan = '';
            if (waktuHadirsDate < minSesiWaktu) {
                keterangan = 'Lebih Awal';
            } else if (waktuHadirsDate.getTime() === minSesiWaktu.getTime()) {
                keterangan = 'Tepat Waktu';
            } else if (waktuHadirsDate > minSesiWaktu) {
                const diffMs = waktuHadirsDate - minSesiWaktu;
                const diffMins = Math.floor(diffMs / (1000 * 60));
                keterangan = `Telat ${diffMins} menit`;
            }

            if (keterangan === '') {
                keteranganInput.value = 'Tidak Hadir';
            } else {
                keteranganInput.value = keterangan;
            }
        }
    </script>


    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        let scanner;

        document.getElementById('btn-scanner').addEventListener('click', function() {
            scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            scanner.addListener('scan', function(content) {
                // console.log(content);
                statusKehadiran(content);
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        });

        document.getElementById('btn-close-scanner').addEventListener('click', function() {
            if (scanner) {
                scanner.stop();
            }
        });

        function statusKehadiran(nim) {
            $.ajax({
                url: '/getStudentName',
                type: 'GET',
                data: {
                    nim: nim
                },
                success: function(response) {
                    let name = response.name;
                    $('#status-kehadiran-' + nim).val('Hadir').change();
                    var audio = document.getElementById('notification-sound');
                    audio.play();
                    toastr.options = {
                        "progressBar": true,
                        "closeButton": true,
                        "positionClass": "toast-top-right",
                        "timeOut": 3000
                    };
                    toastr.success(name + ' Hadir!');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching student name:', error);
                }
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tanggalInput = document.getElementById('tanggal');

            if (!tanggalInput.value) { // Hanya set tanggal default jika belum ada nilai
                const today = new Date();
                const yyyy = today.getFullYear();
                const mm = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                const dd = String(today.getDate()).padStart(2, '0');

                const todayFormatted = `${yyyy}-${mm}-${dd}`;
                tanggalInput.value = todayFormatted;
            }
        });
    </script>
@endsection
