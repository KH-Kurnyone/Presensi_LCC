@extends('master.indexadmin')
<title>Dashboard - E-Presence LCC</title>
@section('content')
    <div class="pagetitle">
        <h1 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-house-fill mb-2" viewBox="0 0 16 16">
                <path
                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg> Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary">Home</li>
                <li class="breadcrumb-item text-secondary active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row d-flex align-items-stretch">
            <div class="col-lg-7">

                {{-- Grafik Kehadiran Mahasiswa --}}
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="fw-bold text-default text-center mt-3">Grafik Kehadiran Mahasiswa Tingkat I</h4>
                        <div class="row my-4">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="monthSelect">Filter Bulan:</label>
                                    <select class="form-select" id="monthSelect" onchange="updateChart()">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>

                {{-- Total Mahasiswa Terdaftar --}}
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="fw-bold text-default mt-3">Total Mahasiswa Terdaftar</h5>
                        <label>Filter Tingkat</label>
                        <form id="filterForm">
                            <select name="tingkat" id="tingkatSelect" class="form-select">
                                <option value="1" {{ request('tingkat') == '1' ? 'selected' : '' }}>Tingkat I</option>
                                <option value="2" {{ request('tingkat') == '2' ? 'selected' : '' }}>Tingkat II</option>
                                <option value="3" {{ request('tingkat') == '3' ? 'selected' : '' }}>Tingkat III
                                </option>
                            </select>
                        </form>
                        <div id="mahasiswaData">
                            @include('dashboard.partials._mahasiswaData', [
                                'mahasiswa' => $mahasiswa,
                                'kelas' => $kelas,
                            ])
                        </div>
                    </div>
                </div>
            </div>

            {{-- Top 7 Mahasiswa Terajin --}}
            <div class="col-lg-5">
                <div class="card shadow" style="height: 96%">
                    <div class="card-body">
                        <h5 class="fw-bold text-default text-center mt-4">Top 7 Mahasiswa Terajin <br> Tingkat I</h5>
                        <label class="mt-3">Pilih Berdasarkan Kegiatan</label>
                        <select name="selectKegiatan" id="selectKegiatan" class="form-select mb-3">
                            <option selected value="">Semua Kegiatan</option>
                            @foreach ($dataKegiatan as $item)
                                <option value="{{ $item->id }}">{{ $item->kegiatan }}</option>
                            @endforeach
                        </select>
                        <div id="top7MahasiswaContainer">
                            @foreach ($top7Mahasiswa as $item)
                                <div class="d-flex justify-content-between align-items-center p-2 rounded-3 mt-2 shadow-sm"
                                    @if ($loop->iteration == 1) style="background-color: rgb(255, 238, 144);"
        @elseif ($loop->iteration == 2)
            style="background-color: rgb(228, 228, 228);"
        @elseif ($loop->iteration == 3)
            style="background-color: rgb(235, 211, 197);"
        @else
            style="background-color: rgb(228, 245, 255);" @endif>
                                    <div class="d-flex">
                                        <div class="my-auto">
                                            <p class="my-auto fw-bold">#{{ $loop->iteration }}</p>
                                        </div>
                                        <div class="my-auto mx-3">
                                            <div class="fw-bold my-auto">{{ $item->mahasiswa->nama }}</div>
                                            <div class="my-auto">{{ $item->total_hadir }} Hadir & {{ $item->total_telat }}
                                                Telat</div>
                                        </div>
                                    </div>
                                    <div class="ms-auto d-flex">
                                        @if ($loop->iteration <= 3)
                                            <p class="my-auto"><i class="bi bi-check-circle-fill text-success"></i></p>
                                        @endif
                                    </div>
                                </div>

                                @if ($loop->iteration == 5)
                                    <div class="border border-secondary my-4"></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            {{-- Perbandingan Anggota LCC Dengan Bukan Anggota --}}
            <div class="col-lg-5 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h5 class="text-center text-default mb-4 mt-3 fw-bold">Perbandingan Anggota LCC dengan Bukan Anggota Prodi MI
                        </h5>
                        <div class="mb-4">
                            <label for="level-filter" class="form-label me-2">Filter Tingkat:</label>
                            <select id="level-filter" class="form-select">
                                <option value="1">Tingkat I</option>
                                <option value="2">Tingkat II</option>
                                <option value="3">Tingkat III</option>
                            </select>
                        </div>
                        <canvas id="organizationChart"></canvas>
                    </div>
                </div>
            </div>

            {{-- Total Anggota LCC --}}
            <div class="col-lg-7">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="fw-bold text-default mt-3">Total Anggota LCC</h5>
                        <label>Filter Tingkat</label>
                        <form id="filterFormLCC">
                            <select name="tingkatLCC" id="tingkatLCCSelect" class="form-select">
                                <option value="1" {{ request('tingkatLCC') == '1' ? 'selected' : '' }}>Tingkat I
                                </option>
                                <option value="2" {{ request('tingkatLCC') == '2' ? 'selected' : '' }}>Tingkat II
                                </option>
                                <option value="3" {{ request('tingkatLCC') == '3' ? 'selected' : '' }}>Tingkat III
                                </option>
                            </select>
                        </form>
                        <div id="mahasiswaLCCData">
                            @include('dashboard.partials._mahasiswaLCC', [
                                'mahasiswaLCC' => $mahasiswaLCC,
                                'kelasLCC' => $kelasLCC,
                            ])
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('js_dashboard')
    {{-- Total Master Data --}}
    <script>
        $(document).ready(function() {
            // Filter Total Mahasiswa Terdaftar
            $('#tingkatSelect').change(function() {
                var tingkat = $(this).val();
                $.ajax({
                    url: '{{ route('dashboard.index') }}',
                    type: 'GET',
                    data: {
                        tingkat: tingkat,
                        requestType: 'mahasiswa'
                    },
                    success: function(response) {
                        $('#mahasiswaData').html(response);
                    }
                });
            });

            // Filter Total Anggota LCC
            $('#tingkatLCCSelect').change(function() {
                var tingkatLCC = $(this).val();
                $.ajax({
                    url: '{{ route('dashboard.index') }}',
                    type: 'GET',
                    data: {
                        tingkatLCC: tingkatLCC,
                        requestType: 'mahasiswaLCC'
                    },
                    success: function(response) {
                        $('#mahasiswaLCCData').html(response);
                    }
                });
            });
        });
    </script>

    {{-- Grafik Kehadiran old --}}
    {{-- <script>
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        let attendanceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Office Class', 'Multimedia Class', 'Programing Class'],
                datasets: [{
                        label: 'Hadir',
                        data: [12, 19, 3],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Sakit',
                        data: [2, 3, 1],
                        backgroundColor: 'rgba(255, 206, 86, 0.5)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Izin',
                        data: [3, 2, 1],
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Alfa',
                        data: [1, 2, 1],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        function updateChart() {
            const month = document.getElementById('monthSelect').value;

            // Update data sesuai dengan bulan yang dipilih
            const newData = {
                0: [12, 19, 3, 2], // Januari
                1: [8, 10, 5, 7], // Februari
                2: [10, 15, 4, 3], // Maret
                3: [15, 14, 3, 2], // April
                4: [20, 12, 5, 8], // Mei
                5: [18, 15, 6, 5], // Juni
                6: [12, 17, 8, 4], // Juli
                7: [16, 12, 7, 9], // Agustus
                8: [14, 16, 9, 6], // September
                9: [17, 10, 8, 4], // Oktober
                10: [19, 13, 7, 3], // November
                11: [21, 11, 6, 2], // Desember
            };

            attendanceChart.data.datasets[0].data = newData[month];
            attendanceChart.update();
        }
    </script> --}}

    {{-- Grafik Kehadiran new --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const monthSelect = document.getElementById('monthSelect');
            const currentMonth = new Date().getMonth(); // Mendapatkan bulan saat ini (0 = Januari, 11 = Desember)

            monthSelect.selectedIndex = currentMonth; // Menyesuaikan opsi yang dipilih dengan bulan saat ini

            updateChart(); // Memperbarui chart dengan data bulan saat ini
        });

        const ctx = document.getElementById('attendanceChart').getContext('2d');
        let attendanceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Office Class', 'Multimedia Class', 'Programming Class'],
                datasets: [{
                        label: 'Hadir',
                        data: [12, 19, 3],
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Sakit',
                        data: [2, 3, 1],
                        backgroundColor: 'rgba(255, 206, 86, 0.5)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Izin',
                        data: [3, 2, 1],
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Alfa',
                        data: [1, 2, 1],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        function updateChart() {
            const month = document.getElementById('monthSelect').value;

            // Update data sesuai dengan bulan yang dipilih
            const newData = {
                0: [12, 19, 3, 2], // Januari
                1: [8, 10, 5, 7], // Februari
                2: [10, 15, 4, 3], // Maret
                3: [15, 14, 3, 2], // April
                4: [20, 12, 5, 8], // Mei
                5: [18, 15, 6, 5], // Juni
                6: [12, 17, 8, 4], // Juli
                7: [16, 12, 7, 9], // Agustus
                8: [14, 16, 9, 6], // September
                9: [17, 10, 8, 4], // Oktober
                10: [19, 13, 7, 3], // November
                11: [21, 11, 6, 2], // Desember
            };

            attendanceChart.data.datasets[0].data = newData[month];
            attendanceChart.update();
        }
    </script> --}}

    {{-- Grafik Kehadiran New Database --}}
    <script>
        // Inisialisasi chart
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        let attendanceChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [], // Label akan diisi dengan data dari AJAX
                datasets: [{
                        label: 'Hadir',
                        data: [], // Data akan diisi dengan data dari AJAX
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Sakit',
                        data: [], // Data akan diisi dengan data dari AJAX
                        backgroundColor: 'rgba(255, 206, 86, 0.5)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Izin',
                        data: [], // Data akan diisi dengan data dari AJAX
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Alfa',
                        data: [], // Data akan diisi dengan data dari AJAX
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        // Fungsi untuk memperbarui chart
        function updateChart() {
            const month = document.getElementById('monthSelect').value;

            $.ajax({
                url: '/attendance-data',
                type: 'GET',
                data: {
                    month: month
                },
                success: function(data) {
                    const labels = [];
                    const hadirData = [];
                    const sakitData = [];
                    const izinData = [];
                    const alfaData = [];

                    data.forEach(item => {
                        labels.push(item.kegiatan);
                        hadirData.push(item.hadir);
                        sakitData.push(item.sakit);
                        izinData.push(item.izin);
                        alfaData.push(item.alfa);
                    });

                    attendanceChart.data.labels = labels;
                    attendanceChart.data.datasets[0].data = hadirData;
                    attendanceChart.data.datasets[1].data = sakitData;
                    attendanceChart.data.datasets[2].data = izinData;
                    attendanceChart.data.datasets[3].data = alfaData;
                    attendanceChart.update();
                }
            });
        }

        // Memperbarui chart saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const monthSelect = document.getElementById('monthSelect');
            const currentMonth = new Date().getMonth() + 1; // Bulan saat ini

            monthSelect.value = currentMonth; // Menyesuaikan opsi yang dipilih dengan bulan saat ini

            updateChart(); // Memperbarui chart dengan data bulan saat ini
        });
    </script>

    {{-- Grafik Anggota dan Bukan Anggota --}}
    {{-- <script>
        const ctxOrganization = document.getElementById('organizationChart').getContext('2d');

        const organizationData = {
            tingkatI: {
                anggota: 60,
                bukanAnggota: 40,
            },
            tingkatII: {
                anggota: 4,
                bukanAnggota: 36,
            },
            tingkatIII: {
                anggota: 80,
                bukanAnggota: 20,
            },
        };

        const organizationChart = new Chart(ctxOrganization, {
            type: 'pie',
            data: {
                labels: ['Anggota LCC dan BPH', 'Bukan Anggota'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [organizationData.tingkatI.anggota, organizationData.tingkatI.bukanAnggota],
                    backgroundColor: ['rgba(255, 99, 132, 1)', 'silver'],
                    borderColor: ['rgba(255, 99, 132, 2)', 'silver'],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        });

        document.getElementById('level-filter').addEventListener('change', function() {
            const levelIndex = this.value;
            let data;
            switch (levelIndex) {
                case '0':
                    data = [organizationData.tingkatI.anggota, organizationData.tingkatI.bukanAnggota];
                    break;
                case '1':
                    data = [organizationData.tingkatII.anggota, organizationData.tingkatII.bukanAnggota];
                    break;
                case '2':
                    data = [organizationData.tingkatIII.anggota, organizationData.tingkatIII.bukanAnggota];
                    break;
            }
            organizationChart.data.datasets[0].data = data;
            organizationChart.update();
        });
    </script> --}}

    {{-- <script>
        document.getElementById('level-filter').addEventListener('change', function() {
            const levelIndex = this.value;

            fetch(`/organization-data?tingkat=${levelIndex}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Tambahkan ini untuk melihat data yang diterima
                    organizationChart.data.datasets[0].data = [data.anggota, data.bukanAnggota];
                    organizationChart.update();
                })
                .catch(error => console.error('Error:', error));
        });

        const ctxOrganization = document.getElementById('organizationChart').getContext('2d');

        const organizationChart = new Chart(ctxOrganization, {
            type: 'pie',
            data: {
                labels: ['Anggota LCC dan BPH', 'Bukan Anggota'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [0, 0], // Inisialisasi awal dengan data default
                    backgroundColor: ['rgba(255, 99, 132, 1)', 'silver'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'silver'],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true, // Membuat chart responsif
                plugins: {
                    legend: {
                        position: 'top', // Mengatur posisi legenda di atas chart
                    },
                },
            },
        });
    </script> --}}

    {{-- Grafik Anggota dan Bukan Anggota --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil data untuk tingkat I saat halaman dimuat
            fetchDataForLevel('1'); // Ganti dengan nilai enum default yang Anda inginkan
        });

        document.getElementById('level-filter').addEventListener('change', function() {
            const levelIndex = this.value; // Nilai filter adalah string
            fetchDataForLevel(levelIndex);
        });

        function fetchDataForLevel(levelIndex) {
            fetch(`/organization-data?tingkat=${levelIndex}`)
                .then(response => response.json())
                .then(data => {
                    console.log(`Data untuk tingkat ${levelIndex}:`, data); // Debug data yang diterima
                    organizationChart.data.datasets[0].data = [data.anggota, data.bukanAnggota];
                    organizationChart.update();
                })
                .catch(error => console.error('Error:', error));
        }

        const ctxOrganization = document.getElementById('organizationChart').getContext('2d');

        const organizationChart = new Chart(ctxOrganization, {
            type: 'pie',
            data: {
                labels: ['Anggota LCC dan BPH', 'Bukan Anggota'],
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: [0, 0], // Inisialisasi awal dengan data default
                    backgroundColor: ['rgba(255, 99, 132, 1)', 'silver'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'silver'],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true, // Membuat chart responsif
                plugins: {
                    legend: {
                        position: 'top', // Mengatur posisi legenda di atas chart
                    },
                },
            },
        });
    </script>

    {{-- Top 7 Mahasiswa Terajin Tingkat I --}}
    <script>
        document.getElementById('selectKegiatan').addEventListener('change', function() {
            const kegiatanId = this.value;

            fetch(`/dashboard?kegiatan_id=${kegiatanId}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('top7MahasiswaContainer');
                    container.innerHTML = '';

                    data.forEach((item, index) => {
                        let backgroundColor;
                        if (index === 0) backgroundColor = 'rgb(255, 238, 144)';
                        else if (index === 1) backgroundColor = 'rgb(228, 228, 228)';
                        else if (index === 2) backgroundColor = 'rgb(235, 211, 197)';
                        else backgroundColor = 'rgb(228, 245, 255)';

                        const mahasiswaNama = item.mahasiswa ? item.mahasiswa.nama :
                            'Nama tidak tersedia';

                        container.innerHTML += `
                <div class="d-flex justify-content-between align-items-center p-2 rounded-3 mt-2 shadow-sm" style="background-color: ${backgroundColor};">
                    <div class="d-flex">
                        <div class="my-auto">
                            <p class="my-auto fw-bold">#${index + 1}</p>
                        </div>
                        <div class="my-auto mx-3">
                            <div class="fw-bold my-auto">${mahasiswaNama}</div>
                            <div class="my-auto">${item.total_hadir} Hadir & ${item.total_telat} Telat</div>
                        </div>
                    </div>
                    <div class="ms-auto d-flex">
                        ${(index <= 2) ? '<p class="my-auto"><i class="bi bi-check-circle-fill text-success"></i></p>' : ''}
                    </div>
                </div>
            `;

                        if (index === 4) {
                            container.innerHTML += '<div class="border border-secondary my-4"></div>';
                        }
                    });
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
