<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body pt-3">
                    <div class="new-users-social">
                        <div class="media">
                            <?php
                            $logoforum = base_url('template/assets/images/logo/user1.png');
                            if ($qdetail->logoforum != "" and file_exists('berkas/logo/' . $qdetail->logoforum)) {
                                $logoforum = base_url('berkas/logo/' . $qdetail->logoforum);
                            }
                            ?>
                            <img class="rounded-circle image-radius m-r-15" src="<?= $logoforum ?>" alt="" style="width: 55px; height: 55px; object-fit: cover;">
                            <div class="media-body">
                                <h6 class="mb-0 f-w-700"><?= $qdetail->nama_lengkap ?></h6>
                                <p><?= $qdetail->nama_singkat ?> - <?= $qdetail->namaforum ?></p>
                            </div>
                            <?php
                            $tanggal = date("d", strtotime($qdetail->created_at));
                            $bulan = date("m", strtotime($qdetail->created_at));
                            $tahun = date("Y", strtotime($qdetail->created_at));
                            $waktu = date("H:i:s", strtotime($qdetail->created_at));
                            ?>
                            <span class="pull-right">
                                <p align="right"><?= $tanggal . " " . bulanindo[$bulan] . " " . $tahun . " " . "<br>" . $waktu ?></p>
                            </span>
                        </div>
                    </div>
                    <!-- <img class="img-fluid" alt="" src="<?= base_url('berkas/foto-kegiatan/' . $qdetail->foto) ?>"> -->
                    <div class="timeline-content">
                        <div class="row">

                            <div class="col-sm-auto mb-2">
                                <?php if ($qdetail->foto != "" and file_exists('berkas/foto-kegiatan/' . $qdetail->foto)) { ?>
                                    <img class="img-fluid" src="<?= base_url('berkas/foto-kegiatan/' . $qdetail->foto) ?>" alt="">
                                <?php } else { ?>
                                <?php } ?>
                            </div>
                            <?php $totalprogress = $newkegiatan->hitungprogress($qdetail->tahapan, $qdetail->persentase_progres) ?>
                            <div class="col-sm-7 mb-2">
                                <div class="blog-details">
                                    <h6>Deskripsi</h6>
                                    <div class="blog-bottom-content">
                                        <hr class="my-1">
                                        <p class="mt-0"><?= $qdetail->deskripsi ?></p>
                                    </div>
                                </div>
                                <div class="blog-details mt-4">
                                    <h6>Tahapan</h6>
                                    <hr class="my-1">
                                    <span style="font-weight: 500;">
                                        <?php
                                        $show = $this->menum->getDataDetail(["id" => $qdetail->status_tahapan]);
                                        echo $show->keterangan . " - ";
                                        echo $show->value;
                                        ?>
                                    </span>
                                    <div class="row details mt-2">
                                        <div class="col-6"><span>Perkembangan Tahapan</span></div>
                                        <div class="col-6" style="font-weight: 500;">: <?= $qdetail->persentase_progres ?>% </div>
                                        <div class="col-6"> <span>Total Progress</span></div>
                                        <div class="col-6" style="font-weight: 500;">: <?= $totalprogress ?>%</div>
                                    </div>
                                </div>
                                <div class="project-status mt-2">
                                    <div class="media mb-0">
                                        <p class="m-0"><?= $totalprogress ?> % </p>
                                        <div class="media-body text-end"><span>Selesai</span></div>
                                    </div>
                                    <div class="progress" style="height: 5px">
                                        <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: <?= $totalprogress ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="default-according style-1 faq-accordion job-accordion">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card mb-2">
                                            <div class="card-header p-0 bg-primary" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link text-white btn-block text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="icofont icofont-tasks-alt"></i>
                                                        Detail
                                                    </button>
                                                </h2>
                                            </div>
                                            <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="card-body filter-cards-view animate-chk">
                                                    <div class="row">
                                                        <style>
                                                            .labeldetail {
                                                                font-weight: 500;
                                                                background-color: #82ea56 !important;
                                                                padding: 10px;
                                                                margin-bottom: 0px;
                                                                border-top: 1px solid #ccc;
                                                                border-left: 1px solid #ccc;
                                                                border-right: 1px solid #ccc;
                                                            }

                                                            .garis {
                                                                border: 1px solid #ccc;
                                                                padding: 10px;
                                                            }
                                                        </style>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Jenis Kegiatan :</label><br>
                                                            <div class="col-12 garis">
                                                                <?php
                                                                $show = $this->menum->getDataDetail(["id" => $qdetail->jenis_kegiatan_id])->value;
                                                                echo $show;
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Sasaran :</label><br>
                                                            <div class="col-12 garis">
                                                                <ul class='list-group'>
                                                                    <?php
                                                                    foreach (json_decode($qdetail->sasaran) as $keyS => $valueS) {
                                                                        $show = $this->menum->getDataDetail(["id" => $valueS])->value;
                                                                        echo "<li class='list-group-item p-0' style='border:none'>- " . $show . "</li>";
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <label class="col-12 labeldetail">Tujuan dan Manfaat Kegiatan :</label><br>
                                                            <div class="col-12 garis">
                                                                <ul class='list-group'>
                                                                    <?php
                                                                    foreach (json_decode($qdetail->tujuan_dan_manfaat) as $keyS => $valueS) {
                                                                        $show = $this->menum->getDataDetail(["id" => $valueS])->value;
                                                                        echo "<li class='list-group-item p-0' style='border:none'>- " . $show . "</li>";
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Pihak yang terlibat :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->pihak_yang_terlibat ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Kebutuhan sumber daya :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->kebutuhan_sumberdaya ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Keterangan Status Kegiatan :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->keterangan_status_kegiatan ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Keunikan / Kreativitas :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->keunikan ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Potensi :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->potensi ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Analisis Risiko dan Mitigasi :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->analisis_resiko ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Strategi Menjaga Keberlangsungan :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->strategi_menjaga_keberlangsungan ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Indikator keberhasilan :</label><br>
                                                            <div class="col-12 garis">
                                                                <?= $qdetail->indikator_keberhasilan ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <label class="col-12 labeldetail">Lampiran :</label><br>
                                                            <div class="col-12 garis">
                                                                <?php if ($qdetail->lampiran != "" and file_exists('berkas/lampiran-kegiatan/' . $qdetail->lampiran)) { ?>
                                                                    <i class="fa fa-file-o me-1"></i> Lihat File
                                                                <?php } else {
                                                                    echo "Tidak Ada File";
                                                                } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="like-content">
                            <span>
                                &nbsp;
                            </span>
                            <span class="pull-right comment-number">
                                <span><?= count($totalkomentar) ?> </span>
                                <span><i class="fa fa-comments-o"></i></span>
                            </span>
                        </div>
                        <div class="social-chat" id="komentarall">
                            <?php foreach ($listkomentar as $keyLK => $valueLK) { ?>
                                <?php
                                $lamakomen = (time() - strtotime($valueLK->created_at));
                                $waktu = ceil($lamakomen / 60);
                                $lamakomen = $waktu . " Menit lalu";
                                if ($waktu >= 60) {
                                    $waktu = ceil($waktu / 60);
                                    $lamakomen = $waktu . " Jam lalu";
                                    if ($waktu >= 24) {
                                        $waktu = ceil($waktu / 24);
                                        $lamakomen = $waktu . " Hari lalu";
                                        if ($waktu >= 30) {
                                            $waktu = ceil($waktu / 30);
                                            $lamakomen = $waktu . " Bulan lalu";
                                            if ($waktu >= 12) {
                                                $waktu = ceil($waktu / 12);
                                                $lamakomen = $waktu . " Tahun lalu";
                                            }
                                        }
                                    }
                                }
                                if ($waktu == 0) {
                                    $lamakomen = "Baru";
                                }
                                ?>
                                <div class="your-msg mb-3" id="komentarnya<?= $valueLK->id ?>">
                                    <div class="media">
                                        <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="<?= $this->mview->logouser($valueLK->user_id); ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div class="media-body">
                                            <span class="f-w-600">
                                                <?= $valueLK->namaforum ?>
                                                <?php
                                                if (in_array($valueLK->role_id, [3])) {
                                                    echo "<small>(Pembina)</small>";
                                                }
                                                ?>
                                                <span data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="<?= $valueLK->created_at ?>">- <?= $lamakomen; ?></span>

                                                <?php
                                                if ($valueLK->created_at != $valueLK->updated_at) {
                                                    echo "<span>| Diubah</span>";
                                                }
                                                ?>
                                                <?php if ($valueLK->mitra_id == $this->session->mitra_id) { ?>
                                                    <div class="pull-right">
                                                        <ul class="list-unstyled card-option">
                                                            <li class="me-1">
                                                                <span data-bs-toggle="modal" data-bs-target="#modaledit<?= $valueLK->id ?>">
                                                                    <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah">
                                                                        <i class="icofont icofont-edit text-info"></i>
                                                                    </a>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span onclick="return confirm('Hapus komentar ini ?')">
                                                                    <a href="<?= base_url('kegiatan/hapuskomen/' . $valueLK->id . "/" . $valueLK->kegiatan_id) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus">
                                                                        <i class="icofont icofont-trash text-danger"></i>
                                                                    </a>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <?php } ?>
                                            </span>
                                            <p><?= $valueLK->komentar ?></p>
                                        </div>
                                    </div>
                                    <div class="media" style="margin-left:70px; margin-top:5px">
                                        <a href="javascript:;" class="me-2 btn-link" data-bs-toggle="modal" data-bs-target="#modalbalas<?= $valueLK->id ?>">
                                            <span>Balas</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="modal fade" id="modaledit<?= $valueLK->id ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Komentar</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('kegiatan/savekomen') ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="link" value="<?= uri_string() ?>">
                                                    <input type="hidden" name="id" value="<?= $valueLK->id ?>">
                                                    <input type="hidden" name="kegiatan_id" value="<?= $detailid ?>">
                                                    <input type="hidden" name="user_id" value="<?= $this->session->user_id ?>">
                                                    <input type="hidden" name="parent_id" value="0">
                                                    <input class="form-control" type="text" name="komentar" placeholder="Masukan Komentar" value="<?= $valueLK->komentar ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript:;" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalbalas<?= $valueLK->id ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Komentar</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('kegiatan/savekomen') ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="link" value="<?= uri_string() ?>">
                                                    <input type="hidden" name="kegiatan_id" value="<?= $detailid ?>">
                                                    <input type="hidden" name="user_id" value="<?= $this->session->user_id ?>">
                                                    <input type="hidden" name="parent_id" value="<?= $valueLK->id ?>">
                                                    <input class="form-control" type="text" name="komentar" placeholder="Masukan Komentar" value="">
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript:;" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php $listkomentarsub = $this->mkegiatan->getDataKomentar($detailid, $valueLK->id); ?>
                                <?php if ($listkomentarsub != FALSE) {   ?>
                                    <?php foreach ($listkomentarsub as $keyLKS => $valueLKS) { ?>
                                        <?php
                                        $lamakomen = (time() - strtotime($valueLKS->created_at));
                                        $waktu = ceil($lamakomen / 60);
                                        $lamakomen = $waktu . " Menit lalu";
                                        if ($waktu >= 60) {
                                            $waktu = ceil($waktu / 60);
                                            $lamakomen = $waktu . " Jam lalu";
                                            if ($waktu >= 24) {
                                                $waktu = ceil($waktu / 24);
                                                $lamakomen = $waktu . " Hari lalu";
                                                if ($waktu >= 30) {
                                                    $waktu = ceil($waktu / 30);
                                                    $lamakomen = $waktu . " Bulan lalu";
                                                    if ($waktu >= 12) {
                                                        $waktu = ceil($waktu / 12);
                                                        $lamakomen = $waktu . " Tahun lalu";
                                                    }
                                                }
                                            }
                                        }
                                        if ($waktu == 0) {
                                            $lamakomen = "Baru";
                                        }
                                        ?>
                                        <div class="other-msg mb-3">
                                            <div class="media">
                                                <img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="<?= $this->mview->logouser($valueLKS->user_id); ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                                <div class="media-body">
                                                    <span class="f-w-600">
                                                        <?= $valueLKS->namaforum ?>
                                                        <?php
                                                        if (in_array($valueLKS->role_id, [3])) {
                                                            echo "<small>(Pembina)</small>";
                                                        }
                                                        ?>
                                                        <span data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="<?= $valueLKS->created_at ?>">- <?= $lamakomen; ?></span>

                                                        <?php
                                                        if ($valueLKS->created_at != $valueLKS->updated_at) {
                                                            echo "<span>| Diubah</span>";
                                                        }
                                                        ?>
                                                        <div class="pull-right">
                                                            <?php if ($valueLKS->mitra_id == $this->session->mitra_id) { ?>
                                                                <ul class="list-unstyled card-option">
                                                                    <li class="me-1">
                                                                        <span data-bs-toggle="modal" data-bs-target="#modaledit<?= $valueLKS->id ?>">
                                                                            <a href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Ubah">
                                                                                <i class="icofont icofont-edit text-info"></i>
                                                                            </a>
                                                                        </span>
                                                                    </li>
                                                                    <li>
                                                                        <span onclick="return confirm('Hapus komentar ini ?')">
                                                                            <a href="<?= base_url('kegiatan/hapuskomen/' . $valueLKS->id . "/" . $valueLKS->kegiatan_id) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus">
                                                                                <i class="icofont icofont-trash text-danger"></i>
                                                                            </a>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            <?php } ?>
                                                        </div>
                                                    </span>
                                                    <p><?= $valueLKS->komentar ?> </p>
                                                </div>
                                            </div>
                                            <div class="media" style="margin-left:70px; margin-top:5px">
                                                <a href="javascript:;" class="me-2 btn-link" data-bs-toggle="modal" data-bs-target="#modalbalas<?= $valueLKS->id ?>">
                                                    <span>Balas</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modaledit<?= $valueLKS->id ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Komentar</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('kegiatan/savekomen') ?>" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="link" value="<?= uri_string() ?>">
                                                            <input type="hidden" name="id" value="<?= $valueLKS->id ?>">
                                                            <input type="hidden" name="kegiatan_id" value="<?= $detailid ?>">
                                                            <input type="hidden" name="user_id" value="<?= $this->session->user_id ?>">
                                                            <input type="hidden" name="parent_id" value="<?= $valueLK->id ?>">
                                                            <input class="form-control" type="text" name="komentar" placeholder="Masukan Komentar" value="<?= $valueLKS->komentar ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript:;" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalbalas<?= $valueLKS->id ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Komentar</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('kegiatan/savekomen') ?>" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="link" value="<?= uri_string() ?>">
                                                            <input type="hidden" name="kegiatan_id" value="<?= $detailid ?>">
                                                            <input type="hidden" name="user_id" value="<?= $this->session->user_id ?>">
                                                            <input type="hidden" name="parent_id" value="<?= $valueLK->id ?>">
                                                            <input class="form-control" type="text" name="komentar" placeholder="Masukan Komentar" value="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="javascript:;" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <?php
                        if (!in_array($this->session->role_id, [1])) {
                        ?>
                            <div class="comments-box">
                                <form action="<?= base_url('kegiatan/savekomen') ?>" method="post">
                                    <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="<?= $this->mview->logouser($this->session->user_id); ?>" style="width: 50px; height: 50px;">
                                        <div class="media-body">
                                            <div class="input-group text-box">
                                                <input type="hidden" name="link" value="<?= uri_string() ?>">
                                                <input type="hidden" name="kegiatan_id" value="<?= $detailid ?>">
                                                <input type="hidden" name="user_id" value="<?= $this->session->user_id ?>">
                                                <input type="hidden" name="parent_id" value="0">
                                                <input class="form-control" type="text" name="komentar" placeholder="Masukan Komentar" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                                <button type="submit" class="input-group-text"><i data-feather="send" class="p-1"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>