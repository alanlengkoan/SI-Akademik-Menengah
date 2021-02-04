<form id="form-upd" action="<?= guru_url() ?>soal/process_upd" method="POST">
    <input type="hidden" name="inpid" value="<?= $id_ujian ?>">
    <input type="hidden" name="inpidsoal" value="<?= $detail->id_soal ?>">

    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Mata Pelajaran</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <?= $detail->nama ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Jenis Ujian</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <?= $detail->jenis_ujian ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-example-int form-horizental">
        <div class="form-group">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <label class="hrzn-fm">Jenis Soal</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="nk-int-st">
                        <select class="selectpicker" id="inpjenis" name="inpjenis">
                            <option value="">- Pilih -</option>
                            <option value="essay" <?= ($jenis === 'essay' ? 'selected' : '') ?>>Essay</option>
                            <option value="pilihan_ganda" <?= ($jenis === 'pilihan_ganda' ? 'selected' : '') ?>>Pilihan Ganda</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- begin:: jenis ujian -->
    <div id="jenis-ujian"></div>
    <!-- end:: jenis ujian -->
    <div class="text-center button-icon-btn button-icon-btn-cl">
        <button type="submit" class="btn btn-success" name="upd" id="upd"><i class="fa fa-save"></i></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
    </div>
</form>