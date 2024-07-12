<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>E-Presence LCC</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="img_logo/LogoLCC.png" rel="icon" />
    <link href="img_logo/LogoLCC.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assetsindex/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assetsindex/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assetsindex/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assetsindex/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assetsindex/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assetsindex/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assetsindex/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins' !important;
        }
    </style>
</head>

<body id="content">
    <div id="loading" class="loading">
        <!-- Bisa menggunakan GIF atau CSS untuk animasi -->
        <div class="spinner"></div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top mt-3 " data-aos="fade-in" data-aos-delay="200">
        <div class="container-fluid container-xl d-flex align-items-center">
            <a href="/" class="logo d-flex align-items-center offset-lg-1">
                <img class="logo-size-mobile" src="img_logo/logo-lp3i-putih.png" alt="" />
                {{-- <img class="logo-mobile logo-size-dekstop" src="img_logo/logo-lp3i-putih.png" alt="" /> --}}
                {{-- <span class="text-judul-mobile text-white">LP3I Tasikmalaya</span> --}}
            </a>

            {{-- <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#" data-bs-toggle="modal"
                            data-bs-target="#deskripsi">Tentang Website</a></li>
                    <li><a class="nav-link scrollto" href="#" data-bs-toggle="modal"
                            data-bs-target="#dataKeanggotaan">Struktur Organisasi</a></li>
                    <li><a class="nav-link scrollto" href="#" data-bs-toggle="modal"
                            data-bs-target="#fiturWebsite">Kegiatan</a></li>
                </ul>
                <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i
                        class="bi bi-list mobile-nav-toggle fs-1 text-white"></i></a>
            </nav> --}}
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <div class="offcanvas offcanvas-top" style="height: 300px" tabindex="-1" id="offcanvasTop"
        aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" style="color: #9C0000" id="offcanvasTopLabel">Main Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="form-control text-secondary my-2" href="/">Beranda</a>
            <a class="form-control text-secondary my-2" data-bs-toggle="modal" data-bs-target="#deskripsi">Tentang
                Website</a>
            <a class="form-control text-secondary my-2" data-bs-toggle="modal"
                data-bs-target="#dataKeanggotaan">Struktur Organisasi</a>
            <a class="form-control text-secondary my-2" data-bs-toggle="modal"
                data-bs-target="#fiturWebsite">Kegiatan</a>
        </div>
    </div>

    <!-- Modal Deskripsi-->
    <div class="modal fade" id="deskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Deskripsi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ======= About Section ======= -->
                    <div data-aos="fade-up">
                        <div class="row p-3">
                            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                <h4 class="fw-bold text-primary">Tentang Website <br>E-Presence LCC</h4>
                                <small>
                                    E-Presence LCC adalah aplikasi inovatif yang dirancang khusus untuk
                                    memberikan solusi cerdas dalam manajemen absensi. Aplikasi ini membawa
                                    revolusi dalam pencatatan kehadiran, memberikan kemudahan, efisiensi, dan
                                    akurasi
                                    dalam pengelolaan waktu atau peserta.
                                </small>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                                <img src="assetsindex/img/features-3.png" class="img-fluid" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- End About Section -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Data Keanggotaan-->
    <div class="modal fade" id="dataKeanggotaan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Data Keanggotaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ..
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Fitur Website-->
    <div class="modal fade" id="fiturWebsite" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Fitur Website</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ======= Features Section ======= -->
                    <section id="features" class="features" style="margin-top: -5%">
                        <div data-aos="fade-up">
                            <header class="section-header">
                                <h2>Fitur Website E-Presence LCC</h2>
                                <p style="font-size: 20px !important;">Beberapa Layanan dan Fitur <br> Dari Website
                                    Ini.</p>
                            </header>
                            <div class="row mx-">
                                <div class="col-lg-6">
                                    <img src="assetsindex/img/features.png" width="100%" alt="" />
                                </div>
                                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                                    <div class="row align-self-center gy-4">
                                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                            <div class="feature-box d-flex align-items-center">
                                                <i class="bi bi-check"></i>
                                                <h3>Fitur Keamanan Login</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                            <div class="feature-box d-flex align-items-center">
                                                <i class="bi bi-check"></i>
                                                <h3>Data Mahasiswa Per-Prodi/Kelas</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                            <div class="feature-box d-flex align-items-center">
                                                <i class="bi bi-check"></i>
                                                <h3>Data Anggota LCC</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                            <div class="feature-box d-flex align-items-center">
                                                <i class="bi bi-check"></i>
                                                <h3>Rekap Absensi Kehadiran</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                                            <div class="feature-box d-flex align-items-center">
                                                <i class="bi bi-check"></i>
                                                <h3>Sortir Data Kehadiran</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                            <div class="feature-box d-flex align-items-center">
                                                <i class="bi bi-check"></i>
                                                <h3>Laporan Kehadiran Per-Bulan/Semester</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Features Section -->
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center justify-content-center">
        <div class="container mt-lg-5">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 d-flex flex-column justify-content-center">
                    <h1 class="text-white" data-aos="fade-up">
                        Selamat datang di <br />
                        E-Presence LCC
                    </h1>
                    <h2 class="hero-text-mobile text-white" data-aos="fade-up" data-aos-delay="400">Platform inovatif
                        untuk
                        manajemen absensi yang
                        terpercaya.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="/Login_E_Presence_LCC"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center"
                                tabindex="2">
                                <span>Login</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="img_logo/LogoLCC.png" class="img-fluid logo-lcc-mobile" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    {{-- <main id="main">

      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
          <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-grid"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $dataprodi }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Prodi</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-mortarboard-fill" style="color: #ee6c20"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $datamahasiswa }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Mahasiswa</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-person-lines-fill" style="color: #15be56"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $dataprodimi }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Mahasiswa Prodi MI</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-person-vcard-fill" style="color: #bb0852"></i>
                <div>
                  <span data-purecounter-start="0" data-purecounter-end="{{ $datalcc }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Total Anggota LCC</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Counts Section -->

      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Fitur Website E-Presence LCC</h2>
            <p>Beberapa Layanan dan Fitur Dari Website Ini.</p>
          </header>

          <div class="row">
            <div class="col-lg-6">
              <img src="assetsindex/img/features.png" class="img-fluid" alt="" />
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
              <div class="row align-self-center gy-4">
                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Fitur Keamanan Login</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Data Mahasiswa Per-Prodi/Kelas</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Data Anggota LCC</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Rekap Absensi Kehadiran</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Sortir Data Kehadiran</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Laporan Kehadiran Per-Bulan/Semester</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Features Section -->

      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Other Organizations</h2>
            <p>Organisasi Lainnya di LP3I Tasikmalaya</p>
          </header>

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><img src="img_logo/LogoBEM.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoLCC.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoLMA.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoLSC.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoHMKP.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoHMP.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoLIAC.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoLOC.png" class="img-fluid" alt="" /></div>
              <div class="swiper-slide"><img src="img_logo/LogoSEAL.png" class="img-fluid" alt="" /></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- End Clients Section -->
    </main> --}}
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer" class="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="img_logo/LogoLCC.png" alt="" />
                <p class="fs-4 fw-bold" style="color: #012970">LP3I Computer Club </p>
              </a>
              <p>Platform inovatif untuk manajemen absensi yang terpercaya. #LP3ITasikmalaya #LCCTasikmalaya #BACOT</p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4>Tautan Website</h4>
              <ul>
                <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#about">Deskripsi</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#counts">Data Keanggotaan</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#features">Fitur Website</a></li>
              </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4>Organisasi Lain</h4>
              <ul>
                <li><i class="bi bi-chevron-right"></i> <a href="#">BEM</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">HIMA MKP</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">HIMA MP</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">UKM LIAC</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">UKM SEAL</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">UKM LCC</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">UKM LMA</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">UKM LOC</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">UKM LSC</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
              <h4>Detail Lainnya</h4>
              <p>
                Jl. Ir. H. Juanda Panglayungan, <br />
                Kec. Cipedes, Kab. Tasikmalaya,<br />
                Jawa Barat 46151 <br /><br />

                <strong>No. Telp:</strong>-<br />
                <strong>Email:</strong>-<br />
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer> --}}
    <!-- End Footer -->

    {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

    <!-- Vendor JS Files -->
    <script src="assetsindex/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assetsindex/vendor/aos/aos.js"></script>
    <script src="assetsindex/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assetsindex/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assetsindex/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assetsindex/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assetsindex/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assetsindex/js/main.js"></script>

    <script>
        window.addEventListener('load', function() {
            const loading = document.getElementById('loading');
            const content = document.getElementById('content');

            loading.style.display = 'none';
            content.style.display = 'block';
        });
    </script>
</body>

</html>
