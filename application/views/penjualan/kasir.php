<style type="text/css">
	.title {
		margin-bottom: 5vh
	}

	.card_cart {
		margin: auto;
		width: 90%;
		box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 1rem;
		margin-bottom: 100px;
		border: transparent
	}

	@media(max-width:767px) {
		.card_cart {
			margin: 3vh auto
		}
	}

	.cart {
		background-color: #fff;
		padding: 4vh 5vh;
		border-bottom-left-radius: 1rem;
		border-top-left-radius: 1rem
	}

	@media(max-width:767px) {
		.cart {
			padding: 4vh;
			border-bottom-left-radius: unset;
			border-top-right-radius: 1rem
		}
	}

	.summary {
		background-color: #ddd;
		border-top-right-radius: 1rem;
		border-bottom-right-radius: 1rem;
		padding: 4vh;
		color: rgb(65, 65, 65)
	}

	@media(max-width:767px) {
		.summary {
			border-top-right-radius: unset;
			border-bottom-left-radius: 1rem
		}
	}

	.summary .col-2 {
		padding: 0
	}

	.summary .col-10 {
		padding: 0
	}

	.row {
		margin: 0
	}

	.title b {
		font-size: 1.5rem
	}

	.main {
		margin: 0;
		padding: 2vh 0;
		width: 100%
	}

	.col-2,
	.col {
		padding: 0 1vh
	}

	a {
		padding: 0 1vh
	}

	.close {
		margin-left: auto;
		font-size: 0.7rem
	}

	img {
		width: 3.5rem
	}

	.back-to-shop {
		margin-top: 2rem
	}

	h5 {
		margin-top: 4vh
	}

	hr {
		margin-top: 1.25rem
	}

	form {
		padding: 2vh 0
	}

	select {
		border: 1px solid rgba(0, 0, 0, 0.137);
		padding: 1.5vh 1vh;
		margin-bottom: 4vh;
		outline: none;
		width: 100%;
		background-color: rgb(247, 247, 247)
	}

	input {
		border: 1px solid rgba(0, 0, 0, 0.137);
		padding: 1vh;
		margin-bottom: 4vh;
		outline: none;
		width: 100%;
		background-color: rgb(247, 247, 247)
	}

	input:focus::-webkit-input-placeholder {
		color: transparent
	}

	.btn_cat {
		width: 7rem;
		height: 7rem;

	}

	.btn_cat:active {
		background-color: blue;
	}

	.btnbtnCheckout {
		background-color: #000;
		border-color: #000;
		color: white;
		width: 100%;
		font-size: 0.7rem;
		margin-top: 4vh;
		padding: 1vh;
		border-radius: 0
	}

	.btnbtnCheckout:focus {
		box-shadow: none;
		outline: none;
		box-shadow: none;
		color: white;
		-webkit-box-shadow: none;
		-webkit-user-select: none;
		transition: none;
	}

	.btnbtnCheckout:hover {
		color: white
	}

	a {
		color: black
	}

	a:hover {
		color: black;
		text-decoration: none
	}

	#code {
		background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
		background-repeat: no-repeat;
		background-position-x: 95%;
		background-position-y: center
	}

	.card {
		background: #fff;
		box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
		transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
		cursor: pointer;
		text-align: center;
	}

	.card:hover {
		transform: scale(1.05);
		box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
	}

	div.scrollmenu {
		overflow: auto;
		white-space: nowrap;
	}

	.modalCheckout {
		background: rgba(0, 0, 0, 0.5);
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		pointer-events: none;
		transition: all 0.25s ease-out;
	}

	.back-to-shop {
		margin-top: 4.5rem
	}

	.open {
		opacity: 1;
		pointer-events: all;
	}

	.modalCheckout .card_cart {
		max-width: 500px;
		position: absolute;
		bottom: 5%;
		left: 50%;
		transform: translate(-50%, -5%);
		transition: all 0.25s ease-out;
	}

	.banned {
		opacity: 0.5;
		transition: all 0.25s ease-out;
	}

	.cartBody {
		height: 20rem;
		overflow: auto;
	}

	.perBarang {
		height: 8rem;
		overflow: auto;
	}

	.card-text {
		font-size: .8rem;
		color: black;
		line-height: 1.5em;
		height: 3em;
		overflow: hidden;
		white-space: nowrap;
		width: 100%;

	}

	.vertical-menu {
		height: 20rem;
		overflow-y: auto;
	}
</style>

<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="mx-5 my-2 d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Kasir</h1>
</div>


<!-- MODAL CHEKEOUT
-->

<div class="modal fade bd-example-modal-lg" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="max-height: 40rem;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="container">
				<div class="block-heading">
					<h5>Checkout</h5>

				</div>
				<div class="item">
					<div><span class="jumlahTotalBarang">0</span> items</div>
					<div class="cartBody scrollmenu"></div>
				</div>
				<hr>
				<div class="scrollmenu">

					<form action="<?= base_url('penjualan/receipt') ?>" method="POST">
						<p>NAMA PELANGGAN</p> <input name="nama_pelanggan" placeholder="Nama Pelanggan" required>
						<div class="perBarang"></div>
						<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
							<div class="col">TOTAL HARGA</div>
							<div class="col text-right">Rp <span id="totalCheckout">0</span></div>
						</div>
						<input name="jsonData" type="text" id="cetakStruk" hidden>
						<div id="backToShop" class="back-to-shop"><a>&leftarrow;</a><span class="text-muted">Back to shop</span></div>
						<button type="submit" id="btnCheckout" class="btn btn-primary btn-block">Proceed</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="card_cart">
	<div class="row">
		<div class="col-md-8 cart">
			<div class="title">
				<div class="row">
					<div class="col align-self-center text-right text-muted">
						<div class="input-group mb-3 w-50" style="margin-left: 50%;">
							<input type="text" class="searchText form-control" aria-label="Amount (to the nearest dollar)">
							<div style="cursor:pointer;" class="searchSubmit input-group-append">
								<span class="input-group-text"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="scrollmenu">
								<button type="button" id="kategoriAll" title="Semua barang" class="btn_cat mr-2 btn btn-outline-primary"><i class="fas fa-fw fa-2x fa-globe"></i><br />semua</button>
								<?php foreach ($kategori as $k) : ?>
									<button type="button" id="kategori<?= $k['id_kategori'] ?>" title="<?= $k['kategori'] ?>" class="btn_cat mr-2 btn btn-outline-primary"><i class="fas fa-fw fa-2x <?= $k['icon'] ?>"></i><br /><?= substr($k['kategori'], 0, 10) ?></button>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row border-top border-bottom">
				<div class="vertical-menu">
					<div id="kumpulanBarang" class="w-100 m-0 p-0">
						<?php foreach ($barang as $b) : ?>
							<div id="barang<?= $b['id'] ?>" class="isiBarang card m-2" style="width: 11rem; height: 12rem; display: inline-block;" title="<?= $b['nama_barang'] ?>" data-idbarang="<?= $b['id'] ?>" data-kategori="<?= $b['kategori'] ?>" data-namabarang="<?= $b['nama_barang'] ?>" data-hargabarang="<?= $b['harga'] ?>" data-icon="<?= $b['icon'] ?>" data-jlhbarang=" <?= $b['jumlah_etalase'] + $b['jumlah_gudang'] ?>">
								<i class="my-3 fas fa-fw fa-4x <?= $b['icon'] ?>"></i>
								<div class="card-body">
									<b class="card-text" style=""><?= substr($b['nama_barang'], 0, 15) ?></b>
									<p class="card-text">Rp <?= $b['harga'] ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-4 summary">

			<div class="row">
				<div class="col align-self-center">
					<h5><b>Pembelian</b></h5>
				</div>
				<div class="col align-self-center text-right"><span class="jumlahTotalBarang">0</span> items</div>
			</div>
			<hr>
			<div class="cartBody" style="height: 30rem;"></div>
			<button type="button" class="btn btn-primary align-self-center float-right" id="triggerCheckout" data-backdrop="static" data-toggle="modal" data-target=".bd-example-modal-lg">Checkout</button>


		</div>
	</div>
</div>


<!-- js kasir -->
<script>
	$(document).ready(function() {

		// search
		$(document).on('click', '.searchSubmit', function() {
			let search = $('.searchText').val();
			$('.isiBarang').remove();
			$.ajax({
				url: "<?= base_url('penjualan/getBarangSearch') ?>",
				type: "POST",
				data: {
					search: search
				},
				dataType: "json",
				success: function(data) {
					let banned = $('.banned');
					for (i in data) {
						let lolos = 1;
						for (let j = 0; j < banned.length; j++) {
							if (data[i].id == $(banned[j]).data('idbarang')) {
								lolos = 0;
							}
						}
						if (lolos == 1) {
							$('#kumpulanBarang').append(
								'<div id="barang' + data[i].id + '" class="isiBarang card m-2" data-idbarang="' + data[i].id + '" data-kategori="' + data[i].kategori + '" data-namabarang="' + data[i].nama_barang + '" data-hargabarang="' + data[i].harga + '" data-icon="' + data[i].icon + '" data-jlhbarang="' + (Number(data[i].jumlah_etalase) + Number(data[i].jumlah_gudang)) + '" style="width: 11rem; height: 12rem; display: inline-block;" title="' + data[i].nama_barang + '"><i class="my-3 fas fa-fw fa-4x ' + data[i].icon + '"></i><div class="card-body"><b class="card-text" style="font-size:.8rem;color: black;">' + data[i].nama_barang.slice(0, 15) + '</b><p class="card-text">Rp ' + data[i].harga + '</p></div></div>'
							);
						}
					}
				}
			});
		});
		// filter by kategori
		<?php foreach ($kategori as $k) : ?>
			$(document).on('click', '#kategori<?= $k['id_kategori'] ?>', function() {
				$('.isiBarang').remove();
				$.ajax({
					url: "<?= base_url('penjualan/getBarangFilterKategori') ?>",
					type: "POST",
					data: {
						kategoriId: <?= $k['id_kategori'] ?>
					},
					dataType: "json",
					success: function(data) {
						let banned = $('.banned');
						for (i in data) {
							let lolos = 1;
							for (let j = 0; j < banned.length; j++) {
								if (data[i].id == $(banned[j]).data('idbarang')) {
									lolos = 0;
								}
							}
							if (lolos == 1) {
								$('#kumpulanBarang').append(
									'<div id="barang' + data[i].id + '" class="isiBarang card m-2" data-idbarang="' + data[i].id + '" data-kategori="' + data[i].kategori + '" data-namabarang="' + data[i].nama_barang + '" data-hargabarang="' + data[i].harga + '" data-icon="' + data[i].icon + '" data-jlhbarang="' + (Number(data[i].jumlah_etalase) + Number(data[i].jumlah_gudang)) + '" style="width: 11rem; height: 12rem; display: inline-block;" title="' + data[i].nama_barang + '"><i class="my-3 fas fa-fw fa-4x ' + data[i].icon + '"></i><div class="card-body"><b class="card-text" style="font-size:.8rem;color: black;">' + data[i].nama_barang.slice(0, 15) + '</b><p class="card-text">Rp ' + data[i].harga + '</p></div></div>'
								);
							}
						}
					}
				});
			});
		<?php endforeach; ?>
		// filter no kategori (all barang)
		$(document).on('click', '#kategoriAll', function() {
			$('.isiBarang').remove();
			$.ajax({
				url: "<?= base_url('penjualan/getAllBarang') ?>",
				type: "POST",
				data: {},
				dataType: "json",
				success: function(data) {
					let banned = $('.banned');
					for (i in data) {
						let lolos = 1;
						for (let j = 0; j < banned.length; j++) {
							if (data[i].id == $(banned[j]).data('idbarang')) {
								lolos = 0;
							}
						}
						if (lolos == 1) {
							$('#kumpulanBarang').append(
								'<div id="barang' + data[i].id + '" class="isiBarang card m-2" data-idbarang="' + data[i].id + '" data-kategori="' + data[i].kategori + '" data-namabarang="' + data[i].nama_barang + '" data-hargabarang="' + data[i].harga + '" data-icon="' + data[i].icon + '" data-jlhbarang="' + (Number(data[i].jumlah_etalase) + Number(data[i].jumlah_gudang)) + '" style="width: 11rem; height: 12rem; display: inline-block;" title="' + data[i].nama_barang + '"><i class="my-3 fas fa-fw fa-4x ' + data[i].icon + '"></i><div class="card-body"><b class="card-text" style="font-size:.8rem;color: black;">' + data[i].nama_barang.slice(0, 15) + '</b><p class="card-text">Rp ' + data[i].harga + '</p></div></div>'
							);
						}
					}
				}
			});
		});

		// masukkan barang ke keranjang
		$(document).on('click', '.isiBarang', function() {
			$('#triggerCheckout, #btnCheckout').removeAttr('disabled');
			$(this).removeClass('isiBarang').addClass('banned');
			const idBarang = $(this).data('idbarang');
			const kategori = $(this).data('kategori');
			const namaBarang = $(this).data('namabarang');
			const icon = $(this).data('icon');
			const harga = $(this).data('hargabarang');
			const jumlahBarang = Number($(this).data('jlhbarang'));
			let option = "";
			for (let i = 2; i <= jumlahBarang; i++) {
				option += '<option value="' + i + '">' + i + '</option>';
			}
			// '<select class="border jumlahBarangKasir"><option selected value="1">1</option>' + option + '</select>'
			$('.cartBody').append(
				'<div class="bk row border-top border-bottom barangKasir' + idBarang + '" data-id="' + idBarang + '"><div class="row main align-items-center"><div class="col-2"><i class="fas fa-fw fa-2x ' + icon + '"></i></div><div class="col-4" style="width: 5rem;"><div class="row text-muted">' + kategori + '</div><div class="row itemName' + idBarang + '">' + namaBarang + '</div></div><div class="col-3"><a style="cursor: pointer;" class="kurangBarang">-</a><a class="jlhBarang' + idBarang + '" data-id="' + idBarang + '" class="border">1</a><a class="tambahBarang" style="cursor: pointer;">+</a></div><div class="col-3 hargaBarangKasir' + idBarang + '">Rp. ' + harga + '<div class="close deleteBarangKasir" data-barang="' + idBarang + '">&#10005;</div></div></div></div>'
			);
			let jlhTemp = Number($('.jumlahTotalBarang').first().text());
			$('.jumlahTotalBarang').text(jlhTemp + 1);
		});
		// delete barang dari kasir
		$(document).on('click', '.deleteBarangKasir', function() {
			const idBarang = $(this).data('barang');
			$('#barang' + idBarang).addClass('isiBarang').removeClass('banned');
			$('.barangKasir' + idBarang).remove();
			let jlhTemp = Number($('.jumlahTotalBarang').first().text());
			if (jlhTemp == 1) {
				$('#triggerCheckout, #btnCheckout').attr('disabled', 'true');
			}
			$('.jumlahTotalBarang').text(jlhTemp - 1);
		});

		// tambah kurang jumlah barang
		$(document).on('click', '.kurangBarang', function() {
			let barang = $(this).next();
			let jlhBarang = Number(barang.text());
			let idBarang = barang.data('id');
			let barangnya = $('.jlhBarang' + idBarang);
			if (jlhBarang > 1) {
				barangnya.text(jlhBarang - 1);
			}
		})
		$(document).on('click', '.tambahBarang', function() {
			let barang = $(this).prev();
			let jlhBarang = Number(barang.text());
			let idBarang = barang.data('id');
			let barangnya = $('.jlhBarang' + idBarang);
			let jlhMax = 0;
			$.ajax({
				url: "<?= base_url('penjualan/getJumlahBarang') ?>",
				type: "POST",
				data: {
					idBarang: idBarang
				},
				success: function(data) {
					if (jlhBarang < data) {
						barangnya.text(jlhBarang + 1);
					}
				}
			});

		})

		// trigger modal checkout
		$(document).on('click', '#triggerCheckout', function() {
			$('#modalCheckout').addClass('open');
		});
		$(document).on('click', '#backToShop', function() {

			$('#modalCheckout').modal('toggle');
			$('.perBarang').empty();
		});

		// hitung total harga checkout
		// cetak struk dan checkout
		$(document).on('click', '#triggerCheckout', function() {
			let data = {
				nama_toko: '<?= $cabang['nama_toko'] ?>',
				alamat: '<?= $cabang['alamat'] ?>',
				no_telp: '<?= $cabang['no_telp'] ?>'
			};
			// cari harga dan jumlahnya tiap barang belian
			let jlhItem = $('.cartBody').first().find('.bk');
			let totalHarga = 0;
			jlhItem.each(function(i, v) {
				i++;
				let id = $(v).data('id');
				let namaBarang = $('.itemName' + id).first().text();
				let jlhBarang = Number($('.jlhBarang' + id).first().text());
				let hargaBarang = Number($('.hargaBarangKasir' + id).first().text().slice(4, -1));
				// $('.perBarang').append('<div class="row"><div class="col" style="padding-left:0;">item ' + i + '</div><div class="col text-right">' + jlhBarang + '* ' + hargaBarang.slice(4, -1) + '</div></div>');
				let item = {
					id_barang: id,
					nama_barang: namaBarang,
					jumlah: jlhBarang,
					harga: hargaBarang
				}
				data['item_' + i] = item;
				$('.perBarang').append('<div class="row"><div class="col" style="padding-left:0;">item ' + i + '</div><div class="col text-right">' + jlhBarang + '* ' + hargaBarang + '</div></div>');
				totalHarga += (jlhBarang * hargaBarang);
			});
			$('#totalCheckout').text(totalHarga);
			data.total = totalHarga;
			// $('.totalCheckout').text();
			console.log(data);
			$('#cetakStruk').val(JSON.stringify(data));
		});

		// minor frontend
		if ($('.jumlahTotalBarang').first().text() == 0) {
			$('#triggerCheckout, #btnCheckout').attr('disabled', 'true');
		}
	});
</script>
