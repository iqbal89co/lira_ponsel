<div class="container">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard Manager</h1>
		</div>

		<div class="row">

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url('pendataan/datastokcabang') ?>">
										Data Stok Cabang</a></div>
							</div>
							<div class="col-auto">
								<i class="fab fa-stack-exchange fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Tasks Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?= base_url('pendataan/datacabang') ?>" style="color : #36b9cc">Data Cabang</a>
								</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-database fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">SELAMAT DATANG DI LIRA PONSEL!</h6>
				</div>
				<div class="card-body">
					<div class="row no-gutters">
						<div class="col mr-2">
							<h5 class="font-weight-bold">Halo, <?= $user['name']; ?>!</h5>
							Ini adalah sistem untuk melakukan manajemen terhadap pendataan data gudang, penjualan, hingga melakukan pengelolaan terhadap aset. Selamat bekerja!
						</div>
						<div class="col-auto">
							<img src="<?= base_url(); ?>\assets\img\dashboard.png" style="max-width: 250px;">
						</div>
					</div>
				</div>

			</div>
