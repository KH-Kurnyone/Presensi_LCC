<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - E-Presence LCC</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img_logo/LogoLCC.png" rel="icon">
    <link href="/img_logo/LogoLCC.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assetsadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assetsadmin/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assetsadmin/css/style.css" rel="stylesheet">
    {{-- Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins' !important;
        }

        .toast {
            background-color: #ffffff !important;
            opacity: 1 !important;
            z-index: 9999 !important;
        }

        .toast-success {
            background-color: #51a351 !important;
            width: 350px !important;
        }

        .toast-error {
            background-color: #bd362f !important;
        }

        .toast-warning {
            background-color: #f89406 !important;
        }

        .toast-info {
            background-color: #2f96b4 !important;
            width: 400px !important;
        }

        @media screen and (max-width: 930px) {
            .toast {
                background-color: #ffffff !important;
                opacity: 1 !important;
                z-index: 9999 !important;
            }

            .toast-success {
                background-color: #51a351 !important;
                font-size: 12px !important;
                width: 300px !important;
            }

            .toast-error {
                background-color: #bd362f !important;
                font-size: 12px !important;
                width: 300px !important;
            }

            .toast-warning {
                background-color: #f89406 !important;
                font-size: 12px !important;
                width: 300px !important;
            }

            .toast-info {
                background-color: #2f96b4 !important;
                width: 300px !important;
                font-size: 12px !important;
            }
        }
    </style>

</head>

<body id="content" class="bg-white">
    {{-- <div id="loading" class="loading">
        <div class="spinner"></div>
    </div> --}}
    <!-- ======= Header ======= -->
    {{-- <img src="/assetsadmin/img/logo.png" alt=""> --}}
    {{-- <div class="header-dekstop"> --}}
    <header id="header" class="header fixed-top d-flex align-items-center"
        style="padding: 40px 20px 40px 20px !important;">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
                <img class="logo-dekstop logo-size-mobile" src="/img_logo/logo-lp3i-putih.png" alt="" />
                <img class="logo-mobile logo-size-dekstop" src="/img_logo/logo-lp3i-putih.png" alt="" />
                {{-- <span class="d-none d-lg-block text-white fs-4 ms-2">LP3I Tasikmalaya</span> --}}
            </a>
            <i class="bi bi-list toggle-sidebar-btn text-white"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="/img_logo/LogoLCC.png" alt="Profile" class="rounded-circle">
                        @can('Admin')
                            <span class="d-none d-md-block dropdown-toggle text-white fs-6">LCC -
                                {{ Auth()->user()->username }}</span>
                        @endcan
                        @can('Petugas')
                            <span class="d-none d-md-block dropdown-toggle text-white fs-6">LCC -
                                {{ Auth()->user()->username }}</span>
                        @endcan
                        @can('Viewer')
                            <span class="d-none d-md-block dropdown-toggle text-white fs-6">LCC -
                                {{ Auth()->user()->username }}</span>
                        @endcan
                        @can('Mahasiswa')
                            <span class="d-none d-md-block dropdown-toggle text-white fs-6">LCC -
                                {{ Auth()->user()->mahasiswa->nama }}</span>
                        @endcan
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            @can('Admin')
                                <h6>LCC - {{ Auth()->user()->username }}</h6>
                            @endcan
                            @can('Petugas')
                                <h6>LCC - {{ Auth()->user()->username }}</h6>
                            @endcan
                            @can('Viewer')
                                <h6>LCC - {{ Auth()->user()->username }}</h6>
                            @endcan
                            @can('Mahasiswa')
                                <h6>LCC - {{ Auth()->user()->mahasiswa->nama }}</h6>
                            @endcan
                            <span>LP3I Computer Club</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="bi bi-person"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @can('Admin')
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="/profile/ubahpassword">
                                    <i class="bi bi-gear"></i>
                                    <span>Ubah Password</span>
                                </a>
                            </li>
                        @endcan
                        @can('Petugas')
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="/profile/ubahpassword">
                                    <i class="bi bi-gear"></i>
                                    <span>Ubah Password</span>
                                </a>
                            </li>
                        @endcan
                        @can('Mahasiswa')
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="/profile/ubahpassword">
                                    <i class="bi bi-gear"></i>
                                    <span>Ubah Password</span>
                                </a>
                            </li>
                        @endcan
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <button class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
                                data-bs-target="#logout">
                                <i class="bi bi-box-arrow-right"></i>Log Out
                            </button>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </header>
    {{-- </div> --}}

    {{-- Sidebar --}}
    @include('partials.sidebar')

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
    <main id="main" class="main" style="background-color: #fff; margin-top: 85px">

        @yield('content')
        {{-- Modal Log Out --}}
        <div class="modal fade" id="logout" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" style="color: #9C0000"><i class="bi bi-info-circle"></i>
                            Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/logoutwebsite" method="POST">
                            @csrf
                            <p class="text-center fw-bold">Keluar Dari Website E-Presence LCC?</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-login text-white mx-3 mt-3"
                                    style="padding: 10px 50px 10px 50px">Ya,
                                    Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal Log Out --}}
    </main><!-- End #main -->

    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a> --}}

    {{-- <script>
        const list = document.querySelectorAll('.list');

        function activelink() {
            list.forEach((item) =>
                item.classList.remove('active'));
            this.classList.add('active');
        }
        list.forEach((item) =>
            item.addEventListener('click', activeLink));
    </script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @yield('js_input')
    @yield('js_scaner')
    @yield('js_editTingkat')
    @yield('js_editStatus')
    @yield('js_editStatus_kehadiran')
    @yield('js_mahasiswaAdd')
    @yield('js_mahasiswaEdit')
    @yield('js_dashboard')
    @yield('profile')
    {{-- @yield('js_sesi') --}}

    <script>
        $(function(e) {

            $("#select_all_ids").click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('#deleteAllSelectRecord').click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());
                });

                $.ajax({
                    url: "{{ route('siswa_ids.delete') }}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $.each(all_ids, function(key, val) {
                            $('#siswa_ids' + val).remove();
                        });
                        location.reload();
                    }
                });
            });
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="/assetsadmin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assetsadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assetsadmin/vendor/chart.js/chart.umd.js"></script>
    <script src="/assetsadmin/vendor/echarts/echarts.min.js"></script>
    <script src="/assetsadmin/vendor/quill/quill.min.js"></script>
    <script src="/assetsadmin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assetsadmin/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assetsadmin/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assetsadmin/js/main.js"></script>

    <script>
        window.addEventListener('load', function() {
            const loading = document.getElementById('loading');
            const content = document.getElementById('content');

            loading.style.display = 'none';
            content.style.display = 'block';
        });
    </script>

    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @if (Session::has('login'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }
            toastr.info("{{ Session::get('login') }}", 'Login Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('editTingkat'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }
            toastr.success("{{ Session::get('editTingkat') }}", 'Informasi', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('editStatus'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }
            toastr.success("{{ Session::get('editStatus') }}", 'Informasi', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('laporan'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }
            toastr.warning("{{ Session::get('laporan') }}", 'Tidak Ditemukan!', {
                timeOut: 3000
            });
        </script>
    @endif

    @if (Session::has('prodiadd') || Session::has('prodiedit') || Session::has('prodidelete'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('prodiadd'))
                messages += "{{ Session::get('prodiadd') }} ";
            @endif

            @if (Session::has('prodiedit'))
                messages += "{{ Session::get('prodiedit') }} ";
            @endif

            @if (Session::has('prodidelete'))
                messages += "{{ Session::get('prodidelete') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('kelasadd') || Session::has('kelasedit') || Session::has('kelasdelete'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('kelasadd'))
                messages += "{{ Session::get('kelasadd') }} ";
            @endif

            @if (Session::has('kelasedit'))
                messages += "{{ Session::get('kelasedit') }} ";
            @endif

            @if (Session::has('kelasdelete'))
                messages += "{{ Session::get('kelasdelete') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('mahasiswaadd') ||
            Session::has('mahasiswaedit') ||
            Session::has('mahasiswadelete') ||
            Session::has('mahasiswaimport') ||
            Session::has('mahasiswadeleteall'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('mahasiswaadd'))
                messages += "{{ Session::get('mahasiswaadd') }} ";
            @endif

            @if (Session::has('mahasiswaedit'))
                messages += "{{ Session::get('mahasiswaedit') }} ";
            @endif

            @if (Session::has('mahasiswadelete'))
                messages += "{{ Session::get('mahasiswadelete') }} ";
            @endif

            @if (Session::has('mahasiswaimport'))
                messages += "{{ Session::get('mahasiswaimport') }} ";
            @endif

            @if (Session::has('mahasiswadeleteall'))
                messages += "{{ Session::get('mahasiswadeleteall') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('jabatanAdd') || Session::has('jabatanEdit') || Session::has('jabatanDelete'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('jabatanAdd'))
                messages += "{{ Session::get('jabatanAdd') }} ";
            @endif

            @if (Session::has('jabatanEdit'))
                messages += "{{ Session::get('jabatanEdit') }} ";
            @endif

            @if (Session::has('jabatanDelete'))
                messages += "{{ Session::get('jabatanDelete') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('kegiatanadd') || Session::has('kegiatanedit') || Session::has('kegiatandelete'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('kegiatanadd'))
                messages += "{{ Session::get('kegiatanadd') }} ";
            @endif

            @if (Session::has('kegiatanedit'))
                messages += "{{ Session::get('kegiatanedit') }} ";
            @endif

            @if (Session::has('kegiatandelete'))
                messages += "{{ Session::get('kegiatandelete') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('sesiAdd') || Session::has('sesiEdit') || Session::has('sesiDelete'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('sesiAdd'))
                messages += "{{ Session::get('sesiAdd') }} ";
            @endif

            @if (Session::has('sesiEdit'))
                messages += "{{ Session::get('sesiEdit') }} ";
            @endif

            @if (Session::has('sesiDelete'))
                messages += "{{ Session::get('sesiDelete') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @if (Session::has('kehadiranadd') || Session::has('kehadiranedit') || Session::has('kehadirandelete'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right",
            }

            let messages = '';

            @if (Session::has('kehadiranadd'))
                messages += "{{ Session::get('kehadiranadd') }} ";
            @endif

            @if (Session::has('kehadiranedit'))
                messages += "{{ Session::get('kehadiranedit') }} ";
            @endif

            @if (Session::has('kehadirandelete'))
                messages += "{{ Session::get('kehadirandelete') }} ";
            @endif

            toastr.success(messages.trim(), 'Berhasil!', {
                timeOut: 1000
            });
        </script>
    @endif

    @yield('js_modal')

</body>

</html>
