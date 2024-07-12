@can('Admin')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'dashboard' ? 'bg-primary text-white' : '' }}"
                    href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill
            {{ $title === 'prodi' ? 'bg-primary text-white' : '' }}
            {{ $title === 'kelas' ? 'bg-primary text-white' : '' }}
            {{ $title === 'mahasiswa' ? 'bg-primary text-white' : '' }}
            {{ $title === 'kegiatan' ? 'bg-primary text-white' : '' }}
             {{ $title === 'jadwal' ? 'bg-primary text-white' : '' }}"
                    data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-database-fill-gear mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1" />
                        <path
                            d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905m3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                    </svg>
                    <span>Master Data</span><i
                        class="bi bi-chevron-down ms-auto
                {{ $title === 'prodi' ? 'text-white' : '' }}
                {{ $title === 'kelas' ? 'text-white' : '' }}
                {{ $title === 'mahasiswa' ? 'text-white' : '' }}
                {{ $title === 'kegiatan' ? 'text-white' : '' }}
                {{ $title === 'jadwal' ? 'text-white' : '' }}"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav"
                    style="display: {{ Request::is('prodi*', 'kelas*', 'mahasiswa*', 'kegiatan*', 'jadwal*') ? 'block' : '' }}">
                    <li class="{{ Request::is('prodi*') ? 'active' : '' }}">
                        <a href="/prodi" class="{{ $title === 'prodi' ? 'text-danger' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Prodi</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('kelas*') ? 'active' : '' }}">
                        <a href="/kelas" class="{{ $title === 'kelas' ? 'text-danger' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Kelas</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Data Asal Sekolah</span>
                        </a>
                    </li> --}}
                    <li class="{{ Request::is('mahasiswa*') ? 'active' : '' }}">
                        <a href="/mahasiswa" class="{{ $title === 'mahasiswa' ? 'text-danger' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Mahasiswa</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('kegiatan*') ? 'active' : '' }}">
                        <a href="/kegiatan" class="{{ $title === 'kegiatan' ? 'text-danger' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Kegiatan</span>
                        </a>
                    </li>
                    {{-- <li class="{{ Request::is('jadwal*') ? 'active' : '' }}">
                        <a href="/jadwal" class="{{ $title === 'jadwal' ? 'text-primary' : '' }}">
                            <i class="bi bi-circle"></i><span>Jadwal Mahasiswa</span>
                        </a>
                    </li> --}}
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'anggotalcc' ? 'bg-primary text-white' : '' }}"
                    href="/anggotalcc">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-mortarboard-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                    </svg>
                    <span>Anggota LCC</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'kehadiran' ? 'bg-primary text-white' : '' }}"
                    href="/kehadiran">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-clipboard2-data-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                        <path
                            d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                    </svg>
                    <span>Kehadiran</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'laporan' ? 'bg-primary text-white' : '' }}"
                    href="/laporan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-file-earmark-pdf-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                        <path fill-rule="evenodd"
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                    </svg>
                    <span>Laporan</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'profile' ? 'bg-primary text-white' : '' }}"
                    href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->

    {{-- <div class="header-mobile">
        <div class="d-flex">
            <img src="/img_logo/LogoLCC.png" width="70px">
            <p class="fs-4 mt-2 fw-bold">E-Presence LCC</p>
        </div>
        <p style="margin-left: 70px; margin-top: -32px">Administrator</p>
        <div class="border mx-3"></div>
    </div> --}}

    {{-- id="footer-mobile" --}}
    {{-- <div class="navigation text-center">
        <ul class="mb-5" style="margin-right: 60px">
            <li class="list">
                <a href="/dashboard"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'dashboard' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-house-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'dashboard' ? 'text-dark' : 'text-white' }}">Dashboard</span>
                </a>
            </li>
            <li class="list">
                <a href="/prodi"
                    class="py-3 rounded-circle navigation-hover
                    {{ $title === 'prodi' ? 'bg-primary text-white' : 'mt-4' }}
                    {{ $title === 'kelas' ? 'bg-primary text-white' : 'mt-4' }}
                    {{ $title === 'mahasiswa' ? 'bg-primary text-white' : 'mt-4' }}
                    {{ $title === 'jadwal' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-database-fill-gear"></i></span>
                </a>
            </li>
            <li class="list">
                <a href="/kehadiran"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'kehadiran' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-clipboard2-data-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'kehadiran' ? 'text-dark' : 'text-white' }}">Kehadiran</span>
                </a>
            </li>
            <li class="list">
                <a href="/laporan"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'laporan' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'laporan' ? 'text-dark' : 'text-white' }}">Cetak</span>
                </a>
            </li>
            <li class="list">
                <a href="profile"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'profile' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-person-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'profile' ? 'text-dark' : 'text-white' }}">Profile</span>
                </a>
            </li>
        </ul>
    </div> --}}
@endcan

@can('Petugas')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'dashboard' ? 'bg-primary text-white' : '' }}"
                    href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'anggotalcc' ? 'bg-primary text-white' : '' }}"
                    href="/anggotalcc">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-mortarboard-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                    </svg>
                    <span>Anggota LCC</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'kehadiran' ? 'bg-primary text-white' : '' }}"
                    href="/kehadiran">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-clipboard2-data-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                        <path
                            d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                    </svg>
                    <span>Kehadiran</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'laporan' ? 'bg-primary text-white' : '' }}"
                    href="/laporan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-file-earmark-pdf-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                        <path fill-rule="evenodd"
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                    </svg>
                    <span>Laporan</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'profile' ? 'bg-primary text-white' : '' }}"
                    href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->

    {{-- <div class="navigation text-center">
        <ul class="mb-5" style="margin-right: 10px">
            <li class="list">
                <a href="/dashboard"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'dashboard' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-house-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'dashboard' ? 'text-dark' : 'text-white' }}">Dashboard</span>
                </a>
            </li>
            <li class="list">
                <a href="/kehadiran"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'kehadiran' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-clipboard2-data-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'kehadiran' ? 'text-dark' : 'text-white' }}">Kehadiran</span>
                </a>
            </li>
            <li class="list">
                <a href="/laporan"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'laporan' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'laporan' ? 'text-dark' : 'text-white' }}">Cetak</span>
                </a>
            </li>
            <li class="list">
                <a href="profile"
                    class="py-3 rounded-circle navigation-hover {{ $title === 'profile' ? 'bg-primary text-white' : 'mt-4' }}">
                    <span class="icon"><i class="bi bi-person-fill"></i></span>
                    <span class="text fw-bold {{ $title === 'profile' ? 'text-dark' : 'text-white' }}">Profile</span>
                </a>
            </li>
        </ul>
    </div> --}}
@endcan

@can('Viewer')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'dashboard' ? 'bg-primary text-white' : '' }}"
                    href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'anggotalcc' ? 'bg-primary text-white' : '' }}"
                    href="/anggotalcc">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-mortarboard-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                    </svg>
                    <span>Anggota LCC</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'kehadiran' ? 'bg-primary text-white' : '' }}"
                    href="/kehadiran">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-clipboard2-data-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                        <path
                            d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                    </svg>
                    <span>Kehadiran</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'laporan' ? 'bg-primary text-white' : '' }}"
                    href="/laporan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-file-earmark-pdf-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                        <path fill-rule="evenodd"
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                    </svg>
                    <span>Laporan</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'profile' ? 'bg-primary text-white' : '' }}"
                    href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->
@endcan

@can('Mahasiswa')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'profile' ? 'bg-primary text-white' : '' }}"
                    href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-person-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                    </svg>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'dashboard' ? 'bg-primary text-white' : '' }}"
                    href="/dashboard">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-house-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'anggotalcc' ? 'bg-primary text-white' : '' }}"
                    href="/anggotalcc">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-mortarboard-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                        <path
                            d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z" />
                    </svg>
                    <span>Anggota LCC</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'kehadiran' ? 'bg-primary text-white' : '' }}"
                    href="/kehadiran">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-clipboard2-data-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                        <path
                            d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                    </svg>
                    <span>Kehadiran</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed rounded-pill {{ $title === 'laporan' ? 'bg-primary text-white' : '' }}"
                    href="/laporan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-file-earmark-pdf-fill mb-1 me-2" viewBox="0 0 16 16">
                        <path
                            d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                        <path fill-rule="evenodd"
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                    </svg>
                    <span>Laporan</span>
                </a>
            </li><!-- End Contact Page Nav -->

        </ul>

    </aside>
    <!-- End Sidebar-->
@endcan
