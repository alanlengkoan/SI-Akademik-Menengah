<form id="form-upd" action="<?= admin_url() ?>pengumuman/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id ?>">

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
                    <label class="hrzn-fm">Isi</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <textarea class="form-control" name="inpisi" id="inpisi" rows="3"><?= $isi ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Gambar</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="file" class="form-control input-sm" name="inpgambar" id="inpgambar" />
                        <p>File dengan tipe (*.jpg, *.png) <br> Silahkan masukkan file jika ingin mengubah file materi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental mg-t-15">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Role</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <div class="fm-checkbox">
                            <label><input type="checkbox" class="i-checks" name="inprole[]" <?= (in_array('guru', $role) ? 'checked' : '') ?> value="guru"> <i></i>Guru</label>
                            &nbsp;
                            <label><input type="checkbox" class="i-checks" name="inprole[]" <?= (in_array('siswa', $role) ? 'checked' : '') ?> value="siswa"> <i></i>Siswa</label>
                        </div>
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