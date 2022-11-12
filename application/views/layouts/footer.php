<div class="row mt-4">
	<div class="col-12">
		<div class="card profile-greeting mb-0" style="border-radius: 0px!important;">
			<div class="card-body py-3">
				<div class="media">
					<div class="media-body">
						<div class="greeting-user" style="text-align: center;">
							<h6>IKUTI KAMI</h6>
							<ul class="list-inline">
								<li class="list-inline-item"><a href="https://www.facebook.com/kppdanpa/" target="_blank"><i class="fa fa-2x fa-facebook"></i></a></li>
								<li class="list-inline-item"><a href="https://youtube.com/c/KemenPPPARI" target="_blank"><i class="fa fa-2x fa-youtube"></i></a></li>
								<li class="list-inline-item"><a href="https://twitter.com/kpp_pa" target="_blank"><i class="fa fa-2x fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="https://www.instagram.com/kemenpppa/" target="_blank"><i class="fa fa-2x fa-instagram"></i></a></li>
								<li class="list-inline-item"><a href="https://www.kemenpppa.go.id/index.php/rss" target="_blank"><i class="fa fa-2x fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer mt-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 footer-copyright text-center">
				<p class="mb-0">Copyright © 2022 Kementerian Pemberdayaan Perempuan Dan Perlindungan Anak</p>
			</div>
		</div>
	</div>
</footer>
</div>
</div>
<script src="<?= base_url('template/'); ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/scrollbar/simplebar.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/scrollbar/custom.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/config.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/sidebar-menu.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/chart/chartist/chartist.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/chart/knob/knob.min.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/chart/knob/knob-chart.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/chart/apex-chart/apex-chart.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/chart/apex-chart/stock-prices.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/notify/bootstrap-notify.min.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/dashboard/default.js"></script>
<!-- <script src="<?= base_url('template/'); ?>assets/js/notify/index.js"></script> -->
<script src="<?= base_url('template/'); ?>assets/js/datepicker/date-picker/datepicker.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/typeahead/handlebars.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/typeahead/typeahead.bundle.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/typeahead/typeahead.custom.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/typeahead-search/handlebars.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/typeahead-search/typeahead-custom.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/script.js"></script>

<script src="<?= base_url('template/'); ?>assets/js/select2/select2.full.min.js"></script>
<!-- <script src="<?= base_url('template/'); ?>assets/js/select2/select2-custom.js"></script> -->

<script src="<?= base_url('template/'); ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('template/'); ?>assets/js/product-list-custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(".select2filter").select2({
		placeholder: "Pilih Data",
		allowClear: true
	});
</script>
<?php
if ($this->session->notif) {
	$icon = $this->session->notif['icon'];
	$title = $this->session->notif['title'];
	$pesan = $this->session->notif['pesan'];
?>
	<script>
		Swal.fire({
			icon: '<?= $icon ?>',
			title: '<?= $title ?>',
			text: '<?= $pesan ?>',
			showConfirmButton: false,
			timer: 1750
		})
	</script>
<?php
} else {
?>
	<script>
		var notify = $.notify('<i class="fa fa-bell-o"></i><strong>Loading</strong> page Do not close this page...', {
			type: 'theme',
			allow_dismiss: true,
			delay: 2000,
			showProgressbar: true,
			timer: 300,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			}
		});

		setTimeout(function() {
			notify.update('message', '<i class="fa fa-bell-o"></i><strong>Loading</strong> Inner Data.');
		}, 1000);
	</script>
<?php
}
?>
</body>

</html>