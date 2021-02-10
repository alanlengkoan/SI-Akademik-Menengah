<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

<script>
    // untuk disabled reload
    function disableReload(e) {
        if (e.keyCode === 116 || e.keyCode === 82) e.preventDefault();
    };

    $(document).on("keydown", disableReload);

    // untuk waktu hitung mundur
    var upgradeTime = 60 * <?= (int) $detail->time ?>;
    var seconds = upgradeTime;

    var days = Math.floor(seconds / 24 / 60 / 60);
    var hoursLeft = Math.floor((seconds) - (days * 86400));
    var hours = Math.floor(hoursLeft / 3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
    var minutes = Math.floor(minutesLeft / 60);
    var remainingSeconds = seconds % 60;

    $('#time').text(pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds));

    function timer() {
        var days = Math.floor(seconds / 24 / 60 / 60);
        var hoursLeft = Math.floor((seconds) - (days * 86400));
        var hours = Math.floor(hoursLeft / 3600);
        var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
        var minutes = Math.floor(minutesLeft / 60);
        var remainingSeconds = seconds % 60;

        $('#time').text(pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds));

        if (seconds == 0) {
            clearInterval(countdownTimer);
            $('#add').click();
        } else {
            seconds--;
        }
    }

    function pad(n) {
        return (n < 10 ? "0" + n : n);
    }

    var countdownTimer = setInterval('timer()', 1000);

    // untuk tambah data
    var untukTambahData = function() {
        $(document).on('submit', '#form-add', function(e) {
            e.preventDefault();
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
                        $('#add').html('Menunggu');
                    },
                    success: function(response) {
                        swal({
                                title: response.title,
                                text: response.text,
                                icon: response.type,
                                button: response.button,
                            })
                            .then((value) => {
                                location.href = '<?= siswa_url() ?>ujian'
                            });
                    }
                })
            }
        });
    }();
</script>