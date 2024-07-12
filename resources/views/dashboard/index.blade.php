@extends('master.indexadmin')
<title>Dashboard - E-Presence LCC</title>
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

        <div class="row">
            <div class="col-lg-6">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card info-card sales-card ">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark">Mahasiswa <span class="text-secondary">| Tingkat
                                1</span>
                        </h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: #9C0000">
                                <i class="bi bi-mortarboard-fill text-white"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="text-dark">{{ $datamahasiswa }}</h6> <span
                                    class="text-muted small pt-2 ps-1">Total
                                    Data</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Mahasiswa Card -->

                <!-- Anggota LCC Card -->
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card info-card sales-card ">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark">Anggota LCC <span class="text-secondary">| Tingkat
                                1</span>
                        </h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: #9C0000">
                                <i class="bi bi-person-vcard-fill text-white"></i>
                            </div>
                            <div class="ps-3">
                                <h6 class="text-dark">{{ $datalcc }}</h6> <span
                                    class="text-muted small pt-2 ps-1">Total
                                    Data</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Anggota LCC Card -->
            </div>

            <div class="col-lg-6">
                <div class="card-header bg-primary" style="padding: 2px"></div>
                <div class="card">
                    <div class="card-body mb-1">
                        <h5 class="card-title fw-bold text-dark">Data Kelas <span class="text-secondary">| Tingkat 1</span>
                        </h5>
                        <div class="activity">
                            @foreach ($datakelas as $item)
                                <div class="activity-item d-flex mt-2">
                                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start me-2'></i>
                                    <h5 class="text-dark fw-bold">{{ $item->kelas }}</h5>
                                    <p class="activity-content fs-6">{{ $item->mahasiswa->where('tingkat', '1')->count() }}
                                        Mahasiswa</p>
                                </div>
                                <div class="border border-secondary" style="margin-top: -25px"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagetitle">
            <h5 class="text-dark fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    fill="currentColor" class="bi bi-mortarboard-fill mb-2" viewBox="0 0 16 16">
                    <path
                        d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                    <path
                        d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                </svg> Anggota LCC Setiap Kelas <span class="text-secondary">| Tingkat 1</span></h5>
        </div>
        <div class="row">
            @foreach ($datakelas as $item)
                <div class="col-lg-4">
                    <div class="card-header bg-primary" style="padding: 2px"></div>
                    <div class="card info-card sales-card ">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-dark">Anggota LCC {{ $item->kelas }}</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: #9C0000">
                                    <i class="bi bi-person-vcard-fill text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class="text-dark">
                                        {{ $item->mahasiswa->where('status_ukm', 'Anggota LCC')->where('tingkat', '1')->count() }}
                                    </h6> <span class="text-muted small pt-2 ps-1">Total
                                        Data</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
@endsection
