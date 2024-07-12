<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Presence LCC - Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Icon Desa -->
    <link href="img_logo/LogoLCC.png" rel="icon">
    <link href="img_logo/LogoLCC.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="login/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins' !important;
            /* scale: 0.9; */
            overflow: hidden;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .wrap {
            display: flex;
            width: 100%;
            max-width: 900px;
        }

        .login-wrap {
            flex: 1;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div id="loading" class="loading">
        <!-- Bisa menggunakan GIF atau CSS untuk animasi -->
        <div class="spinner"></div>
    </div>
    <section class="ftco-section">
        <div class="container margin-mobile">
            <div class="wrap">
                <div class="img bg-login-mobile" style="background-image: url(login/images/bg.jpg)"></div>
                <div class="login-wrap p-4 p-md-5">
                    <a href="/" style="position: absolute; margin-top: -20px; color:#9C0000;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                    </a>
                    <div class="d-flex">
                        <div class="w-100 text-center mt-4">
                            <img src="img_logo/LogoLCC.png" alt="LogoLCC" width="150px" style="margin-top: -50px">
                            <h2 style="font-weight: bolder; color:#9C0000;">E-Presence LCC</h2>
                            <h5 class="mb-4" style="margin-top: -10px">Politeknik LP3I Tasikmalaya</h5>
                        </div>
                    </div>
                    <form action="/loginwebsite" method="POST" class="signin-form">
                        @csrf
                        @include('sweetalert::alert')
                        <div class="form-group mb-2">
                            <label class="text-dark" for="name">Username</label>
                            <input type="text"
                                class="form-control rounded-pill border-secondary @error('username') is-invalid @enderror"
                                placeholder="Username" name="username" autocomplete="off" tabindex="1" />
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-dark" for="password">Password</label>
                            <div class="input-password">
                                <input type="password"
                                    class="form-control rounded-pill border-secondary @error('password') is-invalid @enderror"
                                    placeholder="Password" name="password" autocomplete="off" id="password"
                                    tabindex="2" />
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <button class="btn btn-view" type="button" id="togglePassword">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="submit"
                            class="form-control btn-login rounded-pill submit px-3 text-white text-center"
                            tabindex="3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="login/js/jquery.min.js"></script>
    <script src="login/js/popper.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $(document).on('click', 'loginerror', function(e) {
                e.preventDefault();
                var link = $(this).attr("submit");

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });

            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordButton = document.getElementById('togglePassword');

            togglePasswordButton.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });
        });
    </script>
    <script>
        window.addEventListener('load', function() {
            const loading = document.getElementById('loading');
            const content = document.getElementById('content');

            loading.style.display = 'none';
            content.style.display = 'block';
        });
    </script>
    <script>
        let active_view = document.getElementById('togglePassword');
        active_view.addEventListener('click', function() {
            active_view.classList.toggle('active-view');
        });
    </script>
</body>

</html>
