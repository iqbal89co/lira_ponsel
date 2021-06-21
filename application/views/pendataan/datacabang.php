<style type="text/css">
	.auto {
		display: block;
		width: 650px;
		height: 500px;
		overflow: auto;
	}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>
	<div class="container">
		<div class="card-body p-0 ">
			<div class="card shadow mb-4" style="max-width: 600px; margin: 0 auto; float: none;">
				<div class="card-header py-3">
					<h4 class="m-0 font-weight-bold text-primary" style="text-align: center;"><?= $title ?><span><i class="fas fa-fw fa-plus float-right" data-toggle="modal" data-toggle="modal" data-target="#insertCabangBaru"></i> </span></h4>
				</div>
				<div class="row auto">
					<div class="col-sm-6">
						<?php
						$i = 1;
						foreach ($datacabang as $d) :
						?>
							<div class="card p-0" style="border: 0px;">
								<div class="card-body" style="width: 500px;">
									<div class="row">
										<div class="col-sm-6">
											<h5 class="card-title" style="text-align: center;"><?= $d['nama_toko'] ?></h5>
										</div>
										<div class="col-sm-6">
											<a type="button" style="max-width: 100px; max-height: 50px;" class="btn btn-outline-primary" href="<?= base_url('pendataan/infocabang/') . $d['id'] ?>" data-name="<?= $d['nama_toko'] ?>">Lihat</a>
										</div>
									</div>

								</div>
							</div>

						<?php
							$i++;
						endforeach;
						?>
					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="insertCabangBaru" tabindex="-1" aria-labelledby="newCabangModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="newCabangModalLabel">Masukkan info cabang yang ingin ditambahkan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<select class="form-control" id="addUseridTitle">
							<?php foreach ($availableUser as $l) { ?>
								<option value="<?= $l['id'] ?>"><?= $l['name'] ?> </option>
							<?php } ?>
						</select>
						<input type="text" class="form-control my-2" id="namatoko" placeholder="Nama Toko" required>
						<input type="text" class="form-control my-2" id="alamat" placeholder="Alamat" required>
						<input type="text" class="form-control my-2" id="notelp" placeholder="Nomor Toko" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button id="addCabangForm" type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<!-- js tambahcabang -->
	<script src="<?= base_url("assets/") ?>vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).on('click', '#addCabangForm', function() {
			let UserId = $('#addUseridTitle').val();
			let NamaToko = $('#namatoko').val();
			let Alamat = $('#alamat').val();
			let NoTelp = $('#notelp').val();
			$.ajax({
				url: "<?= base_url('pendataan/tambahCabangBaru') ?>",
				type: "post",
				data: {
					UserId: UserId,
					NamaToko: NamaToko,
					Alamat: Alamat,
					NoTelp: NoTelp
				},
				success: function() {
					document.location.href = "<?= base_url('pendataan/CabangSuccess/' . 'Cabang berhasil ditambahkan'); ?>";
				}
			});
		});
	</script>
