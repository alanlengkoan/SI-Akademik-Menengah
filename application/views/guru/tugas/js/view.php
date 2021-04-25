<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk tanggal
    $('.mydate').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true,
        container: '#modalAdd modal-body'
    });

    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();
            $('#inpmapel').attr('required', 'required');
            $('#inpjudul').attr('required', 'required');
            $('#inptipe').attr('required', 'required');
            $('#inpfile').attr('required', 'required');

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
                url: "<?= guru_url() ?>tugas/get",
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
                    $('#modalUpd').on('shown.bs.modal', function() {
                        $('.mydate').datepicker({
                            format: "dd-mm-yyyy",
                            autoclose: true,
                            todayHighlight: true,
                            container: '#modalUpd modal-body'
                        });
                    });

                    if ($('#inpjenistugasubah').val() === 'pekerjaan_rumah') {
                        $('#get-form-upd #pekerjaan_rumah').removeAttr('style');
                        $('#get-form-upd #pekerjaan_sekolah').attr('style', 'display: none;');
                    } else {
                        $('#get-form-upd #pekerjaan_sekolah').removeAttr('style');
                        $('#get-form-upd #pekerjaan_rumah').attr('style', 'display: none;');
                    }
                    
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
            $('#inpmapel').attr('required', 'required');
            $('#inpjudul').attr('required', 'required');
            $('#inptipe').attr('required', 'required');
            $('#inpfile').attr('required', 'required');

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
                            url: "<?= guru_url() ?>tugas/process_del",
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

    // untuk pilih jenis ujian tambah data
    var untukJenisTugasTambah = function() {
        $(document).on('change', '#inpjenistugas', function() {
            if (this.value === 'pekerjaan_rumah') {
                $('#pekerjaan_rumah').removeAttr('style');
                $('#pekerjaan_sekolah').attr('style', 'display: none;');
            } else {
                $('#pekerjaan_sekolah').removeAttr('style');
                $('#pekerjaan_rumah').attr('style', 'display: none;');
            }
        });
    }();

    // untuk pilih jenis ujian ubah data
    var untukJenisTugasTambah = function() {
        $(document).on('change', '#inpjenistugasubah', function() {
            if (this.value === 'pekerjaan_rumah') {
                $('#get-form-upd #pekerjaan_rumah').removeAttr('style');
                $('#get-form-upd #pekerjaan_sekolah').attr('style', 'display: none;');
            } else {
                $('#get-form-upd #pekerjaan_sekolah').removeAttr('style');
                $('#get-form-upd #pekerjaan_rumah').attr('style', 'display: none;');
            }
        });
    }();
</script>