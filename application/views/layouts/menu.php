<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?= base_url() ?>">
				<img class="img-fluid for-light" src="<?= base_url('template/'); ?>assets/images/logo/logo.png" width="35px" alt="">
			</a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url('template/'); ?>assets/images/logo/logo-icon.png" alt=""></a></div>
		<nav class="sidebar-main">
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?= base_url('template/'); ?>assets/images/logo/logo-icon.png" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">General</h6>
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('welcome') ?>"><i data-feather="home"></i><span>Dashboard</span></a></li>
					<?php if ($this->session->role_id == 0) : ?>
						<li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="database"></i><span>Data Master</span></a>
							<ul class="sidebar-submenu">
								<li><a href="<?= base_url('master/user') ?>">User</a></li>
								<li><a href="<?= base_url('master/mitra') ?>">Mitra</a></li>
							</ul>
						</li>
					<?php endif; ?>
					<?php if ($this->session->role_id != 2) : ?>
						<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('anggota') ?>"><i data-feather="users"></i><span>Anggota Forum</span></a></li>
					<?php endif; ?>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('kegiatan') ?>"><i data-feather="check-square"></i><span>Kegiatan</span></a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>