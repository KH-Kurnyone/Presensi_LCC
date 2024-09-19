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
            <div class="col-lg-8">
                <div class="card border shadow-sm h-100">
                    <div class="card-body">
                        <h2 class="text-center mt-3">Jumlah Kehadiran per Kegiatan</h2>
                        <div class="mb-4 text-center">
                            <label for="month-filter" class="form-label">Filter Bulan:</label>
                            <select id="month-filter" class="form-select d-inline-block w-auto">
                                <option value="0">Januari</option>
                                <option value="1">Februari</option>
                                <option value="2">Maret</option>
                                <option value="3">April</option>
                                <option value="4">Mei</option>
                                <option value="5">Juni</option>
                                <option value="6">Juli</option>
                                <option value="7">Agustus</option>
                                <option value="8">September</option>
                                <option value="9">Oktober</option>
                                <option value="10">November</option>
                                <option value="11">Desember</option>
                            </select>
                        </div>
                        <canvas id="attendanceChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="text-center mb-4 mt-3">Perbandingan Anggota LCC dengan Bukan Anggota Prodi MI</h5>
                        <div class="d-flex justify-content-center mb-4">
                            <label for="level-filter" class="form-label me-2">Filter Tingkat:</label>
                            <select id="level-filter" class="form-select w-auto">
                                <option value="0">Tingkat I</option>
                                <option value="1">Tingkat II</option>
                                <option value="2">Tingkat III</option>
                            </select>
                        </div>
                        <canvas id="organizationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
@section('js_dashboard')
    {{-- Grafik Kehadiran --}}
    <script>
        const ctxAttendance = document.getElementById('attendanceChart').getContext('2d');

        const attendanceData = {
            Office: [100, 120, 110, 140, 130, 150, 160, 180, 170, 160, 190, 200],
            Design: [80, 90, 85, 100, 95, 105, 110, 120, 115, 110, 125, 130],
            Coding: [90, 100, 95, 110, 105, 115, 120, 130, 125, 120, 135, 140],
        };

        const attendanceChart = new Chart(ctxAttendance, {
            type: 'bar',
            data: {
                labels: ['Office', 'Design', 'Coding'],
                datasets: [{
                    label: 'Jumlah Kehadiran',
                    data: [attendanceData.Office[0], attendanceData.Design[0], attendanceData.Coding[0]],
                    backgroundColor: ['#007bff', '#28a745', '#dc3545'],
                    borderColor: ['#007bff', '#28a745', '#dc3545'],
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        document.getElementById('month-filter').addEventListener('change', function() {
            const monthIndex = this.value;
            attendanceChart.data.datasets[0].data = [
                attendanceData.Office[monthIndex],
                attendanceData.Design[monthIndex],
                attendanceData.Coding[monthIndex],
            ];
            attendanceChart.update();
        });
    </script>

    {{-- Grafik Total Anggota dan Bukan Anggota --}}
    <script>
        const ctxOrganization = document.getElementById('organizationChart').getContext('2d');

        const organizationData = {
            tingkatI: {
                anggota: 60,
                bukanAnggota: 40,
            },
            tingkatII: {
                anggota: 70,
                bukanAnggota: 30,
            },
            tingkatIII: {
                anggota: 80,
                bukanAnggota: 20,
            },
        };

        const organizationChart = new Chart(ctxOrganization, {
            type: 'pie',
            data: {
                labels: ['Anggota Organisasi', 'Bukan Anggota'],
                datasets: [{
                    label: 'Kehadiran',
                    data: [organizationData.tingkatI.anggota, organizationData.tingkatI.bukanAnggota],
                    backgroundColor: ['#007bff', '#ffc107'],
                    borderColor: ['#007bff', '#ffc107'],
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
    </script>
@endsection
