<!DOCTYPE html>
<html lang="en">
<?php echo form_open('auth/login'); ?>

<head>
	<title>Member Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<img src="<?= base_url(); ?>assets/img/people.png" style="position: absolute; padding-bottom: 480px;">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-51">
						Member Login
					</span>

					<?php if ($this->session->flashdata('login')) { ?>
						<div class="wrap-input100 validate-input m-b-16 alert-validate" data-validate="Invalid username">
							<img src="<?= base_url(); ?>assets/img/akun.png" style="position: absolute; width: 30px; margin-top: 16px;">
							<input class="input100" type="text" name="username" placeholder="Username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-16 alert-validate" data-validate="Invalid password">
							<img src="<?= base_url(); ?>assets/img/pass.png" style="position: absolute; width: 30px; margin-top: 16px;">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
						</div>
					<?php } else { ?>
						<div class="wrap-input100 validate-input m-b-16" data-validate="Invalid username">
							<img src="<?= base_url(); ?>assets/img/akun.png" style="position: absolute; width: 30px; margin-top: 16px;">
							<input class="input100" type="text" name="username" placeholder="Username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-16" data-validate="Invalid password">
							<img src="<?= base_url(); ?>assets/img/pass.png" style="position: absolute; width: 30px; margin-top: 16px;">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
						</div>
					<?php } ?>

					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Keep Login?
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17" style="margin-top:0px;">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>assets/login/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/login/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/login/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/js/loginmain.js"></script>

</body>

</html>