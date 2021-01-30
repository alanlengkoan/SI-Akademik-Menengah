<form id="form-upd" action="<?= admin_url() ?>kelas/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id ?>">

    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Nama</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="text" class="form-control input-sm" name="inpnama" id="inpnama" value="<?= $nama ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental mg-t-15">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Wali Kelas</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" id="inpwalikelas" name="inpwalikelas">
                            <option value="">- Pilih -</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value->id ?>" <?= ($walikelas === $value->id ? 'selected' : '') ?>><?= $value->nama ?></option>
                            <?php } ?>
                        </select>
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