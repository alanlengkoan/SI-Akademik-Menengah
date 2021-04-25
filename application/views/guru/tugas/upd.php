<form id="form-upd" action="<?= guru_url() ?>tugas/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id_tugas ?>">

    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Mata Pelajaran</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" id="inppenugasan" name="inppenugasan">
                            <option value="">- Pilih -</option>
                            <?php foreach ($mapel as $key => $value) { ?>
                                <option value="<?= $value->id_penugasan_guru ?>" <?= ($id_penugasan_guru === $value->id_penugasan_guru ? 'selected' : '') ?>>(<?= $value->kelas ?>) <?= $value->mapel ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Judul</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="text" class="form-control input-sm" name="inpjudul" id="inpjudul" value="<?= $judul ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Tipe File</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" name="inptipe" id="inptipe">
                            <option value="">- Pilih -</option>
                            <option value="pdf" <?= ($tipe === 'pdf' ? 'selected' : '') ?>>Pdf</option>
                            <option value="mp4" <?= ($tipe === 'mp4' ? 'selected' : '') ?>>Mp4</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Jenis Tugas</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" name="inpjenistugasubah" id="inpjenistugasubah">
                            <option value="">- Pilih -</option>
                            <option value="pekerjaan_rumah" <?= ($jenis_tugas == 'pekerjaan_rumah' ? 'selected' : '') ?>>Pekerjaan Rumah</option>
                            <option value="pekerjaan_sekolah" <?= ($jenis_tugas == 'pekerjaan_sekolah' ? 'selected' : '') ?>>Pekerjaan Sekolah</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Upload File</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="file" class="form-control input-sm" name="inpfile" id="inpfile" />
                        <p>File dengan tipe (*.pdf,*.mp4) <br> Silahkan masukkan file jika ingin mengubah file tugas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- begin:: waktu -->
    <div id="pekerjaan_rumah" style="display: none;">
        <div class="form-example-int form-horizental">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Start</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="nk-int-st">
                            <input type="text" class="mydate form-control" name="inpstart" id="inpstart" value="<?= $start ?>" readonly="readonly" placeholder="Masukkan Tanggal Mulai" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-example-int form-horizental">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Finish</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="nk-int-st">
                            <input type="text" class="mydate form-control" name="inpfinish" id="inpfinish" value="<?= $finish ?>" readonly="readonly" placeholder="Masukkan Tanggal Selesai" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pekerjaan_sekolah" style="display: none;">
        <div class="form-example-int form-horizental">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Materi</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="nk-int-st">
                            <select class="selectpicker" name="inpmateri" id="inpmateri">
                                <option value="">- Pilih -</option>
                                <?php foreach ($materi as $key => $value) { ?>
                                    <option value="<?= $value->id_materi ?>" <?= ($id_materi == $value->id_materi ? 'selected' : '') ?>>(<?= $value->kelas ?>) <?= $value->mapel ?> <?= $value->judul ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: waktu -->
    <div class="text-center button-icon-btn button-icon-btn-cl">
        <button type="submit" class="btn btn-success" name="upd" id="upd"><i class="fa fa-save"></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
</form>