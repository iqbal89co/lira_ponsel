<!-- Bootstrap core JavaScript-->
<script src="<?= base_url("assets/") ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url("assets/") ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url("assets/") ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url("assets/") ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url("assets/") ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url("assets/") ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url("assets/") ?>js/demo/chart-pie-demo.js"></script>

<script>
	$(document).ready(function() {

		$(document).on('mouseenter', '#tooltipTitle', function() {
			submenuId = $(this).data('submenu');
			$(this).append('<a id="passSubmenuData" data-toggle="modal" data-target="#editSubmenuModal" class="btn btn-hover btn-warning py-0 px-1 mx-2"><i class="fas fa-fw fa-edit"></i></a>');
			$(this).append('<a id="deleteSubmenu" data-id="' + submenuId + '" data-toggle="modal" data-target="#deleteSubmenuModal" class="btn btn-hover btn-danger py-0 px-1 mx-2"><i class="fas fa-fw fa-trash-alt"></i></a>');
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
			$(this).append('<a id="passSubmenuData" data-toggle="modal" data-target="#editSubmenuModal" class="btn btn-hover btn-warning py-0 px-1 mx-2"><i class="fas fa-fw fa-edit"></i></a>');
			$(this).append('<a id="deleteSubmenu" data-id="' + submenuId + '" data-toggle="modal" data-target="#deleteSubmenuModal" class="btn btn-hover btn-danger py-0 px-1 mx-2"><i class="fas fa-fw fa-trash-alt"></i></a>');
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
			$(this).append('<a id="passSubmenuData" data-toggle="modal" data-target="#editSubmenuModal" class="btn btn-hover btn-warning py-0 px-1 mx-2"><i class="fas fa-fw fa-edit"></i></a>');
			$(this).append('<a id="deleteSubmenu" data-id="' + submenuId + '" data-toggle="modal" data-target="#deleteSubmenuModal" class="btn btn-hover btn-danger py-0 px-1 mx-2"><i class="fas fa-fw fa-trash-alt"></i></a>');
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

		//stuck
		$(document).on('click', '#subMenuSwitch', function() {
			let submenuId = $(this).data('submenu');
			$.ajax({
				url: "<?= base_url('admin/switchActiveSubMenu'); ?>",
				type: 'POST',
				data: {
					submenuId: submenuId
				},
				success: function() {
					document.location.href = "<?= base_url('admin/menu'); ?>";
				}
			});
		});
	})
</script>

</body>

</html>
