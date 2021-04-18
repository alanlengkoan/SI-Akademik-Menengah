<script src="<?= assets_url() ?>admin/js/datapicker/bootstrap-datepicker.js"></script>
<script src="<?= assets_url() ?>admin/js/datapicker/datepicker-active.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk tanggal
    var untukTanggal = function() {
        $('#modalAdd').on('shown.bs.modal', function() {
            $('.mydate').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true,
                container: '#modalAdd modal-body'
            });
        });
    }();

    // untuk users
    var untukUsers = function() {
        $(document).on('change', '#inprole', function() {
            var ini = $(this);

            $.ajax({
                type: "post",
                url: "<?= admin_url() ?>users/get_users",
                dataType: 'html',
                data: {
                    role: ini.val()
                },
                success: function(response) {
                    var row = JSON.parse(response);

                    if (row.status === true) {
                        $('#users').html(`
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Users</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="nk-int-st">
                                            <select class="selectpicker" id="inpusers" name="inpusers" data-dropup-auto="false">
                                                <option value="">- Pilih -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `);

                        $.each(row.data, function(i, item) {
                            $('#inpusers').append($('<option>', {
                                value: item.id,
                                text: item.nama
                            }));
                        });

                        $('.selectpicker').selectpicker();
                        $("#inpusers").selectpicker("refresh");
                    } else {
                        $('#users').empty();
                    }
                }
            });
        });
    }();

    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();
            $('#inpusername').attr('required', 'required');
            $('#inpnis').attr('required', 'required');
            $('#inppasswordsatu').attr('required', 'required');
            $('#inppassworddua').attr('required', 'required');
            $('#inprole').attr('required', 'required');

            if ($('#form-add').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add').attr('disabled', 'disabled');
                        $('#add').html('<i class="fa fa-spinner"></i>');
                    },
                    success: function(response) {
                        swal({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                button: response.button,
                            })
                            .then((value) => {
                                location.reload();
                            });
                    }
                })
            }
        });
    }();

    // untuk get id
    var untukGetIdData = function() {
        $(document).on('click', '#btn-upd', function() {
            var ini = $(this);

            $.ajax({
                type: "post",
                url: "<?= admin_url() ?>users/get",
                dataType: 'html',
                data: {
                    id: ini.data('id')
                },
                beforeSend: function() {
                    $('#get-form-upd').html(`<div class="center"><div class="loader"></div></div>`);
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fa fa-spinner"></i>');
                },
                success: function(response) {
                    $('#get-form-upd').html(response);
                    $('.selectpicker').selectpicker();
                    ini.removeAttr('disabled');
                    ini.html('<i class="fa fa-pencil"></i>');
                }
            });
        });
    }();

    // untuk ubah data
    var untukUbahData = function() {
        $(document).on('submit', '#form-upd', function(e) {
            e.preventDefault();
            $('#inpusername').attr('required', 'required');
            $('#inpnis').attr('required', 'required');
            $('#inppasswordsatu').attr('required', 'required');
            $('#inppassworddua').attr('required', 'required');
            $('#inprole').attr('required', 'required');

            if ($('#form-upd').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#upd').attr('disabled', 'disabled');
                        $('#upd').html('<i class="fa fa-spinner"></i>');
                    },
                    success: function(data) {
                        swal({
                                title: data.title,
                                text: data.text,
                                icon: data.type,
                                button: data.button,
                            })
                            .then((value) => {
                                location.reload();
                            });
                    }
                })
            }
        });
    }();

    // untuk hapus data
    var untukHapusData = function() {
        $(document).on('click', '#btn-del', function() {
            var ini = $(this);
            swal({
                    title: "Apakah Anda yakin ingin menghapusnya?",
                    text: "Data yang telah dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((del) => {
                    if (del) {
                        $.ajax({
                            type: "post",
                            url: "<?= admin_url() ?>users/process_del",
                            dataType: 'json',
                            data: {
                                id: ini.data('id')
                            },
                            beforeSend: function() {
                                ini.attr('disabled', 'disabled');
                                ini.html('<i class="fa fa-spinner"></i>');
                            },
                            success: function(data) {
                                swal({
                                        title: data.title,
                                        text: data.text,
                                        icon: data.type,
                                        button: data.button,
                                    })
                                    .then((value) => {
                                        location.reload();
                                    });
                            }
                        });
                    } else {
                        return false;
                    }
                });
        });
    }();
</script>