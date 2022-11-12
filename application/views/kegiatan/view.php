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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-semua" role="tabpanel" aria-labelledby="top-semua-tab">
                            <div class="row">
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box"><span class="badge badge-primary">Tahap 1</span>
                                        <img class="img-fluid rounded mb-75" src="{{ asset('storage/' . $kegiatan->foto) }}" alt="avatar img" />
                                        <h6>nama Kegiatan</h6>
                                        <div class="media">
                                            <div class="media-body">
                                                <p>Dinas KPPPA Kabupaten Bogor</p>
                                            </div>
                                        </div>
                                        <p></p>
                                        <div class="row details">
                                            <div class="col-6"><span>Perkembangan Tahapan</span></div>
                                            <div class="col-6 text-primary"> % </div>
                                            <div class="col-6"> <span>Total Progress</span></div>
                                            <div class="col-6 text-primary">%</div>
                                            <div class="col-6"> <span>Komentar</span></div>
                                            <div class="col-6 text-primary">2</div>
                                        </div>
                                        <div>
                                            <ul>
                                                <li>
                                                    <!-- Detail-->
                                                    <a class="btn btn-primary btn-sm" href="/kegiatan/{{ $kegiatan->id }}">Lihat</a>
                                                </li>
                                                <li>
                                                    <a class="btn btn-warning btn-sm" href="/kegiatan/{{ $kegiatan->id }}/edit"></i>Ubah</a>
                                                </li>
                                                <li>
                                                    <form action="/kegiatan/{{ $kegiatan->id }}" method="POST">
                                                        <button class="btn btn-danger btn-sm" type="submit"></i>Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-status mt-4">
                                            <div class="media mb-0">
                                                <p>20 % </p>
                                                <div class="media-body text-end"><span>Selesai</span></div>
                                            </div>
                                            <div class="progress" style="height: 5px">
                                                <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-tahap1" role="tabpanel" aria-labelledby="tahap1-top-tab">
                            <div class="row">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-tahap2" role="tabpanel" aria-labelledby="tahap2-top-tab">
                            <div class="row">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-tahap3" role="tabpanel" aria-labelledby="tahap3-top-tab">
                            <div class="row">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-tahap4" role="tabpanel" aria-labelledby="tahap4-top-tab">
                            <div class="row">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-tahap5" role="tabpanel" aria-labelledby="tahap5-top-tab">
                            <div class="row">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="top-tahap6" role="tabpanel" aria-labelledby="tahap6-top-tab">
                            <div class="row">
                                <div class="col-xxl-4 col-lg-6">
                                    <div class="project-box"><span class="badge badge-primary">Tahap 6</span>
                                        <h6>Super App E-Office</h6>
                                        <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                            <div class="media-body">
                                                <p>Sekretariat Daerah</p>
                                            </div>
                                        </div>
                                        <p>Evaluasi dan rencana pengembangan lebih lanjut sedang berlangsung</p>
                                        <div class="row details">
                                            <div class="col-6"><span>Perkembangan Tahapan</span></div>
                                            <div class="col-6 text-primary">100 % </div>
                                            <div class="col-6"> <span>Total Progress</span></div>
                                            <div class="col-6 text-primary">85 %</div>
                                            <div class="col-6"> <span>Komentar</span></div>
                                            <div class="col-6 text-primary">7</div>
                                        </div>
                                        <div>
                                            <ul>
                                                <li>
                                                    <!-- Detail-->
                                                    <a class="btn btn-primary btn-sm" href="detailinovasi.html">Lihat</a>
                                                </li>
                                                <li>
                                                    <button class="btn btn-warning btn-sm" type="button"></i>Edit</button>
                                                </li>
                                                <li>
                                                    <button class="btn btn-danger btn-sm" type="button"></i>Hapus</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-status mt-4">
                                            <div class="media mb-0">
                                                <p>85% </p>
                                                <div class="media-body text-end"><span>Selesai</span></div>
                                            </div>
                                            <div class="progress" style="height: 5px">
                                                <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 85%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
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
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <div class="default-according style-1 faq-accordion job-accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Pencarian</button>
                                            </h2>
                                        </div>
                                        <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="card-body filter-cards-view animate-chk">
                                                <div class="row">
                                                    <div class="job-filter col-md-6 mb-3">
                                                        <div class="faq-form">
                                                            <div class="col-form-label">Level Forum</div>
                                                            <select class="select2filter col-sm-12">
                                                                <option value></option>
                                                                <?php
                                                                foreach ($qlevelf as $keyQl => $valueQl) {
                                                                    if ($valueQl->value != "Superadmin") {
                                                                        echo "<option value='" . $valueQl->id . "'>" . $valueQl->value . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="job-filter col-md-6 mb-3">
                                                        <div class="faq-form">
                                                            <div class="col-form-label">Wilayah</div>
                                                            <select class="select2filter col-sm-12">
                                                                <option value></option>
                                                                <option value="AL">Alabama</option>
                                                                <option value="WY">Wyoming</option>
                                                                <option value="WY">Coming</option>
                                                                <option value="WY">Hanry Die</option>
                                                                <option value="WY">John Doe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="job-filter col-md-6 mb-3">
                                                        <div class="faq-form">
                                                            <div class="col-form-label">Level User</div>
                                                            <select class="select2filter col-sm-12">
                                                                <option value></option>
                                                                <?php
                                                                foreach ($qlevelu as $keyQl => $valueQl) {
                                                                    if ($valueQl->value != "Superadmin") {
                                                                        echo "<option value='" . $valueQl->id . "'>" . $valueQl->value . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary text-center" type="button">Find jobs</button>
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
                                            <th style="text-align: center">Tahap</th>
                                            <th style="text-align: center">Perkembangan Tahapan</th>
                                            <th style="text-align: center">Total Progres</th>
                                            <th style="text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nourut = 1;
                                        foreach ($listdata as $keyLD => $valueLD) {
                                        ?>
                                            <tr>
                                                <td><?= $nourut++ ?></td>
                                                <td><?= $valueLD->nama_singkat ?></td>
                                                <td><?= $valueLD->status_tahapan ?></td>
                                                <td style="text-align: center"><?= $valueLD->persentase_progres ?>% </td>
                                                <td style="text-align: center"><?= $valueLD->persentase_progres ?>%</td>
                                                <td style="text-align: center">
                                                    <ul>
                                                        <li>
                                                            <!-- Detail-->
                                                            <a class="btn btn-info btn-xs mt-1" style="font-weight:500;" href="<?= base_url('kegiatan/detail/' . $valueLD->id); ?>">Lihat</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-primary btn-xs mt-1" style="font-weight:500;" href="<?= base_url('kegiatan/crud/' . $valueLD->id); ?>">Ubah</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-danger btn-xs mt-1" style="font-weight:500;" href="<?= base_url('kegiatan/delete/' . $valueLD->id); ?>"></i>Hapus</a>
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