<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">

                    <div class="card-header py-4">
                        <h4 class="card-title mb-0">Ubah Password</h4>
                    </div>
                    <form method="post">
                        <div class="card-body pb-2">
                            <input name="id" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= $userdata->id ?? ''; ?>">
                            <input name="formnya" class="form-control" id="exampleFormControlInput1" type="hidden" value="users">
                            <?php if ($this->session->role_id != 0) { ?>
                                <div class="row mb-2">
                                    <div class="profile-title">
                                        <div class="media">
                                            <div>
                                                <img class="img-70 rounded-circle" alt="" src="<?= base_url('berkas/logo/' . $cruddata->logo) ?? base_url('template/assets/images/logo/logo.png') ?>" style="border: 2px solid; height:70px">
                                                <div class="icon-wrapper" style="position: absolute; top:0; background-color: white; border-radius:50%; padding:5px; box-shadow: 0 0 6px 3px rgb(68 102 242 / 20%); cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalfotoprofile">
                                                    <i class="icofont icofont-pencil-alt-5"></i>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-1"><?= $cruddata->nama_lengkap ?? '' ?></h5>
                                                <p><?= $this->session->roles ?? '' ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- <div class="mb-3">
                                <h6 class="form-label">Bio</h6>
                                <textarea class="form-control" rows="5">On the other hand, we denounce with righteous indignation</textarea>
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Email-Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="user"></i></span>
                                    <input name="email" class="form-control" id="exampleFormControlInput1" type="email" placeholder="name@example.com" value="<?= set_value('email', $userdata->email ?? ''); ?>" readonly>
                                    <?php echo form_error('email', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword2">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i data-feather="lock"></i></span>
                                    <input name="password" class="form-control" id="exampleInputPassword2" type="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end py-4">
                            <button class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>

                    <div class="modal fade" id="modalfotoprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url("welcome/myprofile/savefoto") ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body pb-0">
                                        <input name="logo" class="form-control" id="exampleFormControlInput1" type="file">
                                        <label class="form-label" for="exampleFormControlInput1">
                                            <small>File : JPG, PNG | Max Size : 5M</small>
                                        </label>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn btn-primary" data-bs-dismiss="modal">Close</a>
                                        <button class="btn btn-secondary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->role_id != 0) { ?>
                <div class="col-xl-8">
                    <form class="card" method="post" enctype="multipart/form-data">
                        <div class="card-header py-4">
                            <h4 class="card-title mb-0">Ubah Profil</h4>
                            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input name="id" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= $cruddata->id ?? ''; ?>">
                                <input name="formnya" class="form-control" id="exampleFormControlInput1" type="hidden" value="anggota">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Nama Singkat*</label>
                                            <input name="nama_singkat" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Nama Singkat" value="<?= set_value('nama_singkat', $cruddata->nama_singkat ?? ''); ?>">
                                            <?php echo form_error('nama_singkat', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Nama Lengkap*</label>
                                            <input name="nama_lengkap" class="form-control" id="validationCustom01" type="text" placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap', $cruddata->nama_lengkap ?? ''); ?>">
                                            <?php echo form_error('nama_lengkap', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Nama Kontak*</label>
                                            <input name="nama_singkat1" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Nama Kontak" value="<?= set_value('nama_singkat1', 'Bambang'); ?>">
                                            <?php echo form_error('nama_singkat', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">No Telepon</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i data-feather="phone"></i></span>
                                                <input name="no_telp_mitra" class="form-control" id="exampleFormControlInput1" type="text" placeholder="No Telepon" value="<?= set_value('no_telp_mitra', $cruddata->no_telp_mitra ?? ''); ?>">
                                                <?php echo form_error('no_telp_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">WhatsApp / Telegram</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i data-feather="phone"></i></span>
                                                <input name="no_telp_mitra" class="form-control" id="exampleFormControlInput1" type="text" placeholder="WhatsApp / Telegram" value="<?= set_value('no_telp_mitra', $cruddata->no_telp_mitra ?? ''); ?>">
                                                <?php echo form_error('no_telp_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i data-feather="mail"></i></span>
                                                <input name="email_mitra" class="form-control" id="exampleFormControlInput1" type="email" placeholder="Email" value="<?= set_value('email_mitra', $cruddata->email_mitra ?? ''); ?>">
                                                <?php echo form_error('email_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                            <label class="form-label" for="exampleFormControlInput1">Alamat</label>
                                            <textarea class="form-control" name="alamat_mitra" placeholder="Alamat dan Kode Pos"><?= set_value('alamat_mitra', $cruddata->alamat_mitra ?? ''); ?></textarea>
                                            <?php echo form_error('alamat_mitra', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">
                                                    <a href="javascript:medsos()" class="btn btn-info p-0"><i data-feather="plus"></i></a>
                                                    Media Sosial
                                                </label>
                                                <div id="medsos">
                                                    <div class="row mb-1">
                                                        <div class="col-md-2">
                                                            <a href="javascript:;" onclick="$(this).parent().parent().remove();" class="btn btn-danger">Hapus</a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" placeholder="IG/FB/TWITTER">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" placeholder="@kppa">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <label class="form-label" for="exampleFormControlInput1">Dasar Hukum (File : PDF | Max Size : 5M)</label>
                                            <input name="dasar_hukum" class="form-control" id="exampleFormControlInput1" type="file">
                                        </div>
                                        <?php if (file_exists('berkas/dasarhukum/' . $cruddata->dasar_hukum)) { ?>
                                            <div class="file-content mb-3">
                                                <div class="file-manager">
                                                    <ul class="files" style="width: 100%">
                                                        <li class="file-box" style="width: auto">
                                                            <div class="file-top"> <i class="fa fa-file-image-o txt-primary"></i><i class="fa fa-ellipsis-v f-14 ellips"></i></div>
                                                            <div class="file-bottom">
                                                                <h6>Dasar Hukum </h6>
                                                                <p class="mb-1">
                                                                    <?php
                                                                    $filesize = filesize('berkas/dasarhukum/' . $cruddata->dasar_hukum);
                                                                    $sisa = $filesize / 1024;
                                                                    if ($sisa >= 1024) {
                                                                        echo number_format($sisa / 1024, 2) . " MB";
                                                                    } else {
                                                                        echo number_format($sisa, 2) . " KB";
                                                                    }
                                                                    ?></p>
                                                                <p> <b>lihat : </b><a href="<?= base_url('berkas/dasarhukum/' . $cruddata->dasar_hukum) ?>" target="_blank">Link</a></p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <script>
                                        function medsos() {
                                            var html = "<div class='row mb-1'>" +
                                                "<div class='col-md-2'>" +
                                                "<a href=\"javascript:;\" onclick=\"$(this).parent().parent().remove();\" class='btn btn-danger'>Hapus</a>" +
                                                "</div>" +
                                                "<div class='col-md-4'>" +
                                                "<input type='text' class='form-control' placeholder='IG/FB/TWITTER'>" +
                                                "</div>" +
                                                "<div class='col-md-6'>" +
                                                "<input type='text' class='form-control' placeholder='@kppa'>" +
                                                "</div>" +
                                                "</div>";
                                            $("#medsos").append(html);
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end py-4">
                            <button class="btn btn-primary" type="submit">Perbaharui</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>