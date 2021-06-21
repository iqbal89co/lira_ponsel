<div class="mx-5 my-2 d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Data stok barang</h1>
</div>
<div class="jumbotron mx-5 pt-4">
	<div>
		<button class="btn btn-warning mb-3 float-right" style="display:block;" id="editStokBarang"><b>Edit Stok Barang</b></button>
		<button type="button" class="btn btn-secondary mb-3 float-right" style="display:none;" id="closeEditStok">Close</button>
		<button id="submitEditStok" type="button" class="btn btn-primary mb-3 float-right" style="display:none;">Submit</button>
	</div>
	<table class="table table-hover" id="table-stok">
		<thead>
			<tr>
				<th>#</th>
				<th>Nama Barang</th>
				<th>Kategori</th>
				<th>Harga</th>
				<th>Stok di Etalase</th>
				<th>Stok di Gudang</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1;
			foreach ($stok as $s) : ?>
				<tr>
					<td><?= $i ?></td>
					<th><?= $s['nama_barang'] ?></th>
					<td><?= $s['kategori'] ?></td>
					<td><?= $s['harga'] ?></td>
					<td>
						<div class="jlhEtalase" data-id="<?= $s['id'] ?>" data-jlh="<?= $s['jumlah_etalase'] ?>">
							<?= $s['jumlah_etalase'] ?>
						</div>
					</td>
					<td>
						<div class="jlhGudang" data-id="<?= $s['id'] ?>" data-jlh="<?= $s['jumlah_etalase'] ?>">
							<?= $s['jumlah_gudang'] ?>&nbsp;
						</div>
					</td>
				</tr>
			<?php $i++;
			endforeach; ?>
			<input type="number" id="banyakBarang" value="<?= $i - 1 ?>" hidden>
		</tbody>
	</table>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$(document).ready(function() {
			$('#table-stok').DataTable({
				"paging": false,
				"bFilter": false
			});
		});

		function finishUpdateStok() {
			document.location.href = "<?= base_url('gudang/stokbarang'); ?>";
		}
		$(document).on('click', '#submitEditStok', function() {
			let data = [];
			$('.jlhEtalase').each(function() {
				let id = $(this).data('id');
				let jumlah_etalase = Number($(this).children().val());
				let gudang = $('.jlhGudang[data-id=' + id + ']').children();
				let jumlah_gudang = Number($(gudang).val());
				if (jumlah_etalase > 0 || jumlah_gudang > 0) {
					let jumlah = {
						id: id,
						jumlah_etalase: jumlah_etalase,
						jumlah_gudang: jumlah_gudang
					}
					data.push(jumlah);
				}
			});
			$.ajax({
				url: "<?= base_url('gudang/updateStok') ?>",
				type: "POST",
				data: {
					json: JSON.stringify(data)
				},
				dataType: "JSON",
				success: function(data) {
					finishUpdateStok();
				}
			})

		});
		$(document).on('click', '#submitEditStok', function() {
			$('.jumbotron').hide();
			setTimeout(function() {
				window.location.reload();
			}, 1000);
		})
		$(document).on('click', '#submitEditStok, #closeEditStok', function() {
			$('#editStokBarang').show();
			$('#submitEditStok, #closeEditStok').hide();
			$('.jlhEtalase').each(function() {
				let ini = $(this);
				let id = $(this).data('id');
				let jumlah_etalase = $(this).children().val();
				$(ini).text(jumlah_etalase);
			});
			$('.jlhGudang').each(function() {
				let ini = $(this);
				let id = $(this).data('id');
				let jumlah_gudang = $(this).children().val();
				$(ini).text(jumlah_gudang);
			});
		});

		$(document).on('click', '#editStokBarang', function() {
			$(this).hide();
			$('#submitEditStok, #closeEditStok').show();
			const banyakBarang = $('#banyakBarang').val();
			$('.jlhEtalase').each(function() {
				let ini = $(this);
				let id = $(this).data('id');
				let jumlah_etalase = $(this).data('jlh');
				$(ini).empty();
				$(ini).append('<input min="0" type="number" value="' + jumlah_etalase + '">');
			});
			$('.jlhGudang').each(function() {
				let ini = $(this);
				let id = $(this).data('id');
				let jumlah_gudang = $(this).data('jlh');
				$(this).empty();
				$(ini).append('<input min="0" type="number" value="' + jumlah_gudang + '">');
			});

		});



	});
</script>
