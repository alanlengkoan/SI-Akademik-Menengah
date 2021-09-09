<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<script src="<?= assets_url() ?>admin/js/dropzone/dropzone.js"></script>

<script>
    Dropzone.options.formAdd = {
        maxFiles: 1,
        acceptedFiles: ".pdf, .doc, .docx",
        accept: function(file, done) {
            done();
        },
        init: function() {
            // untuk upload file
            this.on("addedfile", function() {
                if (this.files[1] != null) {
                    this.removeFile(this.files[1]);
                    swal("Gagal!", "Maaf Anda hanya mendapat mengupload 1 file!", "error");
                }
            });

            // untuk mengirim data
            this.on("sending", function(file, xhr, formData) {
                formData.append("id_materi", <?= $materi->id_materi ?>);
            });

            // jika berhasil
            this.on("success", function(file, response) {
                $('#modalAdd').modal('hide');
            })
        }
    };


    function load_chat() {
        $.ajax({
            type: 'POST',
            url: '<?= siswa_url() ?>materi/load_chat/<?= $materi->id_materi ?>',
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