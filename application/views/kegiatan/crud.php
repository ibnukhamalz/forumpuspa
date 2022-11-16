<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header py-4">
                    <h5><?= $subtitle; ?></h5>
                </div>
                <form class="form theme-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $crudid ?? '' ?>">
                    <input type="hidden" name="mitra_id" value="<?= $this->session->mitra_id ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama Singkat Kegiatan</label>
                                        <input name="nama_singkat" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Nama Singkat Kegiatan" value="<?= set_value('nama_singkat', $cruddata->nama_singkat ?? ''); ?>">
                                        <?php echo form_error('nama_singkat', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Nama Lengkap Kegiatan</label>
                                        <input name="nama_lengkap" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Nama Lengkap Kegiatan" value="<?= set_value('nama_lengkap', $cruddata->nama_lengkap ?? ''); ?>">
                                        <?php echo form_error('nama_lengkap', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Foto Kegiatan</label>
                                        <input name="foto" class="form-control" id="exampleFormControlInput1" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Jenis Kegiatan</label>
                                        <select class="form-select" name="jenis_kegiatan_id">
                                            <option value>Pilih Jenis Kegiatan</option>
                                            <?php
                                            foreach ($enuJK as $keyQJK => $valueQJK) {
                                                $select = false;
                                                if ($cruddata->jenis_kegiatan_id == $valueQJK->id) $select = true;
                                                echo "<option value='" . $valueQJK->id . "'" . set_select('jenis_kegiatan_id', $valueQJK->id ?? '', $select) . ">";
                                                echo $valueQJK->value;
                                                if ($valueQJK->keterangan != "") {
                                                    echo " (" . $valueQJK->keterangan . ")";
                                                }
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Deskripsi Kegiatan</label>
                                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Kegiatan"><?= set_value('deskripsi', $cruddata->deskripsi ?? ''); ?></textarea>
                                        <?php echo form_error('deskripsi', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1" style="font-weight: 500;">Tujuan dan Manfaat</label>
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                foreach ($enuTM as $keyQTM => $valueQTM) {
                                                    $select = false;
                                                    if (!empty($cruddata->tujuan_dan_manfaat) and in_array($valueQTM->id, json_decode($cruddata->tujuan_dan_manfaat))) $select = true;
                                                    echo "<label class='d-block' for='chk-ani" . $keyQTM . "'>
                                                        <input class='checkbox_animated' id='chk-ani" . $keyQTM . "' type='checkbox' name='tujuan_dan_manfaat[]' value='" . $valueQTM->id . "'" . set_checkbox('tujuan_dan_manfaat[]', $valueQTM->id ?? '', $select) . "> " . $valueQTM->value . "
                                                    </label>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php echo form_error('tujuan_dan_manfaat[]', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Pihak yang terlibat</label>
                                        <textarea class="form-control" name="pihak_yang_terlibat" placeholder="Pihak yang terlibat"><?= set_value('pihak_yang_terlibat', $cruddata->pihak_yang_terlibat ?? ''); ?></textarea>
                                        <?php echo form_error('pihak_yang_terlibat', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Kebutuhan sumber daya</label>
                                        <textarea class="form-control" name="kebutuhan_sumberdaya" placeholder="Kebutuhan sumber daya"><?= set_value('kebutuhan_sumberdaya', $cruddata->kebutuhan_sumberdaya ?? ''); ?></textarea>
                                        <?php echo form_error('kebutuhan_sumberdaya', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1" style="font-weight: 500;">Sasaran Kegiatan</label>
                                        <div class="row">
                                            <?php
                                            foreach ($enuSK as $keyQSK => $valueQSK) {
                                                $select = false;
                                                if (!empty($cruddata->sasaran) and in_array($valueQSK->id, json_decode($cruddata->sasaran))) $select = true;
                                                echo "<div class='col-md-6'>";
                                                echo "<label class='d-block' for='chk-ani1" . $keyQSK . "'>
                                                        <input class='checkbox_animated' id='chk-ani1" . $keyQSK . "' type='checkbox' name='sasaran[]' value='" . $valueQSK->id . "'" . set_checkbox('sasaran[]', $valueQSK->id ?? '', $select) . "> " . $valueQSK->value . "
                                                    </label>
                                                </div>";
                                            }
                                            ?>

                                        </div>
                                        <?php echo form_error('sasaran[]', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Tahapan</label>
                                        <select class="form-select" name="status_tahapan">
                                            <option value>Pilih Tahapan</option>
                                            <?php
                                            foreach ($enuT as $keyQT => $valueQT) {
                                                $select = false;
                                                if ($cruddata->status_tahapan == $valueQT->id) $select = true;
                                                echo "<option value='" . $valueQT->id . "'" . set_select('status_tahapan', $valueQT->id ?? '', $select) . ">";
                                                echo $valueQT->keterangan . " - " . $valueQT->value;
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Persentase pada tahap ini (0 - 100)</label>
                                        <div class="input-group">
                                            <input name="persentase_progres" class="form-control" id="exampleFormControlInput1" type="number" max="100" min="0" placeholder="Persentase pada tahap ini" value="<?= set_value("persentase_progres", $cruddata->persentase_progres ?? ''); ?>" onkeyup="if(this.value < 0){ this.value = 0 } else if(this.value > 100) { this.value = 100}">
                                            <span class="input-group-text"><b>%</b></span>
                                            <?php echo form_error('persentase_progres', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Keterangan Status Kegiatan</label>
                                        <textarea class="form-control" name="keterangan_status_kegiatan" placeholder="Keterangan Status Kegiatan"><?= set_value('keterangan_status_kegiatan', $cruddata->keterangan_status_kegiatan ?? ''); ?></textarea>
                                        <?php echo form_error('keterangan_status_kegiatan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Keunikan / Kreativitas</label>
                                        <textarea class="form-control" name="keunikan" placeholder="Keunikan / Kreativitas"><?= set_value('keunikan', $cruddata->keunikan ?? ''); ?></textarea>
                                        <?php echo form_error('keunikan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Potensi</label>
                                        <textarea class="form-control" name="potensi" placeholder="Potensi Pengembangan Lebih Lanjut"><?= set_value('potensi', $cruddata->potensi ?? ''); ?></textarea>
                                        <?php echo form_error('potensi', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Analisis Risiko dan Mitigasi</label>
                                        <textarea class="form-control" name="analisis_resiko" placeholder="Analisis Risiko dan Mitigasi"><?= set_value('analisis_resiko', $cruddata->analisis_resiko ?? ''); ?></textarea>
                                        <?php echo form_error('analisis_resiko', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Strategi Menjaga Keberlangsungan</label>
                                        <textarea class="form-control" name="strategi_menjaga_keberlangsungan" placeholder="Strategi Menjaga Keberlangsungan"><?= set_value('strategi_menjaga_keberlangsungan', $cruddata->strategi_menjaga_keberlangsungan ?? ''); ?></textarea>
                                        <?php echo form_error('strategi_menjaga_keberlangsungan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Indikator keberhasilan</label>
                                        <textarea class="form-control" name="indikator_keberhasilan" placeholder="Indikator keberhasilan"><?= set_value('indikator_keberhasilan'), $cruddata->indikator_keberhasilan ?? ''; ?></textarea>
                                        <?php echo form_error('indikator_keberhasilan', '<div class="invalid-feedback" style="display:block">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Lampiran</label>
                                        <input name="lampiran" class="form-control" id="exampleFormControlInput1" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end py-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="<?= base_url('kegiatan') ?>" class="btn btn-danger" type="reset">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>