<form id="form-upd" action="<?= guru_url() ?>materi/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id_materi ?>">

    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Mata Pelajaran</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" id="inpmapel" name="inpmapel">
                            <option value="">- Pilih -</option>
                            <?php foreach ($mapel as $key => $value) { ?>
                                <option value="<?= $value->id_mapel ?>" <?= ($id_mapel === $value->id_mapel ? 'selected' : '') ?>><?= $value->nama ?></option>
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
                    <label class="hrzn-fm">Upload File</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="file" class="form-control input-sm" name="inpfile" id="inpfile" />
                        <p>File dengan tipe (*.pdf,*.mp4) <br> Silahkan masukkan file jika ingin mengubah file materi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center button-icon-btn button-icon-btn-cl">
        <button type="submit" class="btn btn-success" name="upd" id="upd"><i class="fa fa-save"></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
</form>