<!-- Begin Page Content -->
<div class="container-fluid">

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
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Menu</th>
						<th scope="col">Action</th>
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
								<a href="<?= base_url('manage/edit/') . $m['id']; ?>" class="badge bg-success text-light editMenu">edit</a>
								<a href="" class="badge bg-danger text-light deleteMenu" data-toggle="modal" data-target="#deleteMenuModal" data-menu="<?= $m['id'] ?>">delete</a>
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


<!-- Modal create -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Enter the name of the menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php base_url('admin/menu'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="editMenu" action="<?php base_url('admin/editMenu'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input id="editMenuId" type="text" hidden readonly>
						<input type="text" class="form-control" id="editMenuTitle" name="editMenuTitle" placeholder="Menu title">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal delete -->
<div class="modal fade" id="deleteMenuModal" tabindex="-1" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteMenuModalLabel">Are you sure want to delete<span class="deleteAlert"></span>?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a id="deleteMenuButton" class="btn btn-info">Delete</a>
			</div>
		</div>
	</div>
</div>
<!-- 
<script>
	$(document).on("click", ".deleteMenu", function() {
		var menuId = $(this).data('menu');
		$("deleteMenuModal .modal-body .deleteAlert").text(menuId);
	});
</script> -->
