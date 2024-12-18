
<!-- jQuery -->
<script src="{{ asset('../plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('../plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('../plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('../plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('../plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>

<script>
  $(function () {
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



</body>
</html>
