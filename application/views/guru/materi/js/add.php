<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();
            $('#inppenugasan').attr('required', 'required');
            $('#inpjudul').attr('required', 'required');
            $('#inppertemuan').attr('required', 'required');

            if ($('#form-add').parsley().isValid() == true) {
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
                                location.href = '<?= guru_url() ?>materi/upd/' + response.id_materi
                            });
                    }
                })
            }
        });
    }();
</script>