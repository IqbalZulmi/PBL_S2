<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sentra HKI</title>
    <link rel="icon shortcut" href="{{ asset('web/logo.jpeg') }} ">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{  asset('assets_login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{  asset('assets_login/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{  asset('assets_login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('assets_login/css/main.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
    <!--===============================================================================================-->
    <style>
        .logo img {
            max-width: 70px;
            max-height: 70px;
        }
        .container-login100 {
        background-repeat: no-repeat;
        background-size: cover;
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('assets_login/images/bg/poltek1.jpg') }}');
        }
    </style>
</head>


<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('assets_login/images/bg/poltek1.jpg') }}');">
            <div class="wrap-login100">
                <div class="logo text-center">
                    <img src="{{ asset('web/logo.jpeg') }}" alt="Logo">
                </div>
                <form action="/reset-password" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-0">
                        FORGOT PASSWORD
                    </span>
                    <br>
                    <input type="text" name="token" hidden value="{{ $token }}">
                    <div class="wrap-input100 validate-input">
                        <input required class="@error('email') is-invalid @enderror input100" type="email" name="email" value="{{ old('email',$email) }}" autocomplete="email" readonly>
                        <span class="focus-input100" data-placeholder="Masukkan email anda"></span>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input required class="@error('password') is-invalid @enderror input100" value="{{ old('password') }}" type="password" name="password" autofocus autocomplete="password">
                        <span class="focus-input100" data-placeholder="Masukkan Password Baru"></span>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input">
                        <input required class="@error('password_confirmation') is-invalid @enderror input100" value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" autofocus autocomplete="password_confirmation">
                        <span class="focus-input100" data-placeholder="Masukkan Password Baru"></span>
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" name="submit" class="login100-form-btn">
                                reset password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{  asset('assets_login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{  asset('assets_login/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{  asset('assets_login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{  asset('assets_login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{  asset('assets_login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{  asset('assets_login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{  asset('assets_login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets_login/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{  asset('assets_login/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    @if (session('notifikasi'))
    <script>
        Swal.fire({
            text: '{{ session('notifikasi') }}',
            icon: '{{ session('type') }}',
            confirmButtonText:'OK',
            showCloseButton: true,
        })
    </script>
    @endif

</body>

</html>
