<style type="text/css">
	.card {
		background: #fff;
		box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
		transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
		cursor: pointer;
		text-align: center;
	}

	.card:hover {
		box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
	}
</style>
<style type="text/css">
	.card {
		background: #fff;
		box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
		transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
		cursor: pointer;
		text-align: center;
	}

	.card:hover {
		box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
	}
</style>
<div class="container">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Stok Cabang</h1>
		</div>


		<div class="row">
			<?php foreach ($datacabang as $d) : ?>
				<div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#collapse<?= $d['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $d['id'] ?>">
					<div class="card border-bottom-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="h5 mb-0 font-weight-bold text-primary"><?= $d['nama_toko'] ?></div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="collapse" id="collapse<?= $d['id'] ?>">
					<div class="card card-body mb-3">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nama barang</th>
									<th scope="col">Kategori</th>
									<th scope="col">Jumlah di Etalase</th>
									<th scope="col">Jumlah di Gudang</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($this->pendataan->getStokCabang($d['id']) as $b) : ?>
									<tr>
										<th scope="row"><?= $i ?></th>
										<td><?= $b['nama_barang'] ?></td>
										<td><?= $b['kategori'] ?></td>
										<td><?= $b['jumlah_etalase'] ?></td>
										<td><?= $b['jumlah_gudang'] ?></td>
									</tr>
								<?php $i++;
								endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endforeach; ?>


		</div>
