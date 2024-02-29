<!-- js -->

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<script src="/panel/vendors/scripts/core.js"></script>
<script src="/panel/vendors/scripts/script.min.js"></script>
<script src="/panel/vendors/scripts/process.js"></script>
<script src="/panel/vendors/scripts/layout-settings.js"></script>
{{-- <script src="/panel/src/plugins/apexcharts/apexcharts.min.js"></script> --}}
{{-- <script src="/panel/src/plugins/datatables/js/jquery.dataTables.min.js"></script> --}}
<script src="/panel/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="/panel/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="/panel/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard3.js"></script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
        style="display: none; visibility: hidden"></iframe></noscript>
<script src="/panel/src/scripts/main.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>



<script>
    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            dom: 'Bfrtip', // Specify 'B' for buttons
            buttons: ['copy', 'excel', 'csv', 'pdf', 'print'],
            responsive: true,
        });
    });
</script>





