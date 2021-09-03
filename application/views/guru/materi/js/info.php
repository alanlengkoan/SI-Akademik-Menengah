<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk get id
    var untukGetIdData = function() {
        $(document).on('click', '#btn-upd', function() {
            var ini = $(this);

            $.ajax({
                type: "post",
                url: "<?= guru_url() ?>materi/get",
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

    // untuk get id
    var untukChat = function() {
        $(document).on('click', '.btn-chat', function() {
            var ini = $(this);

            $.ajax({
                type: "post",
                url: "<?= guru_url() ?>materi/upd_chat",
                dataType: 'json',
                data: {
                    id: ini.data('id'),
                    value: ini.data('value')
                },
                success: function(response) {
                    $.notify(response.title, response.type);
                }
            });
        });
    }();

    // untuk status materi
    var untukMateri = function() {
        $(document).on('click', '.btn-materi', function() {
            var ini = $(this);

            $.ajax({
                type: "post",
                url: "<?= guru_url() ?>materi/upd_materi",
                dataType: 'json',
                data: {
                    id: ini.data('id'),
                    value: ini.data('value')
                },
                success: function(response) {
                    $.notify(response.title, response.type);
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
                            url: "<?= guru_url() ?>materi/process_del",
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