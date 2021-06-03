<!-- Bootstrap core JavaScript-->
<script src="<?= base_url("assets/") ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url("assets/") ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url("assets/") ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url("assets/") ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="< base_url("assets/")> vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="< base_url("assets/")> js/demo/chart-area-demo.js"></script>
<script src="< base_url("assets/")> js/demo/chart-pie-demo.js"></script> -->

<!-- js kasir -->
<script>
	$(document).ready(function() {
		// disabled yang gada stok

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
			$('#modalCheckout').removeClass('open');
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

<!-- js menu -->
<script>
	$(document).ready(function() {

		$(document).on('mouseenter', '#tooltipTitle', function() {
			submenuId = $(this).data('submenu');
			$(this).append(
				'<a id="passSubmenuData" data-toggle="modal" data-target="#editSubmenuModal" class="btn btn-hover btn-warning py-0 px-1 mx-2"><i class="fas fa-fw fa-edit"></i></a>'
			);
			$(this).append(
				'<a id="deleteSubmenu" data-id="' + submenuId + '" data-toggle="modal" data-target="#deleteSubmenuModal" class="btn btn-hover btn-danger py-0 px-1 mx-2"><i class="fas fa-fw fa-trash-alt"></i></a>'
			);
			$(document).on('click', '#passSubmenuData', function() {
				$('#editSubmenuModal #editSubmenuId').val(submenuId);
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/title') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuTitle').val(result);
						$('#deleteSubmenu').attr('data-submenu', result);
					}
				});
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/url') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuUrl').val(result);
					}
				});
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/icon') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuIcon').val(result);
					}
				});
			});
		});
		$(document).on('mouseenter', '#tooltipUrl', function() {
			submenuId = $(this).data('submenu');
			$(this).append(
				'<a id="passSubmenuData" data-toggle="modal" data-target="#editSubmenuModal" class="btn btn-hover btn-warning py-0 px-1 mx-2"><i class="fas fa-fw fa-edit"></i></a>'
			);
			$(this).append(
				'<a id="deleteSubmenu" data-id="' + submenuId + '" data-toggle="modal" data-target="#deleteSubmenuModal" class="btn btn-hover btn-danger py-0 px-1 mx-2"><i class="fas fa-fw fa-trash-alt"></i></a>'
			);
			$(document).on('click', '#passSubmenuData', function() {
				$('#editSubmenuModal #editSubmenuId').val(submenuId);
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/title') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuTitle').val(result);
					}
				});
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/url') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuUrl').val(result);
					}
				});
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/icon') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuIcon').val(result);
					}
				});
			});
		});
		$(document).on('mouseenter', '#tooltipIcon', function() {
			submenuId = $(this).data('submenu');
			$(this).append(
				'<a id="passSubmenuData" data-toggle="modal" data-target="#editSubmenuModal" class="btn btn-hover btn-warning py-0 px-1 mx-2"><i class="fas fa-fw fa-edit"></i></a>'
			);
			$(this).append(
				'<a id="deleteSubmenu" data-id="' + submenuId + '" data-toggle="modal" data-target="#deleteSubmenuModal" class="btn btn-hover btn-danger py-0 px-1 mx-2"><i class="fas fa-fw fa-trash-alt"></i></a>'
			);
			$(document).on('click', '#passSubmenuData', function() {
				$('#editSubmenuModal #editSubmenuId').val(submenuId);
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/title') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuTitle').val(result);
					}
				});
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/url') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuUrl').val(result);
					}
				});
				$.ajax({
					url: "<?= base_url('admin/getDataforEditSubmenu/icon') ?>",
					type: "POST",
					data: {
						submenuId: submenuId
					},
					success: function(result) {
						$('#editSubmenuModal #editSubmenuIcon').val(result);
					}
				});
			});
		});

		$(document).on('mouseleave', '#tooltipTitle, #tooltipUrl, #tooltipIcon', function() {
			$(this).find('.btn').remove();
		});


		// passing data to modal
		$(document).on('click', '#accessMenu', function() {
			let menuId = $(this).data('menu');
			$('#accessMenuId').val(menuId);
			<?php foreach ($this->menu->getAllRole() as $r) : ?>
				$.ajax({
					url: "<?= base_url('admin/accessCheckFromAjax') ?>",
					type: "POST",
					data: {
						menuId: menuId,
						roleId: <?= $r['id'] ?>
					},
					success: function(result) {
						if (result) {
							$('#accessCheckbox<?= $r['id'] ?>').attr('checked', 'checked');
						}
					}
				});
			<?php endforeach; ?>
		});
		$(document).on('click', '#accessMenuButtonClose', function() {
			<?php foreach ($this->menu->getAllRole() as $r) : ?>
				$('#accessCheckbox<?= $r['id'] ?>').removeAttr('checked');
			<?php endforeach; ?>
		});
		$(document).on('click', '#deleteMenu', function() {
			let menuId = $(this).data('id');
			let menu = $(this).data('menu');
			$('#deleteMenuModal #deleteAlertMenu').text(menu);
			$('#deleteMenuModal #deleteMenuButton').attr('href', '<?= base_url('admin/deleteMenu/') ?>' + menuId);
		});
		$(document).on('click', '#deleteSubmenu', function() {
			let submenuId = $(this).data('id');
			let submenu = $(this).data('submenu');
			$('#deleteSubmenuModal #deleteAlertSubmenu').text(submenu);
			$('#deleteSubmenuModal #deleteSubmenuButton').attr('href', '<?= base_url('admin/deleteSubmenu/') ?>' + submenuId);
		});
		$(document).on('click', '#passToAddMenuId', function() {
			let menuId = $(this).data('id');
			$('#newSubmenuModal #addMenuId').val(menuId);
		});
		$(document).on('click', '#editMenu', function() {
			let menuId = $(this).data('menu');
			$('#editMenuModal #editMenuId').val(menuId);
			$.ajax({
				url: "<?= base_url('admin/getDataforEditMenu/menu') ?>",
				type: "POST",
				data: {
					menu: menuId
				},
				success: function(result) {
					$('#editMenuModal #editMenuTitle').val(result);
				}
			});
		});

		// add new menu modal form
		$(document).on('click', '#addNewMenuForm', function() {
			let menu = $('#menu').val();
			$.ajax({
				url: "<?= base_url('admin/addNewMenu') ?>",
				type: "post",
				data: {
					menu: menu
				},
				success: function() {
					document.location.href = "<?= base_url('admin/menuSuccess/' . 'menu berhasil ditambahkan'); ?>";
				}
			});
		});
		// access menu modal form
		$(document).on('click', '#accessMenuButton', function() {
			menuId = $('#accessMenuId').val();
			roleData = '';
			<?php foreach ($this->menu->getAllRole() as $r) : ?>
				if ($('#accessCheckbox<?= $r['id'] ?>').is(':checked')) {
					roleData += "1";
				} else {
					roleData += "0";
				}
			<?php endforeach; ?>

			console.log(roleData);
			$.ajax({
				url: "<?= base_url('admin/accessMenu') ?>",
				type: "post",
				data: {
					roleData: roleData,
					menuId: menuId
				},
				success: function(result) {
					document.location.href = "<?= base_url('admin/MenuSuccess/' . 'user access menu berhasil diedit'); ?>";
				}
			});
		});
		// edit menu modal form
		$(document).on('click', '#editMenuForm', function() {
			let menuId = $('#editMenuId').val();
			let menuTitle = $('#editMenuTitle').val();
			$.ajax({
				url: "<?= base_url('admin/editMenu') ?>",
				type: "POST",
				data: {
					menuId: menuId,
					menuTitle: menuTitle
				},
				success: function(result) {
					document.location.href = "<?= base_url('admin/MenuSuccess/' . 'menu berhasil diedit'); ?>";
				}
			});
		});
		// add new submenu modal form
		$(document).on('click', '#addNewSubmenuForm', function() {
			let menuId = $('#addMenuId').val();
			let submenu = $('#addSubmenu').val();
			let url = $('#addUrl').val();
			let icon = $('#addIcon').val();
			$.ajax({
				url: "<?= base_url('admin/addNewSubmenu') ?>",
				type: "post",
				data: {
					menu: menuId,
					submenu: submenu,
					url: url,
					icon: icon
				},
				success: function() {
					document.location.href = "<?= base_url('admin/menuSuccess/' . 'submenu berhasil ditambahkan'); ?>";
				}
			});
		});
		// edit submenu modal
		$(document).on('click', '#editSubmenuForm', function() {
			let submenuId = $('#editSubmenuId').val();
			let submenuTitle = $('#editSubmenuTitle').val();
			let submenuUrl = $('#editSubmenuUrl').val();
			let submenuIcon = $('#editSubmenuIcon').val();
			$.ajax({
				url: "<?= base_url('admin/editSubmenu') ?>",
				type: "POST",
				data: {
					submenuId: submenuId,
					submenuTitle: submenuTitle,
					submenuUrl: submenuUrl,
					submenuIcon: submenuIcon
				},
				success: function() {
					document.location.href = "<?= base_url('admin/menuSuccess/' . 'submenu berhasil diedit'); ?>";
				}
			});
		});

		//collapse
		$(document).on('click', '#menuTable2', function() {
			$('#menuTable1').collapse();
		});
	});
</script>

</body>

</html>
