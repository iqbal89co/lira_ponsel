<style type="text/css">
	.title {
		margin-bottom: 5vh
	}

	.card_cart {
		margin: auto;
		max-width: 800px;
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
		margin-top: 4.5rem
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
		transition: none
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

	.open {
		opacity: 1;
		pointer-events: all;
	}

	.modalCheckout .card_cart {
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
</style>

<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="mx-5 my-2 d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Kasir</h1>
</div>
<div class="row mx-5 my-2">
	<div class="col-lg-8">
		<div class="input-group mb-3 w-50" style="margin-left: 50%;">
			<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
			<div style="cursor:pointer;" class="input-group-append">
				<span class="input-group-text"><i class="fas fa-search"></i></span>
			</div>
		</div>
		<div class="row">
			<div class="scrollmenu">
				<button type="button" id="kategoriAll" style="width:7rem; height:7rem" title="Semua barang" class="mr-2 btn btn-outline-primary"><i class="fas fa-fw fa-2x fa-globe"></i><br />semua</button>
				<?php foreach ($kategori as $k) : ?>
					<button type="button" id="kategori<?= $k['id_kategori'] ?>" style="width:7rem; height:7rem" title="<?= $k['kategori'] ?>" class="mr-2 btn btn-outline-primary"><i class="fas fa-fw fa-2x <?= $k['icon'] ?>"></i><br /><?= substr($k['kategori'], 0, 10) ?></button>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="row">
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
	<div class="col-lg-4">
		<div class="cart">
			<div class="tempCart">
				<div class="title">
					<div class="row">
						<div class="col">
							<h4><b>Kasir</b></h4>
						</div>
						<div class="col align-self-center text-right text-muted"><span class="jumlahTotalBarang">0</span> items</div>
					</div>
				</div>
				<div class="cartBody"></div>
			</div>

			<div class="back-to-shop"><span class="text-muted">&nbsp;</span><button id="triggerCheckout" class="btn btn-primary float-right">Checkout</button></div>
		</div>
	</div>
</div>


<div id="modalCheckout" class="modalCheckout w-100">
	<div class="card_cart">
		<div class="row">
			<div class="col-md-8 cart">
				<div class="tempCart">
					<div class="title">
						<div class="row">
							<div class="col">
								<h4><b>Kasir</b></h4>
							</div>
							<div class="col align-self-center text-right text-muted"><span class="jumlahTotalBarang">0</span> items</div>
						</div>
					</div>
					<div class="cartBody scrollmenu"></div>
				</div>
				<div id="backToShop" class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
			</div>
			<div class="col-md-4 summary">
				<div>
					<h5><b>Pembelian</b></h5>
				</div>

				<hr>
				<div class="perBarang scrollmenu">
				</div>
				<form action="<?= base_url('penjualan/receipt') ?>" method="POST">
					<p>NAMA PELANGGAN</p> <input name="nama_pelanggan" placeholder="Nama Pelanggan" required>
					<div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
						<div class="col">TOTAL HARGA</div>
						<div class="col text-right">Rp <span id="totalCheckout">0</span></div>
					</div>
					<input name="jsonData" type="text" id="cetakStruk" hidden>
					<button type="submit" id="btnCheckout">ENTER</button>
				</form>
			</div>
		</div>
	</div>
</div>
