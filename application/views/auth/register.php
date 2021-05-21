<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">REGISTER</h1>
									</div>
									<form class="user" method="POST" action="<?= base_url('auth/register') ?>">
										<div class="form-group">
											<input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username">
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" placeholder="Password">
										</div>
										<div class="form-group">
											<input type="number" name="role" class="form-control form-control-user" placeholder="Enter role">
										</div>
										<div class="form-group">
											<input type="text" name="nama" class="form-control form-control-user" placeholder="Nama">
										</div>
										<button class="btn btn-primary btn-user btn-block">
											Register
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="<?= base_url('auth/'); ?>">already have an account? login</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
