<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    function load_chat() {
        $.ajax({
            type: 'POST',
            url: '<?= siswa_url() ?>materi/load_chat/<?= $data->id_materi ?>',
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

    // untuk absen
    var untukAbsenData = function() {
        $(document).on('click', '#absen', function(e) {
            e.preventDefault();
            var ini = $(this);

            $.ajax({
                method: 'post',
                url: '<?= siswa_url() ?>materi/absen',
                dataType: 'json',
                data: {
                    id_materi: ini.data('id_materi'),
                    id_siswa: ini.data('id_siswa')
                },
                beforeSend: function() {
                    ini.attr('disabled', 'disabled');
                    ini.html('Menunggu..');
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
        });
    }();

    setInterval(function() {
        load_chat()
    }, 3000);
</script>