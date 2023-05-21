<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sentra HKI</title>
        <link rel="stylesheet" href="{{ asset('web/general.css') }}">
        <link rel="icon shortcut" href="{{ asset('web/logo.jpeg') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-dark gradient fixed-top" id="navbar-atas">
                <div class="container-fluid">
                    <span class="navbar-brand">
                        <img src="{{ asset('web/logo.jpeg') }}" class="rounded-5" alt="" width="auto" height="38">
                    </span>
                    <div class="dropdown">
                        <img src="https://learning-if.polibatam.ac.id/theme/image.php/moove/core/1675225508/u/f2" alt="" class="rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                        <ul class="dropdown-menu dropdown-menu-end animate slideIn">
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <i class="fa-regular fa-user"></i> SuperAdmin
                                </a>
                            </li>
                            <hr>
                            <li class="nav-item">
                                <a class="dropdown-item" href="/logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="img-fluid container-fluid text-white">
                <div class="row">
                    <div class="col-md-5 col-lg-4 text-center text-md-start">
                        <a href="/dashboard" class="h1 text-decoration-none text-white">Sentra HKI</a>
                        <p class="fs-6">merupakan unit kerja yang bertujuan untuk mengelola dan mendaya gunakan kekayaan intelektual, sekaligus sebagai pusat informasi dan pelayanan HKI yang dimana merujuk kepada hak - hak hukum, seperti hak cipta, hak paten, merek dagang, rahasia dagang, dan sebagainya</p>
                    </div>
                </div>
            </div>
            <nav id="navbar-example2" class="navbar navbar-expand-lg navbar-dark gradient">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header gradient">
                            <h5 class="offcanvas-title text-light" id="offcanvasDarkNavbarLabel">Sentra HKI</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body gradient">
                            <ul class="nav-pills navbar-nav">
                                <li class="nav-item me-lg-3 mb-2 mb-sm-0">
                                    <a class="nav-link" href="/tambah-akun"><i class="fa-solid fa-user-plus"></i> Tambah Akun</a>
                                </li>
                                <li class="nav-item me-lg-3 mb-2 mb-sm-0">
                                    <a class="nav-link" href="/kelola-akun"><i class="fa-solid fa-user-pen"></i> Kelola Akun</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid wht">
            <div class="row px-2 py-2">
                <div class="col-12">
                    <h1 class="h1">@yield('title')</h1>
                </div>
            </div>
        </div>
        <main class="content py-5 px-lg-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        @include('component.footer')
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('web/general.js') }}"></script>

    </body>

</html>
