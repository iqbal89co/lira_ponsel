<div class="container">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard Toko</h1>
		</div>

		<div class="row">

			<!-- Earnings (Monthly) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
									Penjualan</div>
								<?php if ($total_penjualan['total'] <= 0) { ?>
									<div class="h5 mb-0 font-weight-bold text-gray-800">Rp 0</div>
								<?php } else { ?>
									<div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= $total_penjualan['total'] ?></div>
								<?php } ?>
							</div>
							<div class="col-auto">
								<i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Earnings (Annual) Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
									Barang di etalase</div>
								<?php if ($total_stok['total_etalase'] <= 0) { ?>
									<div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
								<?php } else { ?>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_stok['total_etalase'] ?></div>
								<?php } ?>
							</div>
							<div class="col-auto">
								<i class="fas fa-chart-bar fa-2x text-gray-300"></i>
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
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang di gudang
								</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
										<?php if ($total_stok['total_gudang'] <= 0) { ?>
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
										<?php } else { ?>
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_stok['total_gudang'] ?></div>
										<?php } ?>
									</div>
									<div class="col">
										<div class="progress progress-sm mr-2">
											<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-building fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Pending Requests Card Example -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Kategori</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kategori['total'] ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-project-diagram fa-2x text-gray-300"></i>
							</div>
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
