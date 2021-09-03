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
            $('#inpmateri').attr('required', 'required');

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
                                location.reload();
                            });
                    }
                })
            }
        });
    }();

    // untuk pilih materi
    var untukPilihMateri = function() {
        $(document).on('change', '#inppenugasan', function() {
            var ini = $(this);

            $.ajax({
                method: 'post',
                url: '<?= guru_url() ?>tugas/get_materi',
                data: {
                    id_penugasan: ini.val()
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#inpmateri').empty().append('option');
                },
                success: function(response) {
                    $('#inpmateri').append(new Option('- Pilih -', ''));
                    $.each(response, function(index, value) {
                        $('#inpmateri').append(new Option(`(${value.kelas}) ${value.mapel} ${value.judul}`, value.id_materi));
                    });
                    $("#inpmateri").selectpicker("refresh");
                }
            })
        });
    }();

    // untuk pilih jenis ujian tambah data
    var untukJenisTugasTambah = function() {
        $(document).on('change', '#inpjenistugas', function() {
            if (this.value === 'pekerjaan_rumah') {
                $('#pekerjaan_rumah').removeAttr('style');
            } else {
                $('#pekerjaan_rumah').attr('style', 'display: none;');
            }
        });
    }();

    // untuk pilih jenis ujian ubah data
    var untukJenisTugasTambah = function() {
        $(document).on('change', '#inpjenistugasubah', function() {
            if (this.value === 'pekerjaan_rumah') {
                $('#get-form-upd #pekerjaan_rumah').removeAttr('style');
            } else {
                $('#get-form-upd #pekerjaan_rumah').attr('style', 'display: none;');
            }
        });
    }();
</script>