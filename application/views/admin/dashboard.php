<div class="container">
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
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
