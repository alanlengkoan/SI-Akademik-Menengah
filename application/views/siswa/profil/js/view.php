<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk ubah data
    var untukUbahAkun = function() {
        $('#form-akun').submit(function(e) {
            e.preventDefault();
            $('#nama').attr('required', 'required');
            $('#username').attr('required', 'required');

            if ($('#form-akun').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add-akun').attr('disabled', 'disabled');
                        $('#add-akun').html('<i class="fa fa-spinner"></i>');
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

    // untuk ubah keamanan
    var untukUbahKeamanan = function() {
        $('#form-keamanan').submit(function(e) {
            e.preventDefault();
            $('#password_lama').attr('required', 'required');
            $('#password_baru').attr('required', 'required');
            $('#konfirmasi_password').attr('required', 'required');

            if ($('#form-keamanan').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    beforeSend: function() {
                        $('#add-keamanan').attr('disabled', 'disabled');
                        $('#add-keamanan').html('<i class="fa fa-spinner"></i>');
                    },
                    success: function(response) {
                        if (response.type === 'success') {
                            swal({
                                    title: response.title,
                                    text: response.text,
                                    icon: response.type,
                                    button: response.button,
                                })
                                .then((value) => {
                                    location.reload();
                                });
                        } else {
                            swal({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                button: response.button,
                            });
                        }
                        $('#add-keamanan').removeAttr('disabled');
                        $('#add-keamanan').html('<i class="fa fa-save"></i>');
                    }
                })
            }
        });
    }();
</script>