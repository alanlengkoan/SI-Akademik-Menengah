<form id="form-upd" action="<?= admin_url() ?>users/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id ?>">

    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Username</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="text" class="form-control input-sm" name="inpusername" id="inpusername" value="<?= $username ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Password Lama</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="password" class="form-control input-sm" name="inppasswordlama" id="inppasswordlama" placeholder="Masukkan Password Lama" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Password Baru</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="password" class="form-control input-sm" name="inppasswordsatu" id="inppasswordsatu" placeholder="Masukkan Password" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Ulangi Password Baru</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="password" class="form-control input-sm" name="inppassworddua" id="inppassworddua" placeholder="Masukkan Ulangi Password" />
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
                        <select class="selectpicker" id="inprole" name="inprole">
                            <option value="">- Pilih -</option>
                            <option value="admin" <?= ($role === 'admin' ? 'selected' : '') ?>>Admin</option>
                            <option value="guru" <?= ($role === 'guru' ? 'selected' : '') ?>>Guru</option>
                            <option value="siswa" <?= ($role === 'siswa' ? 'selected' : '') ?>>Siswa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- begin:: untuk users -->
    <?php if ($role === 'guru') { ?>
        <div class="form-example-int form-horizental mg-t-15">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Users</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="nk-int-st">
                            <select class="selectpicker" id="inpusers" name="inpusers">
                                <?php foreach ($guru as $key => $value) { ?>
                                    <option value="<?= $value->id_guru ?>" <?= ($id_users === $value->id_guru ? 'selected' : '') ?>><?= $value->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if ($role === 'siswa') { ?>
        <div class="form-example-int form-horizental mg-t-15">
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="hrzn-fm">Users</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="nk-int-st">
                            <select class="selectpicker" id="inpusers" name="inpusers">
                                <?php foreach ($siswa as $key => $value) { ?>
                                    <option value="<?= $value->id_siswa ?>" <?= ($id_users === $value->id_siswa ? 'selected' : '') ?>><?= $value->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end:: untuk users -->
    <div class="text-center button-icon-btn button-icon-btn-cl">
        <button type="submit" class="btn btn-success" name="upd" id="upd"><i class="fa fa-save"></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
</form>