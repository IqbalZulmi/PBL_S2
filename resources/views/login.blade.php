<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sentra HKI</title>
    <link rel="icon shortcut" href="{{ asset('web/logo.jpeg') }} ">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  asset('assets_login/vendor/daterangepicker/daterangepicker.css') }}">
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
		<div class="container-login100">
			<div class="wrap-login100">
                <div class="logo text-center">
                    <img src="{{ asset('web/logo.jpeg') }}" alt="Logo">
                </div>
                <span class="login100-form-title p-b-0">
                    WELCOME
                </span>
                <span class="login100-form-title p-b-20">
                    SENTRA HKI
                </span>
                <form action="/login" method="post" class="login100-form validate-form">
                    @csrf
					<div class="wrap-input100 validate-input">
						<input class="input100 @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" value="{{ old('password') }}" required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<a href="/register" class="txt2">
                            Register |
                        </a>
                        <a class="txt2" href="/forgot-password">
							 Forgot Password
						</a>
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
	<script src="{{ asset('assets_login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets_login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets_login/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets_login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assets_login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets_login/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets_login/js/main.js') }}"></script>

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
            timer: 2000,
        })
    </script>
    @endif

</body>
</html>
