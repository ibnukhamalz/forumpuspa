<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary mb-3" href="javascript:;" data-bs-toggle="modal" data-bs-target="#modaladd"> + Tambah Data</a>
            <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-labelledby="modaladd" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modaladd">Form Tambah Data</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('master/save/' . $sub) ?>" method="post">
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Detail*</label>
                                            <input name="key" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= str_replace('_', ' ', $sub) ?>">
                                            <input name="value" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Detail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1"><?= ($sub == "tahapan") ? 'Tahap' : 'Info Tambahan' ?></label>
                                            <input name="keterangan" class="form-control" id="exampleFormControlInput1" type="<?= ($sub == "tahapan") ? 'number' : 'text' ?>" placeholder="<?= ($sub == "tahapan") ? 'Tahap' : 'Info Tambahan' ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($sub == "tahapan") {
                                ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleFormControlInput1">Bobot</label>
                                                <input name="other" class="form-control" id="exampleFormControlInput1" type="number" placeholder="Bobot">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" data-bs-dismiss="modal">Close</a>
                                <button class="btn btn-secondary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive product-table">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th style="width: 30px;">No</th>
                                    <th>Details</th>
                                    <?php
                                    if ($sub == "tahapan") {
                                        echo "<th> Tahap </th>";
                                        echo "<th> Bobot(%) </th>";
                                    } else {
                                        echo "<th>info tambahan</th>";
                                    }
                                    ?>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nourut = 1;
                                foreach ($listdata as $keyLD => $valueLD) {
                                ?>
                                    <tr>
                                        <td align="center"><?= $nourut++ ?></td>
                                        <td><?= $valueLD->value ?? '' ?></td>
                                        <td><?= $valueLD->keterangan ?? '' ?></td>
                                        <?php
                                        if ($sub == "tahapan") {
                                            echo "<td>" . $valueLD->other . "</td>";
                                        }
                                        ?>
                                        <td style="white-space: nowrap; text-align: center;">
                                            <!-- <a href="<?= base_url('anggota/detail/' . $valueLD->id) ?>" class="btn btn-primary btn-xs"><b>Detail</b></a> -->
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modaledit<?= $valueLD->id ?>" class="btn btn-success btn-xs">Ubah</a>
                                            <a href="<?= base_url('master/delete/' . $sub . '/' . $valueLD->id) ?>" onclick="return confirm('ingin menghapus data ini ?')" class="btn btn-danger btn-xs">Hapus</a>
                                        </td>
                                        <div class="modal fade" id="modaledit<?= $valueLD->id ?>" tabindex="-1" role="dialog" aria-labelledby="modaledit" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modaledit">Form Ubah Data</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('master/save/' . $sub) ?>" method="post">
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1">Detail*</label>
                                                                        <input name="id" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= $valueLD->id ?>">
                                                                        <input name="key" class="form-control" id="exampleFormControlInput1" type="hidden" value="<?= str_replace('_', ' ', $sub) ?>">
                                                                        <input name="value" class="form-control" id="exampleFormControlInput1" type="text" placeholder="Detail" value="<?= $valueLD->value ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="exampleFormControlInput1"><?= ($sub == "tahapan") ? 'Tahap' : 'Info Tambahan' ?></label>
                                                                        <input name="keterangan" class="form-control" id="exampleFormControlInput1" type="text" placeholder="<?= ($sub == "tahapan") ? 'Tahap' : 'Info Tambahan' ?>" value="<?= $valueLD->keterangan ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if ($sub == "tahapan") {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="exampleFormControlInput1">Bobot</label>
                                                                            <input name="other" class="form-control" id="exampleFormControlInput1" type="number" placeholder="Bobot">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-primary" data-bs-dismiss="modal">Close</a>
                                                            <button class="btn btn-secondary" type="submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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