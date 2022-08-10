<?php
require_once 'setting/konstanta.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=judul?></title>
	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
	<!-- Layout styles -->  
	<link rel="stylesheet" href="assets/css/demo_1/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body class="sidebar-dark">
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
								
								<div class="col-md-12">
									<div class="auth-form-wrapper px-4 py-5">
										<a href="#" class="noble-ui-logo d-block mb-2"><?=judullogin?>
											<h5 class="text-muted font-weight-normal mb-4">Silahkan isi username dan Passoword</h5>
											<form class="forms-sample" action="logincek.php" method="post">
												<div class="form-group">
													<label for="exampleInputEmail1">Username</label>
													<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
												</div>
												<div class="form-group">
													<label for="exampleInputPassword1">Password</label>
													<input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password">
												</div>

												<div class="row">
													<div class="mt-3 md-6">
														<input type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white" name="" value="Login">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- core:js -->
		<script src="assets/vendors/core/core.js"></script>
		<!-- endinject -->
		<!-- plugin js for this page -->
		<!-- end plugin js for this page -->
		<!-- inject:js -->
		<script src="assets/vendors/feather-icons/feather.min.js"></script>
		<script src="assets/js/template.js"></script>
		<!-- endinject -->
		<!-- custom js for this page -->
		<!-- end custom js for this page -->
	</body>
	</html>