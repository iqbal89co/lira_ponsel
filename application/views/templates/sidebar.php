<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-store"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Lira Ponsel</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<?php
	$menu = $this->menu->getMenu($user['role_id']);
	foreach ($menu as $m) : ?>
		<!-- Heading -->
		<div class="sidebar-heading">
			<?= $m['menu'] ?>
		</div>

		<?php
		$subMenu = $this->menu->getSubMenu($m['id']);
		foreach ($subMenu as $sm) :
			if ($sm['is_active'] == 1) {
		?>
				<!-- Nav Item - Dashboard -->
				<?php if ($title == $sm['title']) : ?>
					<li class="nav-item active">
					<?php else : ?>
					<li class="nav-item">
					<?php endif; ?>
					<a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
						<i class="fa-fw <?= $sm['icon'] ?>"></i>
						<span><?= $sm['title'] ?></span>
					</a>
					</li>

			<?php
			}
		endforeach;
			?>

			<!-- Divider -->
			<hr class="sidebar-divider mt-3">

		<?php endforeach; ?>


		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>


</ul>
<!-- End of Sidebar -->
