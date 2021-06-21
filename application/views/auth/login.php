<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<img src="<?= base_url(); ?>\assets\img\banner.jpg" style="max-width: 430px;">
							<div class="col-lg-6" style="margin: auto; width: 50%;">
								<div class="p-4">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Login</h1>
										<h6 class="h6 text-gray-900 mb-4">Masukkan username dan password untuk masuk ke Lira Ponsel</h6>
										<?= $this->session->flashdata('message'); ?>
									</div>
									<form class="user" method="POST" action="<?= base_url('auth/') ?>">
										<div class="form-group">
											<input type="text" name="username" class="form-control form-control-user" placeholder="Masukkan Username">
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" placeholder="Password">
										</div>
										<button class="btn btn-primary btn-user btn-block">
											Login
										</button>
									</form>
									<hr>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

</body>
