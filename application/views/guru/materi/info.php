<!-- begin:: breadcumb -->
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2><?= $halaman ?></h2>
                                    <p>Selamat Datang di <span class="bread-ntd"><b>AKADEMIK ONLINE Ver.1-0</b></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: breadcumb -->

<!-- begin:: contents -->
<div class="normal-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mybox mg-t-30">
                    <div class="bsc-tbl">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Chat</th>
                                        <th>Status Materi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->judul ?></td>
                                            <td><?= $value->mapel ?></td>
                                            <td><?= $value->kelas ?></td>
                                            <td>
                                                <div class="nk-toggle-switch">
                                                    <input class="btn-chat" data-id="<?= $value->id_materi ?>" data-value="<?= $value->status ?>" id="ts<?= $value->id_materi ?>" type="checkbox" hidden="hidden" <?= ($value->status === '1' ? 'checked' : '') ?>>
                                                    <label for="ts<?= $value->id_materi ?>" class="ts-helper"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="nk-toggle-switch">
                                                    <input class="btn-materi" data-id="<?= $value->id_materi ?>" data-value="<?= $value->status_materi ?>" id="tss<?= $value->id_materi ?>" type="checkbox" hidden="hidden" <?= ($value->status_materi === '1' ? 'checked' : '') ?>>
                                                    <label for="tss<?= $value->id_materi ?>" class="ts-helper"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="button-icon-btn button-icon-btn-cl">
                                                    <a href="<?= guru_url() ?>materi/detail/<?= $value->id_materi ?>" class="btn btn-success success-icon-notika"><i class="fa fa-comments-o"></i></a>
                                                    <a href="<?= guru_url() ?>materi/upd/<?= base64_encode($value->id_materi) ?>" class="btn btn-info info-icon-notika"><i class="fa fa-pencil"></i></a>
                                                    <button type="button" id="btn-del" data-id="<?= $value->id_materi ?>" class="btn btn-warning warning-icon-notika"><i class="fa fa-trash"></i></button>
                                                </div>
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
    </div>
</div>
<!-- end:: contents -->