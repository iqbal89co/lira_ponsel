<!-- Begin Page Content -->
<div class="container-fluid" style="height: 150vh;">

	<div class="card shadow mb-4" style="max-width: 900px; margin: 0 auto; /* Added */
	float: none; /* Added */
	margin-bottom: 10px;">
		<div class="card-header py-3 text-center">
			<h6 class="m-0 font-weight-bold text-info"><?= $title ?></h6>
		</div>
		<div class="card-body text-center">
			<?= form_error(
				'menu',
				'<div class="alert alert-danger" role="alert">',
				'</div>'
			); ?>
			<?= $this->session->flashdata('message'); ?>
			<button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</button>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Menu</th>
						<th scope="col">Action</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					foreach ($menu as $m) :
					?>
						<tr>
							<th scope="row"><?= $i ?></th>
							<td><?= $m['menu'] ?></td>
							<td>
								<a id="accessMenu" href="" class="badge bg-warning text-light" data-toggle="modal" data-target="#accessMenuModal" data-menu="<?= $m['id'] ?>">access</a>
								<a id="editMenu" href="" class="badge bg-success text-light" data-toggle="modal" data-target="#editMenuModal" data-menu="<?= $m['id'] ?>">edit</a>
								<a href="" id="deleteMenu" class="badge bg-danger text-light" data-toggle="modal" data-target="#deleteMenuModal" data-menu="<?= $m['menu'] ?>" data-id="<?= $m['id'] ?>">delete</a>
							</td>
							<td><a data-toggle="collapse" id="menuTable<?= $m['id'] ?>" data-menu="<?= $m['id'] ?>" data-target=".menuTable<?= $m['id'] ?>"><i class="fas fa-plus-circle"></i></a></td>
						</tr>
						<tr>
							<td colspan="999">
								<div class="collapse menuTable<?= $m['id'] ?>">
									<button type="button" id="passToAddMenuId" class="float-right btn btn-primary" data-toggle="modal" data-target="#newSubmenuModal" data-id="<?= $m['id'] ?>">tambah submenu baru</button>
									<table class="table table-striped table-dark w-100">
										<thead>
											<tr>
												<th>Nama submenu</th>
												<th>URL</th>
												<th>icon</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$submenu = $this->menu->manageSubMenu($m['id']);
											foreach ($submenu as $sm) :
											?>
												<tr>
													<td><a id="tooltipTitle" data-menu="<?= $sm['id'] ?>" data-submenu="<?= $sm['submenuId'] ?>"><?= $sm['title'] ?></a></td>
													<td><a id="tooltipUrl" data-menu="<?= $sm['id'] ?>" data-submenu="<?= $sm['submenuId'] ?>"><?= $sm['url'] ?></a></td>
													<td><a id="tooltipIcon" data-menu="<?= $sm['id'] ?>" data-submenu="<?= $sm['submenuId'] ?>"><?= $sm['icon'] ?></a></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
					<?php
						$i++;
					endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>



</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->


<!-- Modal create menu -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Masukkan nama menu yang ingin ditambahkan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="menu" placeholder="Nama menu" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="addNewMenuForm" type="button" class="btn btn-info">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal create submenu -->
<div class="modal fade" id="newSubmenuModal" tabindex="-1" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubmenuModalLabel">Masukkan data submenu yang ingin ditambahkan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="number" id="addMenuId" hidden disabled required>
					<input type="text" class="form-control my-2" id="addSubmenu" placeholder="Nama submenu" required>
					<input type="text" class="form-control my-2" id="addUrl" placeholder="url" required>
					<input type="text" class="form-control my-2" id="addIcon" placeholder="icon" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="addNewSubmenuForm" type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal edit Menu -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input id="editMenuId" type="text" hidden disabled>
					<label for="editMenuTitle">Nama Menu</label>
					<input type="text" class="form-control" id="editMenuTitle" name="editMenuTitle" placeholder="Menu title" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="editMenuForm" type="button" class="btn btn-info">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal delete Menu -->
<div class="modal fade" id="deleteMenuModal" tabindex="-1" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteMenuModalLabel">Are you sure want to delete <span id="deleteAlertMenu"></span> menu?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="" id="deleteMenuButton" class="btn btn-info">Delete</a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Acccess Menu -->
<div class="modal fade" id="accessMenuModal" tabindex="-1" aria-labelledby="accessMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="accessMenuModalLabel">Pilih user yang dapat mengakses menu <span id="accessAlertMenu"></span>!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input id="accessMenuId" type="text" hidden disabled>
				<?php foreach ($this->menu->getAllRole() as $r) : ?>
					<div class="form-check">
						<input id="accessCheckbox<?= $r['id'] ?>" class="form-check-input" type="checkbox">
						<span><?= $r['role'] ?></span>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="modal-footer">
				<button id="accessMenuButtonClose" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="accessMenuButton" type="button" class="btn btn-info">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit Submenu -->
<div class="modal fade" id="editSubmenuModal" tabindex="-1" aria-labelledby="editSubmenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editSubmenuModalLabel">Edit Submenu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="number" id="editSubmenuId" hidden disabled required>
					<label for="submenu">Nama Submenu</label>
					<input type="text" class="form-control my-2" id="editSubmenuTitle" placeholder="Nama submenu" required>
					<label for="submenu">URL Submenu</label>
					<input type="text" class="form-control my-2" id="editSubmenuUrl" placeholder="URL submenu" required>
					<label for="submenu">Icon Submenu</label>
					<input type="text" class="form-control my-2" id="editSubmenuIcon" placeholder="Icon submenu" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="editSubmenuForm" type="button" class="btn btn-info">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal delete Submenu -->
<div class="modal fade" id="deleteSubmenuModal" tabindex="-1" aria-labelledby="deleteSubmenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteSubmenuModalLabel">Are you sure want to delete <span id="deleteAlertSubmenu"></span> submenu?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a href="" id="deleteSubmenuButton" class="btn btn-info">Delete</a>
			</div>
		</div>
	</div>
</div>

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
