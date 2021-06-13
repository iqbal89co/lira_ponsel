<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>
	<form action="<?= base_url('pendataan/infocabang/') . $datacabang['id'] ?>" method="POST">
		<!-- Page Heading -->
		<div class="card shadow mb-4" style="max-width: 600px; margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px;">
			<div class="card-header py-3 text-center">

				<h3 class="m-0 font-weight-bold text-info"><?= $title ?></h3>
			</div>
			<div class="card-body">
				<div>
					<div class="card-body">
						<table class="table table-borderless">
							<div class="table-responsive">
								<table class="table align-middle">
									<tr>
										<h5>Info </h5>
									</tr>
									<tr>
										<td>User Id:</td>
										<td><?= $datacabang['user_id']; ?></td>
									</tr>
									<tr>
										<td>Nama Toko:</td>
										<td><?= $datacabang['nama_toko']; ?></td>
									</tr>
									<tr>
										<td>Alamat:</td>
										<td><?= $datacabang['alamat']; ?></td>
									</tr>
									<tr>
										<td>Nomor Toko:</td>
										<td><?= $datacabang['no_telp']; ?></td>
									</tr>
								</table>
							</div>
						</table>
	</form>
	<a id="deleteCabang" class="badge bg-danger text-light" data-toggle="modal" data-target="#deleteCabangModal" data-cabang="<?= $datacabang['nama_toko'] ?>" data-id="<?= $datacabang['id'] ?>">DELETE</a>
	<a id="editCabang" class="badge bg-success text-light" data-toggle="modal" data-target="#editCabangModal" data-id="<?= $datacabang['id'] ?>" data-user="<?= $datacabang['user_id'] ?>" data-cabang="<?= $datacabang['nama_toko'] ?>" data-alamat="<?= $datacabang['alamat'] ?>" data-nama="<?= $datacabang['name'] ?>">EDIT</a>
</div>
</div>
</div>
</div>
</div>

<!-- Modal delete Cabang -->
<div class="modal fade" id="deleteCabangModal" tabindex="-1" aria-labelledby="deleteCabangModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteCabangModalLabel">Are you sure want to delete <span id="deleteAlertCabang"></span>?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="" id="deleteCabangButton" class="btn btn-info">Delete</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit Cabang -->
<div class="modal fade" id="editCabangModal" tabindex="-1" aria-labelledby="editCabangModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editCabangModalLabel">Edit Cabang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="number" id="editCabangId" hidden disabled required>
					<label for="editCabangTitle">Edit Cabang</label>
					<select class="form-control" id="editUseridTitle">
						<option id="editUserId" selected></option>
						<?php foreach ($layanan as $l) { ?>
							<option value="<?php echo $datacabang['user_id']; ?>"><?php echo $l['name']; ?> </option>
						<?php } ?>
					</select>
					<input type="text" class="form-control my-2" id="editCabangTitle" placeholder="Nama Cabang" required>
					<input type="text" class="form-control" id="editCabangAlamat" placeholder="Alamat Cabang" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="editCabangForm" type="button" class="btn btn-info">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- js infocabang -->
<script>
	//edit cabang modal form
	$(document).on('click', '#editCabangForm', function() {
		let CabangId = $('#editCabangId').val();
		let UserId = $('#editUserId').val();
		let CabangTitle = $('#editCabangTitle').val();
		let CabangAlamat = $('#editCabangAlamat').val();
		let nama = $('#editUserId').text();
		$.ajax({
			url: "<?= base_url('pendataan/editCabang') ?>",
			type: "POST",
			data: {
				CabangId: CabangId,
				UserId: UserId,
				CabangTitle: CabangTitle,
				CabangAlamat: CabangAlamat
			},
			success: function(result) {
				document.location.href = "<?= base_url('pendataan/CabangSuccess/' . 'Cabang berhasil diedit'); ?>";
			}
		});
	});
	//edit cabang pass
	$(document).on('click', '#editCabang', function() {
		let CabangId = $(this).data('id');
		let UserId = $(this).data('user');
		let CabangTitle = $(this).data('cabang');
		let CabangAlamat = $(this).data('alamat');
		let nama = $(this).data('nama');
		$('#editCabangModal #editCabangId ').val(CabangId);
		$('#editCabangModal #editUserId').val(UserId);
		$('#editCabangModal #editCabangTitle').val(CabangTitle);
		$('#editCabangModal #editCabangAlamat').val(CabangAlamat);
		$('#editCabangModal #editUserId').text(nama);
	});

	//Delete datacabang
	$(document).on('click', '#deleteCabang', function() {
		let datacabangId = $(this).data('id');
		let namatoko = $(this).data('cabang');
		$('#deleteCabangModal #deleteAlertCabang').text(namatoko);
		$('#deleteCabangModal #deleteCabangButton').attr('href', '<?= base_url('pendataan/deleteCabang/') ?>' + datacabangId);
	});
</script>
