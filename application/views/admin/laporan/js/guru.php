<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

<script>
    $('#report').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copy',
                className: 'btn btn-info',
                text: '<i class="fa fa-copy"></i>&nbsp;Copy'
            },
            {
                extend: 'excel',
                className: 'btn btn-success',
                text: '<i class="fa fa-file-excel-o"></i>&nbsp;Excel'
            },
            {
                extend: 'pdf',
                className: 'btn btn-danger',
                text: '<i class="fa fa-file-pdf-o"></i>&nbsp;Pdf'
            },
            {
                extend: 'csv',
                className: 'btn btn-warning',
                text: '<i class="fa fa-file-o"></i>&nbsp;CSV'
            },
            {
                extend: 'print',
                className: 'btn btn-primary',
                text: '<i class="fa fa-print"></i>&nbsp;Print'
            }
        ]
    });
</script>