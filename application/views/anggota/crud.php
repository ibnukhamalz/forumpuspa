<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header py-4">
                    <h5><?= $subtitle; ?></h5>
                </div>
                <form class="form theme-form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="id" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= $crudid ?? ''; ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Forum Induk</label>
                                        <?php if ($this->session->role_id == 0) { ?>
                                            <select class="select2filter col-sm-12 form-control" name="id_parent">
                                                <option value></option>
                                                <?php
                                                foreach ($qinduk as $keyQi => $valueQi) {
                                                    echo "<option value='" . $valueQi->mitra_id . "'>Forum " . $valueQi->nama_lengkap . "</option>";
                                                }
                                                ?>
                                            </select>
                                        <?php } else { ?>
                                            <input name="id_parent" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= $this->session->mitra_id; ?>">
                                            <input class="form-control bg-light" id="exampleFormControlInput1" type="text" value="<?= $this->session->mitra; ?>" readonly>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Jenis Forum</label>
                                        <?php if ($this->session->role_id == 0) { ?>
                                            <select class="form-select" name="roles">
                                                <option value>Pilih Jenis Forum</option>
                                                <?php
                                                foreach ($qlevel as $keyQl => $valueQl) {
                                                    echo "<option value='" . $valueQl->id . "'>" . $valueQl->value . "</option>";
                                                }
                                                ?>
                                            </select>
                                        <?php } else { ?>
                                            <?php

                                            foreach ($qlevel as $keyQl => $valueQl) {
                                                $roles = $valueQl->id;
                                            }
                                            ?>
                                            <input name="roles" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= $roles; ?>">
                                            <input class="form-control bg-light" id="exampleFormControlInput1" type="text" value="Pusat" readonly>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama Singkat Forum</label>
                                        <input name="nama_singkat" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Nama Singkat Forum" value="<?= set_value('nama_singkat', $cruddata->nama_singkat ?? ''); ?>">
                                        <?php echo form_error('nama_singkat', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom01">Nama Lengkap Forum</label>
                                        <input name="nama_lengkap" class="form-control" id="validationCustom01" type="text" placeholder="Nama Lengkap Forum" value="<?= set_value('nama_lengkap', $cruddata->nama_lengkap ?? ''); ?>">
                                        <?php echo form_error('nama_lengkap', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">No Telepon Forum</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="phone"></i></span>
                                            <input name="no_telp_mitra" class="form-control" id="exampleFormControlInput1" type="text" placeholder="No Telepon Forum" value="<?= set_value('no_telp_mitra', $cruddata->no_telp_mitra ?? ''); ?>">
                                            <?php echo form_error('no_telp_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Email Forum</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="mail"></i></span>
                                            <input name="email_mitra" class="form-control" id="exampleFormControlInput1" type="email" placeholder="Email Forum" value="<?= set_value('email_mitra', $cruddata->email_mitra ?? ''); ?>">
                                            <?php echo form_error('email_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Website</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i data-feather="globe"></i></span>
                                            <input name="website_mitra" class="form-control" id="exampleFormControlInput1" type="text" name="nama_singkat" placeholder="http://website.com" value="<?= set_value('website_mitra', $cruddata->website_mitra ?? ''); ?>">
                                            <?php echo form_error('website_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Alamat Forum</label>
                                        <textarea class="form-control" name="alamat_mitra" placeholder="Alamat dan Kode Pos"><?= set_value('alamat_mitra', $cruddata->alamat_mitra ?? ''); ?></textarea>
                                        <?php echo form_error('alamat_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Garis Besar Kegiatan</label>
                                        <textarea class="form-control" name="rincian_kegiatan" placeholder="Garis Besar Kegiatan"><?= set_value('rincian_kegiatan', $cruddata->rincian_kegiatan ?? ''); ?></textarea>
                                        <?php echo form_error('rincian_kegiatan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Permasalahan</label>
                                        <textarea class="form-control" name="permasalahan" placeholder="Permasalahan"><?= set_value('permasalahan', $cruddata->permasalahan ?? ''); ?></textarea>
                                        <?php echo form_error('permasalahan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Kebutuhan</label>
                                        <textarea class="form-control" name="kebutuhan" placeholder="Kebutuhan"><?= set_value('kebutuhan'), $cruddata->kebutuhan ?? ''; ?></textarea>
                                        <?php echo form_error('kebutuhan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Dasar Hukum</label>
                                        <input name="dasar_hukum" class="form-control" id="exampleFormControlInput1" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Logo</label>
                                        <input name="logo" class="form-control" id="exampleFormControlInput1" type="file">
                                    </div>
                                </div>
                            </div>
                            <?php if (empty($crudid)) { ?>
                                <div class="col-md-12 row mt-4">
                                    <h5 class="mb-3">Data Login</h5>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleFormControlInput1">Email address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i data-feather="user"></i></span>
                                                        <input name="email" class="form-control" id="exampleFormControlInput1" type="email" placeholder="name@example.com" value="<?= set_value('email', $cruddata->email ?? ''); ?>">
                                                        <?php echo form_error('email', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputPassword2">Password</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i data-feather="lock"></i></span>
                                                        <input name="password" class="form-control" id="exampleInputPassword2" type="password" placeholder="Password">
                                                        <?php echo form_error('password', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer text-end py-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url('anggota') ?>" class="btn btn-danger" type="reset">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>