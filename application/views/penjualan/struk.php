<style>
	* {
		margin: 0;
		padding: 0;
		font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
		box-sizing: border-box;
		font-size: 15px;
	}

	table td {
		vertical-align: top;
	}

	#invoice {
		box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
		text-align: center;
		align-items: center;
		justify-content: center;
		margin: 120 auto;
		padding: 2mm;
		width: 600px;
		height: auto;
		background: #FFF;
	}

	.invoice {
		margin: 40px auto;
		text-align: left;
		width: 100%;
	}

	.invoice td {
		padding: 5px 0;
	}

	.invoice .invoice-items {
		width: 100%;
	}

	.invoice .invoice-items td {
		border-top: #eee 1px solid;
	}

	.invoice .invoice-items .total td {
		border-top: 2px solid #333;
		border-bottom: 2px solid #333;
		font-weight: 900;
	}

	.content {
		max-width: 600px;
		margin: 0 auto;
		display: block;
		padding: 20px;
	}

	.content,
	.content-wrap {
		padding: 10px !important;
	}

	.invoice {
		width: 100% !important;
	}

	::selection {
		background: #f31544;
		color: #FFF;
	}

	::moz-selection {
		background: #f31544;
		color: #FFF;
	}

	h1 {
		font-size: 0.9em;
		color: #222;
	}

	h2 {
		font-size: 0.9em;
	}

	h3 {
		font-size: 1.2em;
		font-weight: 300;
		line-height: 2em;
	}

	p {
		font-size: 2em;
		color: #666;
		line-height: 1.2em;
	}

	#top,
	#mid,
	#bot {
		/* Targets all id with 'col-' */
		border-bottom: 1px solid #EEE;
	}

	#top {
		max-height: 100px;
	}

	#mid {
		min-height: 80px;
	}

	#bot {
		min-height: 50px;
	}

	.info {
		display: block;
		float: left;
		margin-left: 0;
	}

	.title {
		float: right;
	}

	.title p {
		text-align: right;
	}

	table {
		width: 100%;
		border: none;
	}

	td {
		padding: 5px 0 5px 15px;
		border: none;
	}

	.tabletitle {
		padding: 5px;
		font-size: 2em;
		background: #EEE;
	}

	.service {
		border-bottom: 1px solid #EEE;
	}

	.item {
		width: 24mm;
	}

	.itemtext {
		font-size: 1.0em;
	}

	#legalcopy {
		margin-top: 5mm;
	}

	.footer p,
	.footer a,
	.footer unsubscribe,
	.footer td {
		font-size: 15px;
	}
</style>

<div id="invoice">
	<table width="100%" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="content-block" style="text-align: center;">
					<h5>Lira Ponsel</h5>
					<h2>Terimakasih Telah Berbelanja</h2>
				</td>
			</tr>
			<tr>
				<td class="content-block">
					<table class="invoice" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>Toko : <span class="nama_toko"></span></br>
									Alamat : <span class="address"></span></br>
									No. HP : <span class="no_telp"></span></br>
								</td>
							</tr>
							<tr>
								<td>
									<table id="masukinDataBelanja">
										<tbody>
											<tr class="tabletitle">
												<td class="item">
													<h2>Barang</h2>
												</td>
												<td class="Hours">
													<h2>Qty</h2>
												</td>
												<td class="Rate">
													<h2>Sub Total</h2>
												</td>
											</tr>
										</tbody>

									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>

			<tr>
				<td class="content-block">
					Lira Ponsel. Tanah Merah, Binjai Selatan 20725
				</td>
			</tr>

		</tbody>
	</table>
	<!--End InvoiceBot-->
</div>
<!--End Invoice-->
<!--End Invoice-->
<script src="<?= base_url("assets/") ?>vendor/jquery/jquery.min.js"></script>
<script>
	function closePrintView() {
		document.location.href = '<?= base_url('penjualan/kasir') ?>';
	}
	$(document).ready(function() {
		let json = <?= $json ?>;
		console.log(json);
		$('.nama_toko').text(json.nama_toko);
		$('.address').text(json.alamat);
		$('.no_telp').text(json.no_telp);
		for (let i in json) {
			if (i.slice(0, 5) == 'item_') {
				$('#masukinDataBelanja').append('<tr class="service"><td class="tableitem"><p class="itemtext">' + json[i].nama_barang + '</p></td><td class="tableitem"><p class="itemtext">' + json[i].jumlah + '</p></td><td class="tableitem"><p class="itemtext">Rp. ' + json[i].harga + '</p></td></tr>');
				console.log(json[i].jumlah);
			}
		}
		$('#masukinDataBelanja').append('<tr class="tabletitle"><td></td><td class="Rate"><h2>Total</h2></td><td class="payment"><h2>Rp. ' + json.total + '</h2></td></tr>');
		window.print();
		setTimeout("closePrintView()", 3000);
	});
</script>
