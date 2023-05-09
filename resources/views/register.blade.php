<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sentra HKI</title>
    <link rel="icon shortcut" href="{{ asset('web/logo.jpeg') }} ">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-0">
						SELAMAT DATANG
					</span>
					<span class="login100-form-title p-b-20">
						SENTRA HKI
					</span>
					<?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert text-center'>Username dan Password tidak sesuai !</div>";
                    }
                }
                ?>
					<div class="wrap-input100 validate-input">
						<input required class="input100" type="text" name="Username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input required class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input required class="input100" type="text" name="Nama">
						<span class="focus-input100" data-placeholder="Nama"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input required class="input100" type="text" name="NIK">
						<span class="focus-input100" data-placeholder="NIK"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input required class="input100" type="text" name="Email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input required class="input100" type="text" name="No_WhatsApp">
						<span class="focus-input100" data-placeholder="NO Whatsapp"></span>
					</div>

						<div class="wrap-input100 validate-input">
							<select class="input100" name="Jurusan" required>
								<option value="">Pilih Jurusan</option>
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Sistem Informasi">Teknik Mesin</option>
								<option value="Teknik Elektro">Teknik Elektro</option>
								<option value="Manajemen Bisnis">Manajemen Bisnis</option>
							</select>

						</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="submit" class="login100-form-btn">
								Daftar
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets_login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets_login/js/main.js"></script>

</body>
</html>
