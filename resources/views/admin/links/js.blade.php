    <script src="{!! asset('admin/plugins/jquery/jquery.min.js') !!}"></script>
    <!-- Bootstrap 4 -->
    <script src="{!! asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{!! asset('admin/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>

    <script src="{!! asset('admin/plugins/jszip/jszip.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/pdfmake/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/pdfmake/vfs_fonts.js') !!}"></script>
    <script src="{{asset('admin/chart.js/Chart.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
    $(document).ready(function (){
        $('#msg').click(function (){
            $(this).text(' ');
        });
    });
    </script>
    <script>
        initSample();
    </script>