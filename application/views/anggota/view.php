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
                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Details</th>
                                    <th>Wilayah</th>
                                    <th>Jenis Mitra</th>
                                    <th>Level User</th>
                                    <th>Status</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nourut = 1;
                                foreach ($listdata as $keyLD => $valueLD) {
                                    $gambar = "template/assets/images/logo/logo.png";
                                    if ($valueLD->logo != "") {
                                        $gambar = "berkas/logo/" . $valueLD->logo;
                                    }
                                    if ($valueLD->jenis_mitra != "Pusat") {
                                        if ($valueLD->jenis_mitra == "Provinsi") {
                                            $wheredaerah = "province";
                                        }
                                        if ($valueLD->jenis_mitra == "Pemda") {
                                            $wheredaerah = "regency";
                                        }
                                        $daerahnya = json_decode($this->api->daerah($wheredaerah, $valueLD->kode_wilayah));
                                    }
                                ?>
                                    <tr>
                                        <td align="center"><?= $nourut++ ?></td>
                                        <td>
                                            <img class="rounded-circle" src="<?= base_url($gambar); ?>" alt="" width="50" height="50" style="background-color: #ddd; border:2px solid; float:left; margin-right:15px">
                                            <h6> <?= $valueLD->nama_singkat ?></h6>
                                            <span><?= $valueLD->nama_lengkap ?></span>
                                        </td>
                                        <td><?= $daerahnya->name ?? '' ?></td>
                                        <td><?= $valueLD->jenis_mitra ?></td>
                                        <td><?= $valueLD->roles ?></td>
                                        <td align="center">
                                            <div class="media-body icon-state switch-outline">
                                                <label class="switch" onclick="document.location = '<?= base_url('anggota/index/verif/' . $valueLD->user_id) ?>'">
                                                    <input type="checkbox" <?= ($valueLD->onoff == "on") ? 'checked' : ''; ?> disabled><span class="switch-state bg-primary"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td style="white-space: nowrap; text-align: center;">
                                            <a href="<?= base_url('anggota/detail/' . $valueLD->user_id) ?>" class="btn btn-primary btn-xs"><b>Detail</b></a>
                                            <!-- <a href="<?= base_url('anggota/crud/' . $valueLD->id) ?>" class="btn btn-success btn-xs">Ubah</a> -->
                                            <a href="<?= base_url('anggota/delete') ?>" class="btn btn-danger btn-xs">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>