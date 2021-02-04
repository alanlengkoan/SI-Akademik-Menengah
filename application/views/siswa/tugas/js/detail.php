<script src="<?= assets_url() ?>admin/js/dropzone/dropzone.js"></script>

<script>
    Dropzone.options.formAdd = {
        maxFiles: 1,
        acceptedFiles: ".pdf",
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
                formData.append("id_tugas", <?= $data->id_tugas ?>);
            });

            // jika berhasil
            this.on("success", function(file, response) {
                swal({
                        title: response.title,
                        text: response.text,
                        icon: response.type,
                        button: response.button,
                    })
                    .then((value) => {
                        location.reload();
                    });
            })
        }
    };
</script>