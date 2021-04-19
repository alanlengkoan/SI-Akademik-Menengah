    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>

    <script>
        // untuk get data peta
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '<?= siswa_url() ?>dashboard/calender',
                dataType: 'json',
                success: function(response) {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        titleFormat: {
                            month: 'long',
                            year: 'numeric',
                            day: 'numeric',
                            weekday: 'long'
                        },
                        eventSources: [response],
                    });
                    calendar.render();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var errorMsg = 'Request Ajax Gagal : ' + xhr.responseText;
                    alert(errorMsg);
                }
            });
        });
    </script>