<style type="text/css">
	.card {
		background: #fff;
		box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
		transition: .3s box-shadow;
		cursor: pointer;
		text-align: center;
	}

	.card:hover {
		box-shadow: 0 20px 30px rgba(0, 0, 0, .12), 0 10px 15px rgba(0, 0, 0, .06);
	}

	.card1 {
		background: #fff;
		box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
		transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
		cursor: pointer;
		text-align: center;
	}

	.card1:hover {
		transform: scale(1.05);
		box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
	}

	.vertical-menu {
		width: 800px;
		height: 300px;
		overflow-y: auto;
	}
</style>
<div class="container">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Kategori Barang</h1>
		</div>



		<div class="row">
			<div class="col-lg-6 mb-4">
				<div class="card bg-primary text-white shadow" data-toggle="modal" data-target="#addKategoriModal">
					<div class="card-body">
						Tambah Kategori
						<div class="text-white-50 small">
							<i class="fas fa-plus"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 mb-4">
				<div class="card bg-warning text-white shadow" id="toggleManage">
					<div class="card-body">
						Edit Kategori
						<div class="text-white-50 small">
							<i class="fas fa-edit"></i>
						</div>
					</div>
				</div>
			</div>



		</div>

		<div class="row">
			<?php foreach ($kategori as $k) : ?>
				<div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#collapse<?= $k['id_kategori'] ?>" aria-expanded="false" aria-controls="collapse<?= $k['id_kategori'] ?>">

					<div class="card1 border-bottom-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col-9">
									<div class="h5 mb-0 font-weight-bold text-primary"><?= $k['kategori'] ?></div>
								</div>
								<div class="row row-cols-2">
									<i class="col toggleManage fas <?= $k['icon'] ?> fa-2x text-gray-300"></i>
									<div class="col toggleManage" style="display: none;">
										<i class="editKategori fas fa-fw fa-edit" data-toggle="modal" data-target="#editKategoriModal" data-id="<?= $k['id_kategori'] ?>" data-nama="<?= $k['kategori'] ?>" data-icon="<?= $k['icon'] ?>"></i>
										<i class="deleteKategori fas fa-fw fa-trash-alt" data-toggle="modal" data-target="#deleteKategoriModal" data-id="<?= $k['id_kategori'] ?>" data-nama="<?= $k['kategori'] ?>" data-icon="<?= $k['icon'] ?>"></i>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="collapse" id="collapse<?= $k['id_kategori'] ?>">
					<div class="card card-body mb-3">
						<div class="vertical-menu">
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
									foreach ($this->jual->getTokoBarang($k['id_kategori']) as $b) : ?>
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
				</div>
			<?php endforeach; ?>


		</div>


		<!-- Modal add kategori -->
		<div class="modal fade" id="addKategoriModal" tabindex="-1" aria-labelledby="addKategoriModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addKategoriModalLabel">Tambah kategori</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control my-2" id="addKategoriName" placeholder="Nama Kategori" required>
							<input type="text" class="form-control my-2" id="addKategoriIcon" placeholder="Icon Kategori" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="addKategoriSubmit" type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal edit kategori -->
		<div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editKategoriModalLabel">Edit Kategori <span class="whichKategori"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="kategoriId" required hidden>
							<input type="text" class="form-control my-2" id="editKategoriName" placeholder="Nama Kategori" required>
							<input type="text" class="form-control my-2" id="editKategoriIcon" placeholder="Icon Kategori" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="editKategoriSubmit" type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal delete kategori -->
		<div class="modal fade" id="deleteKategoriModal" tabindex="-1" aria-labelledby="deleteKategoriModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deleteKategoriModalLabel">Hapus kategori <span class="whichKategori"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="kategoriId" required hidden>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="deleteKategoriSubmit" type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<script>
	$(document).ready(function() {
		$(document).on('click', '#addKategoriSubmit', function() {
			let nama = $('#addKategoriName').val();
			let icon = $('#addKategoriIcon').val();
			$.ajax({
				url: "<?= base_url('gudang/addNewKategori') ?>",
				type: "post",
				data: {
					nama: nama,
					icon: icon
				},
				success: function() {
					document.location.href = "<?= base_url('gudang/kategori/' . 'Kategori berhasil ditambahkan'); ?>";
				}
			});
		});
		$(document).on('click', '.editKategori', function() {
			let id = $(this).data('id');
			let nama = $(this).data('nama');
			let icon = $(this).data('icon');
			$('#editKategoriModal .kategoriId').val(id);
			$('#editKategoriName').val(nama);
			$('#editKategoriIcon').val(icon);
			$('.whichKategori').text(nama);
		});
		$(document).on('click', '#editKategoriSubmit', function() {
			let id = $('#editKategoriModal .kategoriId').val();
			let nama = $('#editKategoriName').val();
			let icon = $('#editKategoriIcon').val();
			$.ajax({
				url: "<?= base_url('gudang/editKategori') ?>",
				type: "post",
				data: {
					nama: nama,
					icon: icon,
					id: id
				},
				success: function() {
					document.location.href = "<?= base_url('gudang/kategori/' . 'Kategori berhasil diedit'); ?>";
				}
			});
		});
		$(document).on('click', '.deleteKategori', function() {
			let id = $(this).data('id');
			let nama = $(this).data('nama');
			$('#deleteKategoriModal .kategoriId').val(id);
			$('.whichKategori').text(nama);
		});
		$(document).on('click', '#deleteKategoriSubmit', function() {
			let id = $('#deleteKategoriModal .kategoriId').val();
			$.ajax({
				url: "<?= base_url('gudang/deleteKategori') ?>",
				type: "post",
				data: {
					id: id
				},
				success: function() {
					document.location.href = "<?= base_url('gudang/kategori/' . 'Kategori berhasil dihapus'); ?>";
				}
			});
		});
		$(document).on('click', '#toggleManage', function() {
			$('.toggleManage').toggle();
		});
	});
</script>
