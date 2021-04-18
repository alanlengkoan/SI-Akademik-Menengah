<form id="form-upd" action="<?= admin_url() ?>jadwal/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id ?>">

    <div class="form-example-int form-horizental mg-t-15">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Pilih Penugasan</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" id="inppenugasanguru" name="inppenugasanguru">
                            <option value="">- Pilih -</option>
                            <?php foreach ($penugasan_guru as $key => $value) { ?>
                                <option value="<?= $value->id_penugasan_guru ?>" <?= ($id_penugasan_guru == $value->id_penugasan_guru ? 'selected' : '') ?>><?= $value->kelas ?> - <?= $value->guru ?> - <?= $value->mapel ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental mg-t-15">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Hari</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" id="inphari" name="inphari">
                            <option value="">- Pilih -</option>
                            <?php foreach ($hari as $key => $value) { ?>
                                <option value="<?= $key ?>" <?= ($id_hari == $key ? 'selected' : '') ?>><?= $value ?></option>
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
                    <label class="hrzn-fm">Jam</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <input type="time" class="form-control input-sm" name="inpjam" id="inpjam" value="<?= $jam ?>" />
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