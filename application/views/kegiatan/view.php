<div class="container-fluid">
    <div class="row project-cards">
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row">
                    <div class="col-md-9">
                        <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-semua-tab" data-bs-toggle="tab" href="#top-semua" role="tab" aria-controls="top-semua" aria-selected="true"><i data-feather="target"></i>Semua</a></li>
                            <li class="nav-item"><a class="nav-link" id="tahap1-top-tab" data-bs-toggle="tab" href="#top-tahap1" role="tab" aria-controls="top-tahap1" aria-selected="false"><i data-feather="check-circle"></i>Tahap 1</a></li>
                            <li class="nav-item"><a class="nav-link" id="tahap2-top-tab" data-bs-toggle="tab" href="#top-tahap2" role="tab" aria-controls="top-tahap2" aria-selected="false"><i data-feather="check-circle"></i>Tahap 2</a></li>
                            <li class="nav-item"><a class="nav-link" id="tahap3-top-tab" data-bs-toggle="tab" href="#top-tahap3" role="tab" aria-controls="top-tahap3" aria-selected="false"><i data-feather="check-circle"></i>Tahap 3</a></li>
                            <li class="nav-item"><a class="nav-link" id="tahap4-top-tab" data-bs-toggle="tab" href="#top-tahap4" role="tab" aria-controls="top-tahap4" aria-selected="false"><i data-feather="check-circle"></i>Tahap 4</a></li>
                            <li class="nav-item"><a class="nav-link" id="tahap5-top-tab" data-bs-toggle="tab" href="#top-tahap5" role="tab" aria-controls="top-tahap5" aria-selected="false"><i data-feather="check-circle"></i>Tahap 5</a></li>
                            <li class="nav-item"><a class="nav-link" id="tahap6-top-tab" data-bs-toggle="tab" href="#top-tahap6" role="tab" aria-controls="top-tahap6" aria-selected="false"><i data-feather="check-circle"></i>Tahap 6</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="<?= base_url('kegiatan/crud') ?>"> <i data-feather="plus-square"> </i>Tambah Kegiatan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col">
                    <div class="default-according style-1 faq-accordion job-accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Pencarian Data</button>
                                    </h2>
                                </div>
                                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <form method="get">
                                        <div class="card-body filter-cards-view animate-chk">
                                            <div class="row">
                                                <div class="job-filter col-md-4 mb-3">
                                                    <div class="faq-form">
                                                        <div class="col-form-label">Kata Kunci</div>
                                                        <input type="text" class="form-control" placeholder="Kata Kunci" style="border: 1px solid #aaa; padding: 0.55rem 0.75rem;">
                                                    </div>
                                                </div>
                                                <div class="job-filter col-md-4 mb-3">
                                                    <div class="faq-form">
                                                        <div class="col-form-label">Tahapan</div>
                                                        <select name="tahapan" class="select2filter col-sm-12">
                                                            <option value></option>
                                                            <?php
                                                            foreach ($newenum->getData("tahapan") as $keyL => $valueL) {
                                                                echo "<option value='" . $valueL->id . "'";
                                                                if ($this->input->get('tahapan') == $valueL->id) {
                                                                    echo " selected";
                                                                }
                                                                echo ">" . $valueL->value . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="job-filter col-md-4 mb-3">
                                                    <div class="faq-form">
                                                        <div class="col-form-label">Jenis Kegiatan</div>
                                                        <select name="jenis_kegiatan" class="select2filter col-sm-12">
                                                            <option value></option>
                                                            <?php
                                                            foreach ($newenum->getData("jenis kegiatan") as $keyL => $valueL) {
                                                                echo "<option value='" . $valueL->id . "'";
                                                                if ($this->input->get('jenis_kegiatan') == $valueL->id) {
                                                                    echo " selected";
                                                                }
                                                                echo ">" . $valueL->value . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="job-filter col-md-4 mb-3">
                                                    <div class="faq-form">
                                                        <div class="col-form-label">Sasaran Kegiatan</div>
                                                        <select name="sasaran_kegiatan" class="select2filter col-sm-12">
                                                            <option value></option>
                                                            <?php
                                                            foreach ($newenum->getData("sasaran kegiatan") as $keyL => $valueL) {
                                                                echo "<option value='" . $valueL->id . "'";
                                                                if ($this->input->get('sasaran_kegiatan') == $valueL->id) {
                                                                    echo " selected";
                                                                }
                                                                echo ">" . $valueL->value . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="job-filter col-md-4 mb-3">
                                                    <div class="faq-form">
                                                        <div class="col-form-label">Jenis Anggota Forum</div>
                                                        <select name="jenis_anggota" class="select2filter col-sm-12">
                                                            <option value></option>
                                                            <?php
                                                            foreach ($newenum->getData("jenis entitas") as $keyL => $valueL) {
                                                                echo "<option value='" . $valueL->id . "'";
                                                                if ($this->input->get('jenis_anggota') == $valueL->id) {
                                                                    echo " selected";
                                                                }
                                                                echo ">" . $valueL->value . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="job-filter col-md-4 mb-3">
                                                    <div class="faq-form">
                                                        <div class="col-form-label">Tujuan Kegiatan</div>
                                                        <select name="tujuan_kegiatan" class="select2filter col-sm-12">
                                                            <option value></option>
                                                            <?php
                                                            foreach ($newenum->getData("tujuan Kegiatan") as $keyL => $valueL) {
                                                                echo "<option value='" . $valueL->id . "'";
                                                                if ($this->input->get('tujuan_kegiatan') == $valueL->id) {
                                                                    echo " selected";
                                                                }
                                                                echo ">" . $valueL->value . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer p-0 row pt-3">
                                                <div>
                                                    <a type="submit" class="btn btn-danger pull-right text-center col-auto ms-2">Reset</a>
                                                    <input type="submit" class="btn btn-primary pull-right text-center col-auto">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-semua" role="tabpanel" aria-labelledby="top-semua-tab">
                        <div class="row">
                            <?php
                            $where = $wherelist;
                            ?>
                            <?php foreach ($newkegiatan->getDataNew($where) as $keyNK => $valueNK) { ?>
                                <?php $totalprogress = $newkegiatan->hitungprogress($valueNK->tahapan, $valueNK->persentase_progres) ?>
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box"><span class="badge badge-primary">Tahap <?= $valueNK->tahapan ?></span>
                                        <h6 class='mt-3 mb-0'><?= $valueNK->nama_lengkap ?></h6>
                                        <div class="media">
                                            <div class="media-body">
                                                <p>
                                                    <?= $valueNK->namaforum ?> - <?= $valueNK->level ?>
                                                </p>
                                            </div>
                                        </div>
                                        <p></p>
                                        <div class="row details">
                                            <div class="col-8"><span>Perkembangan Tahapan</span></div>
                                            <div class="col-4 text-primary"> <?= $valueNK->persentase_progres ?>% </div>
                                            <div class="col-8"> <span>Total Progress</span></div>
                                            <div class="col-4 text-primary"> <?= $totalprogress ?>%</div>
                                            <div class="col-8"> <span>Komentar</span></div>
                                            <?php
                                            $totalkomentar = $this->mkegiatan->getDataKomentar($valueNK->id, "total");
                                            ?>
                                            <div class="col-4 text-primary"><?= count($totalkomentar) ?></div>
                                        </div>
                                        <div>
                                            <a class="btn btn-info btn-sm" href="<?= base_url('kegiatan/detail/') . $valueNK->id ?>">Lihat</a>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url('kegiatan/crud/') . $valueNK->id ?>"></i>Ubah</a>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('kegiatan/delete/') . $valueNK->id ?>"></i>Hapus</a>
                                        </div>
                                        <div class="project-status mt-4">
                                            <div class="media mb-0">
                                                <p><?= $totalprogress ?> % </p>
                                                <div class="media-body text-end"><span>Selesai</span></div>
                                            </div>
                                            <div class="progress" style="height: 5px">
                                                <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: <?= $totalprogress ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <div class="tab-pane fade" id="top-tahap<?= $i ?>" role="tabpanel" aria-labelledby="tahap<?= $i ?>-top-tab">
                            <div class="row">
                                <?php
                                $where = "e1.keterangan = '" . $i . "'";
                                if ($wherelist != "") {
                                    $where = $wherelist . " AND e1.keterangan = '" . $i . "'";
                                }
                                ?>
                                <?php foreach ($newkegiatan->getDataNew($where) as $keyNK => $valueNK) { ?>
                                    <?php $totalprogress = $newkegiatan->hitungprogress($valueNK->tahapan, $valueNK->persentase_progres) ?>
                                    <div class="col-xxl-4 col-lg-6">
                                        <div class="project-box">
                                            <span class="badge badge-primary">Tahap <?= $valueNK->tahapan ?></span>
                                            <h6 class='mt-3 mb-0'><?= $valueNK->nama_lengkap ?></h6>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>
                                                        <?= $valueNK->namaforum ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <p></p>
                                            <div class="row details">
                                                <div class="col-6"><span>Perkembangan Tahapan</span></div>
                                                <div class="col-6 text-primary"> <?= $valueNK->persentase_progres ?>% </div>
                                                <div class="col-6"> <span>Total Progress</span></div>
                                                <div class="col-6 text-primary"> <?= $totalprogress ?>%</div>
                                                <div class="col-6"> <span>Komentar</span></div>
                                                <div class="col-6 text-primary">2</div>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>
                                                        <a class="btn btn-primary btn-sm" href="<?= base_url('kegiatan/detail/') . $valueNK->id ?>">Lihat</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-warning btn-sm" href="<?= base_url('kegiatan/crud/') . $valueNK->id ?>"></i>Ubah</a>
                                                    </li>
                                                    <li>
                                                        <form action="<?= base_url('kegiatan/delete/') . $valueNK->id ?>" method="POST">
                                                            <button class="btn btn-danger btn-sm" type="submit"></i>Hapus</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="project-status mt-4">
                                                <div class="media mb-0">
                                                    <p><?= $totalprogress ?> % </p>
                                                    <div class="media-body text-end"><span>Selesai</span></div>
                                                </div>
                                                <div class="progress" style="height: 5px">
                                                    <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: <?= $totalprogress ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Kegiatan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tahap</th>
                                        <th>Perkembangan Tahapan</th>
                                        <th>Total Progres</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nourut = 1;
                                    foreach ($listdata as $keyLD => $valueLD) {
                                        $totalprogress = $newkegiatan->hitungprogress($valueLD->tahapan, $valueLD->persentase_progres);
                                    ?>
                                        <tr>
                                            <td><?= $nourut++ ?></td>
                                            <td><?= $valueLD->nama_singkat ?></td>
                                            <td><?= $valueLD->tahapan . " - " . $valueLD->status_tahapan ?></td>
                                            <td style="text-align: center"><?= $valueLD->persentase_progres ?>% </td>
                                            <td style="text-align: center"><?= $totalprogress ?>%</td>
                                            <td style="text-align: center; white-space: nowrap;">
                                                <!-- <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                        <div class="btn-group" role="group">
                                                            <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Setting</button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <a class="dropdown-item" href="<?= base_url('kegiatan/detail/' . $valueLD->id); ?>">
                                                                    <i data-feather="eye" class="pull-left" style="padding: 3px!important;"></i>
                                                                    <span style="padding-left: 5px; line-height: 25px;">Lihat</span>
                                                                </a>
                                                                <a class="dropdown-item" href="<?= base_url('kegiatan/crud/' . $valueLD->id); ?>">
                                                                    <i data-feather="edit" class="pull-left" style="padding: 3px!important;"></i>
                                                                    <span style="padding-left: 5px; line-height: 25px;">Ubah</span>
                                                                </a>
                                                                <a class="dropdown-item" href="<?= base_url('kegiatan/delete/' . $valueLD->id); ?>">
                                                                    <i data-feather="trash" class="pull-left" style="padding: 3px!important;"></i>
                                                                    <span style="padding-left: 5px; line-height: 25px;">Delete</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                <ul>
                                                    <li>
                                                        <a class="btn btn-info btn-xs mt-1" style="font-weight:500;" href="<?= base_url('kegiatan/detail/' . $valueLD->id); ?>">Lihat</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-primary btn-xs mt-1" style="font-weight:500;" href="<?= base_url('kegiatan/crud/' . $valueLD->id); ?>">Ubah</a>
                                                    </li>
                                                    <li>
                                                        <a class="btn btn-danger btn-xs mt-1" style="font-weight:500;" href="<?= base_url('kegiatan/delete/' . $valueLD->id); ?>">Hapus</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Zero Configuration  Ends-->
    </div>
</div>
<!-- Container-fluid Ends-->
</div>
</div>