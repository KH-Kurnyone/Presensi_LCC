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
            <div class="my-lg-3 mb-2 d-lg-flex justify-content-end">
                <button id="btn-scanner" class="btn btn-login text-white" data-bs-toggle="modal"
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
                    <button id="btn-close" type="button" class="btn-close" data-bs-dismiss="modal"
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
                {{-- Kolom Input Atas --}}
                <div class="row mx-3 my-3">
                    <div class="col-lg-6">
                        <div class="row my-1">
                            <div class="col-lg-5 fw-bold">Tanggal Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-6">
                                <input type="date" name="tanggal"
                                    class="form-control shadow-sm @error('tanggal') is-invalid @enderror" tabindex="1"
                                    value="{{ old('tanggal') }}">
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col-lg-5 fw-bold">Nama Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-6">
                                <select name="kegiatan_id"
                                    class="form-select shadow-sm @error('kegiatan_id') is-invalid @enderror" tabindex="2">
                                    <option disabled selected hidden></option>
                                    @foreach ($datakegiatan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kegiatan_id') == $item->id ? 'selected' : '' }}>{{ $item->kegiatan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row my-1">
                            <div class="col-lg-3 fw-bold">Ket. Kegiatan</div>
                            <div class="col-lg-1 fw-bold titik-mobile">:</div>
                            <div class="col-lg-8">
                                {{-- <input type="text" name="ket_kegiatan"
                                        class="form-control shadow-sm @error('ket_kegiatan') is-invalid @enderror"
                                        tabindex="4" autocomplete="off"> --}}
                                <textarea name="ket_kegiatan" cols="30" rows="2" tabindex="3"
                                    class="form-control shadow-sm @error('ket_kegiatan') is-invalid @enderror">{{ old('ket_kegiatan') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Kolom Input Atas --}}

                {{-- Table Kehadiran --}}
                <div class="table-responsive mx-3 my-2">
                    <table class="table table-bordered">
                        <thead class="table-secondary text-center" style="white-space: nowrap">
                            <th>No.</th>
                            <th>Nama Mahasiswa</th>
                            <th>Prodi</th>
                            <th>Kelas</th>
                            <th>Gender</th>
                            {{-- <th>Tingkat</th> --}}
                            <th>Status Kehadiran</th>
                        </thead>
                        <tbody style="white-space: nowrap">
                            @foreach ($datamahasiswa as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}.</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="text-center">{{ $item->kelas->prodi->prodi }}</td>
                                    <td class="text-center">{{ $item->kelas->kelas }}</td>
                                    <td class="text-center">{{ $item->jenis_kelamin }}</td>
                                    {{-- <td class="text-center">{{ $item->tingkat }}</td> --}}
                                    <td class="text-center">
                                        <input type="hidden" name="mahasiswa_id" value="{{ $item->id }}">
                                        <select name="status_kehadiran[{{ $item->id }}]"
                                            id="status-kehadiran-{{ $item->nim }}"
                                            class="form-select @error('status_kehadiran') is-invalid @enderror"
                                            tabindex="4">
                                            <option disabled selected hidden></option>
                                            <option value="Hadir">Hadir</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Alfa">Alfa</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- End Tabel Kehadiran --}}
                <div class="d-flex justify-content-end mx-3 mb-5">
                    <button class="btn btn-login text-white mt-2" style="padding-left: 20px; padding-right: 20px;"
                        tabindex="6">Simpan <i class="bi bi-box-arrow-in-right"></i></button>
                </div>
            </form>
        </div>

    </section>
@endsection

@section('js_input')
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

        document.getElementById('btn-close').addEventListener('click', function() {
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
@endsection
