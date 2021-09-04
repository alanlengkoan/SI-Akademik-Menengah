<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-upd', function(e) {
            e.preventDefault();
            $('#inppenugasan').attr('required', 'required');
            $('#inpjudul').attr('required', 'required');

            if ($('#form-upd').parsley().isValid() == true) {
                $.ajax({
                    type: $(this).attr('method'),
                    enctype: $(this).attr('enctype'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
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
                url: "<?= guru_url() ?>materi/get_detail",
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

    // untuk tambah data
    var untukTambahDataDetail = function() {
        $(document).on('submit', '#form-add-detail', function(e) {
            e.preventDefault();
            $('#inptipe').attr('required', 'required');
            $('#inpfile').attr('required', 'required');

            if ($('#form-add-detail').parsley().isValid() == true) {
                $.ajax({
                    type: $(this).attr('method'),
                    enctype: $(this).attr('enctype'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
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

    // untuk ubah data
    var untukUbahDataDetail = function() {
        $(document).on('submit', '#form-upd-detail', function(e) {
            e.preventDefault();
            $('#inptipe').attr('required', 'required');
            $('#inpfile').attr('required', 'required');

            if ($('#form-upd-detail').parsley().isValid() == true) {
                $.ajax({
                    type: $(this).attr('method'),
                    enctype: $(this).attr('enctype'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#upd').attr('disabled', 'disabled');
                        $('#upd').html('<i class="fa fa-spinner"></i>');
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
                            url: "<?= guru_url() ?>materi/process_del_detail",
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