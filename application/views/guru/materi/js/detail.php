<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    function load_chat() {
        $.ajax({
            type: 'POST',
            url: '<?= guru_url() ?>materi/load_chat/<?= $materi->id_materi ?>',
            dataType: 'html',
            success: function(response) {
                $('#dom_chat').html(response);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var errorMsg = 'Request Ajax Gagal : ' + xhr.responseText;
                alert(errorMsg);
            }
        });
    }

    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();
            $('#pesan').attr('required', 'required')

            if ($('#form-add').parsley().isValid() == true) {
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: 'html',
                    beforeSend: function() {
                        $('#kirim').attr('disabled', 'disabled');
                        $('#kirim').html('<i class="fa fa-spinner"></i>');
                    },
                    success: function(response) {
                        $('#dom_chat').html(response);
                        $('#pesan').val('');
                        $('#kirim').removeAttr('disabled');
                        $('#kirim').html('Kirim');
                    }
                })
            }
        });
    }();

    setInterval(function() {
        load_chat()
    }, 3000);
</script>