<!DOCTYPE html>
<html lang="en" style="--theme-deafult:#00b9f2;">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="pixelstrap">
	<link rel="icon" href="<?= base_url('template/') ?>assets/images/logo/logo.png" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url('template/') ?>assets/images/logo/logo.png" type="image/x-icon">
	<title>Forum Puspa</title>
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/icofont.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/themify.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/flag-icon.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/feather-icon.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/chartist.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/date-picker.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/style.css">
	<link id="color" rel="stylesheet" href="<?= base_url('template/'); ?>assets/css/color-1.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/datatables.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('template/'); ?>assets/css/vendors/select2.css">

</head>

<body onload="startTime()">
	<!-- <div class="loader-wrapper">
		<div class="loader-index"><span></span></div>
		<svg>
			<defs></defs>
			<filter id="goo">
				<fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
				<fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
			</filter>
		</svg>
	</div> -->
	<div class="tap-top"><i data-feather="chevrons-up"></i></div>
	<div class="page-wrapper horizontal-wrapper material-type" id="pageWrapper">
		<div class="page-header">
			<div class="header-wrapper row m-0">
				<div class="header-logo-wrapper col-auto p-0" style="width: 70px;">
					<div class="logo-wrapper">
						<a href="<?= base_url() ?>">
							<img class="img-fluid" src="<?= base_url('template/'); ?>assets/images/logo/logo.png" width="50" alt="">
						</a>
					</div>
					<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
				</div>
				<div class="left-header col horizontal-wrapper ps-0 pt-2" style="white-space: nowrap;">
					<h4 style="color:#00b9f2;" class="d-xs-none">Forum Puspa</h4>
					<style>
						@media only screen and (max-width:576px) {
							.d-xs-none {
								display: none !important;
							}
						}
					</style>
				</div>
				<div class="nav-right col-8 pull-right right-header p-0">
					<ul class="nav-menus">
						<li class="onhover-dropdown me-3">
							<div class="notification-box"><i data-feather="message-square"> </i><span class="badge rounded-pill badge-secondary">4 </span></div>
							<div class="chat-dropdown onhover-show-div">
								<h6 class="f-18 mb-0 dropdown-title">Messages</h6>
								<ul class="py-0">
									<li>
										<div class="media"><img class="img-fluid b-r-5 me-2" src="<?= base_url('template/'); ?>assets/images/user/1.jpg" alt="">
											<div class="media-body">
												<h6>Teressa</h6>
												<p>Reference site about Lorem Ipsum, give information on its origins.</p>
												<p class="f-8 font-primary mb-0">3 hours ago</p>
											</div><span class="badge rounded-circle badge-primary">2</span>
										</div>
									</li>
									<li>
										<div class="media"><img class="img-fluid b-r-5 me-2" src="<?= base_url('template/'); ?>assets/images/user/2.jpg" alt="">
											<div class="media-body">
												<h6>Kori Thomas</h6>
												<p>Lorem Ipsum is simply dummy give information on its origins....</p>
												<p class="f-8 font-primary mb-0">1 hr ago</p>
											</div><span class="badge rounded-circle badge-primary">2</span>
										</div>
									</li>
									<li>
										<div class="media"><img class="img-fluid b-r-5 me-2" src="<?= base_url('template/'); ?>assets/images/user/14.png" alt="">
											<div class="media-body">
												<h6>Ain Chavez</h6>
												<p>Lorem Ipsum is simply dummy...</p>
												<p class="f-8 font-primary mb-0">32 mins ago</p>
											</div><span class="badge rounded-circle badge-primary">2</span>
										</div>
									</li>
									<li class="text-center"> <a class="f-w-700" href="#">View All </a></li>
								</ul>
							</div>
						</li>
						<li class="onhover-dropdown p-0 me-0">
							<div class="media profile-media"><img class="b-r-10" src="<?= $this->mview->logouser($this->session->mitra_id); ?>" alt="" width="30" height="30">
								<div class="media-body"><span><?= $this->session->email; ?></span>
									<p class="mb-0 font-roboto"><?= $this->session->roles; ?> <i class="middle fa fa-angle-down"></i></p>
								</div>
							</div>
							<ul class="profile-dropdown onhover-show-div">
								<li>
									<a href="<?= base_url('welcome/myprofile/') ?>">
										<i data-feather="user"></i>
										<span style="text-transform: none!important;">Profil </span>
									</a>
								</li>
								<li>
									<a href="<?= base_url('login/logout') ?>">
										<i data-feather="log-out"></i>
										<span style="text-transform: none!important;">Log Out</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="page-body-wrapper">