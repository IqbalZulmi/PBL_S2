<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sentra HKI</title>
        <link rel="icon shortcut" href="{{ asset('web/logo.jpeg') }} ">
        <link rel="stylesheet" href="{{ asset('web/general.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <style>
            :root{
                scroll-behavior: smooth;
            }
            .landing{
                background-image: url("{{ asset('web/waves-bg.svg') }}");
                background-size: cover;
                background-repeat: no-repeat;
                min-height: 100vh;
            }
        </style>
    </head>

<body>
    <nav class="navbar navbar-dark wave-color sticky-top roboto">
        <div class="container">
            <span class="navbar-brand mx-md-0 mx-auto">
                <img src="{{ asset('web/logo.jpeg') }}" class="rounded-circle" alt="" width="auto" height="35"> Sentra HKI
            </span>
        </div>
    </nav>
    <section class="landing header finisher-header roboto d-flex justify-content-center align-items-center">
        <div class="container test">
            <div class="row">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center order-2 order-md-1">
                    <div data-aos="fade-up" data-aos-duration="1000">
                        <h1 class="fw-bold sizing">Sentra HKI Polibatam</h1>
                        <p class="sizing1">Sentra HKI merupakan unit kerja yang bertujuan untuk mengelola dan mendaya gunakan kekayaan intelektual, sekaligus sebagai pusat informasi dan pelayanan HKI yang dimana merujuk kepada hak - hak hukum, seperti hak cipta, hak paten, merek dagang, rahasia dagang, dan sebagainya.</p>
                        <span>
                            <a href="/login" class="btn btn-outline-primary land @auth d-none @endauth">Login</a>
                        </span>
                        <span class="ms-1">
                            <a href="/home" class="btn btn-outline-primary land">Lihat Informasi lebih lanjut</a>
                        </span>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center order-1 order-md-2">
                    <div class="image-fluid text-center pt-2" data-aos="fade-down" data-aos-duration="1000">
                        <i class="fa-sharp fa-regular fa-copyright"></i>
                        <h1 class="pt-1">COPYRIGHT</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer roboto">
        <div class="container-fluid">
            <div class="row text-white px-3 py-4">
                <div class="col-12 text-center text-lg-start" data-aos="fade-right" data-aos-duration="500">
                    <img class="image-fluid" width="auto" height="100" src="http://www.polibatam.ac.id/wp-content/uploads/2022/02/Logo-Polibatam-white-300x273-1.png">
                    <span class="h1 fw-bold pt-5">Sentra HKI</span>
                    <p class="mt-2"><strong>Alamat</strong> : Jl. Ahmad Yani Batam Kota. Kota Batam. kepulauan Riau. Indonesia</p>
                    <hr class="border-dark">
                </div>
                <div class="col-md-8" data-aos="fade-up" data-aos-duration="500">
                    <p class="fs-6">Sentra HKI merupakan unit kerja yang bertujuan untuk mengelola dan mendaya gunakan kekayaan intelektual, sekaligus sebagai pusat informasi dan pelayanan HKI yang dimana merujuk kepada hak - hak hukum, seperti hak cipta, hak paten, merek dagang, rahasia dagang, dan sebagainya.</p>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-start align-items-md-center" data-aos="fade-up" data-aos-duration="500">
                    <p class="fs-4">Contact</p>
                    <div class="d-flex flex-column justify-content-start">
                        <p class="fs-6">Phone : +62-778-469858 Ext.1017</p>
                        <p class="fs-6">Fax : +62-778-463620</p>
                        <p class="fs-6">Email : info@polibatam.ac.id</p>
                    </div>
                </div>
            </div>
            <div class="row px-3 text-white">
                <hr class="border border-1 border-dark">
                <p><small>©2023 Politeknik Negeri Batam. All Rights Reserved.</small></p>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('web/finisher-header.es5.min.js') }}" type="text/javascript"></script>
    <script type = "text/javascript">
        new FinisherHeader({
            "count": 60,
            "size": {
                "min": 2,
                "max": 8,
                "pulse": 0.1
            },
            "speed": {
                "x": {
                    "min": 0,
                    "max": 0.4
                },
                "y": {
                    "min": 0,
                    "max": 0.6
                }
            },
            "colors": {
                "background": "#0a2735",
                "particles": [
                    "#fbfcca",
                    "#c6ecff",
                    "#ffd0a7"
                ]
            },
            "blending": "overlay",
            "opacity": {
                "center": 1,
                "edge": 0.05
            },
            "skew": 0,
            "shapes": [
                "c"
            ]
        });
    </script>
</body>
</html>
