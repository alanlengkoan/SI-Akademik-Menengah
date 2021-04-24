    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>

    <script>
        // untuk get data peta
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '<?= guru_url() ?>dashboard/calender',
                dataType: 'json',
                success: function(response) {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        headerToolbar: {
                            left: 'dayGridMonth,timeGridWeek,timeGridDay',
                            center: 'title',
                            right: 'today,prevYear,prev,next,nextYear,'
                        },
                        footerToolbar: {
                            left: '',
                            center: '',
                            right: 'prev,next'
                        },
                        eventSources: [response],
                        eventClick: function(info) {
                            swal('Info!', info.event.title, 'info');
                        },
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