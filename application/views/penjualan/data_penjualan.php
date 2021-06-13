<div class="mx-5 my-2 d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data penjualan</h1>
</div>
<div class="jumbotron mx-5">
	<table class="table table-hover" id="table-penjualan">
		<thead>
			<tr>
				<th>#</th>
				<th>INVOICE</th>
				<th>NAMA PELANGGAN</th>
				<th>TOTAL PEMBELIAN</th>
				<th>TANGGAL PEMBELIAN</th>
				<th>aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($order_sum as $os) : ?>
				<tr>
					<th><?= $i ?></th>
					<td><?= $os['invoice'] ?></td>
					<td><?= $os['nama_pelanggan'] ?></td>
					<td><?= $os['total_pembelian'] ?></td>
					<td><?= $os['tanggal_pembelian'] ?></td>
					<td>
						<button class="deletePenjualan p-1 btn btn-danger" data-toggle="modal" data-target="#deletePenjualanModal" data-id="<?= $os['id_pembelian'] ?>" data-invoice="<?= $os['invoice'] ?>"><i class="fas fa-fw fa-trash-alt"></i></button>
						<button class="detailPenjualan p-1 btn btn-primary" data-toggle="modal" data-target="#detailPenjualanModal" data-id="<?= $os['id_pembelian'] ?>"><i class="fas fa-fw fa-eye"></i></button>
					</td>
				</tr>
			<?php $i++;
			endforeach; ?>
		</tbody>
	</table>
</div>

<!-- Modal delete penjualan -->
<div class="modal fade" id="deletePenjualanModal" tabindex="-1" aria-labelledby="deletePenjualanModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deletePenjualanModalLabel">Hapus Penjualan dengan invoice <span class="whichPenjualan"></span></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="penjualanId" required hidden>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="deletePenjualanSubmit" type="button" class="btn btn-danger">DELETE</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal detail penjualan -->
<div class="modal fade" id="detailPenjualanModal" tabindex="-1" aria-labelledby="detailPenjualanModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailPenjualanModalLabel">Detail Penjualan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover table-dark">
					<thead>
						<tr>
							<th>#</th>
							<th>Item</th>
							<th>Qty</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody id="isiTablePerOrder"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#table-penjualan').DataTable();
		$(document).on('click', '.deletePenjualan', function() {
			let id = $(this).data('id');
			let invoice = $(this).data('invoice');
			$('.penjualanId').val(id);
			$('.whichPenjualan').text(invoice);
		});
		$(document).on('click', '#deletePenjualanSubmit', function() {
			let id = $('.penjualanId').val();
			document.location.href = "<?= base_url('penjualan/deletePenjualan/'); ?>" + id;
		});
		$(document).on('click', '.detailPenjualan', function() {
			let id = $(this).data('id');
			$.ajax({
				url: "<?= base_url('penjualan/detailPerPenjualan') ?>",
				type: "POST",
				data: {
					id: id
				},
				dataType: "JSON",
				success: function(data) {
					$('#isiTablePerOrder').empty();
					let total = 0;
					for (i in data) {
						$('#isiTablePerOrder').append('<tr><th>' + (Number(i) + 1) + '</th><td>' + data[i].nama_barang + '</td><td>' + data[i].jumlah + '</td><td>' + data[i].harga + '</td></tr>');
						total += (data[i].jumlah * data[i].harga);
					}
					$('#isiTablePerOrder').append('<tr><th></th><td></td><th>Total</th><td>' + total + '</td></tr>');
				}
			});
		});
	});
</script>
