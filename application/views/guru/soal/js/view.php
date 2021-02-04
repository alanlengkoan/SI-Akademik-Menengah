<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk jenis soal
    var untukJenisSoal = function() {
        $(document).on('change', '#inpjenis', function() {
            var ini = $(this);
            var jenis = ini.val();

            if (jenis !== '') {
                $.ajax({
                    type: "post",
                    url: "<?= guru_url() ?>soal/get_jenis_ujian",
                    dataType: 'html',
                    data: {
                        jenis: jenis
                    },
                    success: function(response) {
                        $('#jenis-ujian').html(response);
                        $('.selectpicker').selectpicker();
                    }
                });
            } else {
                $('#jenis-ujian').empty();
            }
        });
    }();

    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();
            $('#inpjenis').attr('required', 'required');

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
                url: "<?= guru_url() ?>soal/get",
                dataType: 'html',
                data: {
                    id: ini.data('id'),
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('<i class="fa fa-spinner"></i>');
                },
                success: function(response) {
                    $('#get-form-upd').html(response);
                    $('.selectpicker').selectpicker();

                    var jenis = $('#get-form-upd #inpjenis').val();

                    if (jenis !== '') {
                        $.ajax({
                            type: "post",
                            url: "<?= guru_url() ?>soal/get_jenis_ujian",
                            dataType: 'html',
                            data: {
                                jenis: jenis
                            },
                            success: function(response) {
                                $('#get-form-upd #jenis-ujian').html(response);

                                $.post("<?= guru_url() ?>soal/get_jenis_ujian_detail", {
                                    id_ujian: ini.data('id'),
                                    jenis: jenis
                                }, function(data) {
                                    if (jenis === 'essay') {
                                        $('#get-form-upd #jenis-ujian #inpsoal').val(data.soal);
                                        $('#get-form-upd #jenis-ujian #inpjawabanbenar').val(data.jawaban_benar);
                                    } else if (jenis === 'pilihan_ganda') {
                                        $('#get-form-upd #jenis-ujian #inpsoal').val(data.soal);
                                        $('#get-form-upd #jenis-ujian #inppila').val(data.pil_a);
                                        $('#get-form-upd #jenis-ujian #inppilb').val(data.pil_b);
                                        $('#get-form-upd #jenis-ujian #inppilc').val(data.pil_c);
                                        $('#get-form-upd #jenis-ujian #inppild').val(data.pil_d);
                                        $('#get-form-upd #jenis-ujian #inppile').val(data.pil_e);
                                        $('#get-form-upd #jenis-ujian #inpjawabanbenar').val(data.jawaban_benar);
                                        $('#get-form-upd #jenis-ujian #inpjawabanbenar').selectpicker("refresh");
                                    }
                                });

                                $('.selectpicker').selectpicker();
                            }
                        });
                    } else {
                        $('#jenis-ujian').empty();
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
            $('#inpjenis').attr('required', 'required');

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
                            url: "<?= guru_url() ?>soal/process_del",
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