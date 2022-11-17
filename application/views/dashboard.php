<div class="container-fluid">
  <div class="row second-chart-list third-news-update">
    <?php if (in_array($this->session->role_id, [1,2]) AND $kelengkapan != 100) : ?>
      <div class="col-12 morning-sec">
        <div class="card profile-greeting">
          <div class="card-body py-3">
            <div class="project-status mt-0 pt-0">
              <?php
              if ($this->session->ver_akun == "off") {
                echo "<h5>Menunggu Verifikasi Admin</h5>";
              } else {
                ?>
                <div class="media mb-0">
                  <p><?= $kelengkapan ?> % </p>
                  <div class="media-body text-end"><span>Kelengkapan Profile</span></div>
                </div>
                <div class="progress" style="height: 5px">
                  <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: <?= $kelengkapan ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div class="col-xl-6 col-lg-12 xl-50 morning-sec">
      <div class="card profile-greeting">
        <div class="card-body pb-0">
          <div class="media">
            <div class="media-body">
              <div class="greeting-user">
                <h4 class="f-w-600 font-primary">Halo <?= ucwords($this->session->name ?? ''); ?> </h4>
                <p>Ayo Mulai Buat Hal Yang Luar Biasa</p>
              </div>
            </div>
            <div class="badge-groups">
              <div class="badge f-10"><i class="me-1" data-feather="clock"></i><span id="txt"></span></div>
            </div>
          </div>
          <div class="cartoon"><img class="img-fluid" src="<?= base_url('template/'); ?>assets/images/dashboard/cartoon.png" alt=""></div>

        </div>
      </div>
    </div>
    <div class="col-sm-6 row">
      <div class="col-md-6">
        <div class="card o-hidden static-top-widget-card">
          <div class="card-body">
            <div class="media static-top-widget">
              <div class="media-body">
                <h6 class="font-roboto">Jumlah Anggota<br>Forum</h6>
                <h4 class="mb-0 counter">9856</h4>
              </div>
              <i data-feather="book-open"></i>
            </div>
            <div class="progress-widget">
              <div class="progress sm-progress-bar progress-animate">
                <div class="progress-gradient-success" role="progressbar" style="width: 95%"><span class="animate-circle"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card o-hidden">
          <div class="card-body">
            <div class="media static-top-widget">
              <div class="media-body">
                <h6 class="font-roboto">Jumlah Kegiatan<br>&nbsp;</h6>
                <h4 class="mb-0 counter">893</h4>
              </div>
              <i data-feather="check-square"></i>
            </div>
            <div class="progress-widget">
              <div class="progress sm-progress-bar progress-animate">
                <div class="progress-gradient-primary" role="progressbar" style="width: 95%"><span class="animate-circle"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card o-hidden">
          <div class="card-body">
            <div class="media static-top-widget">
              <div class="media-body">
                <h6 class="font-roboto">Menunggu Verifikasi</h6>
                <h4 class="mb-0 counter">893</h4>
              </div>
              <i data-feather="check-square"></i>
            </div>
            <div class="progress-widget">
              <div class="progress sm-progress-bar progress-animate">
                <div class="progress-gradient-danger" role="progressbar" style="width: 95%"><span class="animate-circle"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>