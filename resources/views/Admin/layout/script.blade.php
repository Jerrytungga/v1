<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 JavaScript -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap JS -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Responsive JS -->
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example2').DataTable({
      "paging": true,             // Enable pagination
      "lengthChange": true,       // Allow users to change the number of entries per page
      "searching": true,          // Enable search
      "ordering": true,           // Enable sorting
      "info": true,               // Show information about data
      "autoWidth": false,         // Disable automatic column width adjustment
      "responsive": true,         // Enable responsive mode
      "pageLength": 10,           // Set the default number of entries per page
      "language": {
        "lengthMenu": "Show _MENU_ entries per page",
        "zeroRecords": "No matching records found",
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty": "Showing 0 to 0 of 0 entries",
        "infoFiltered": "(filtered from _MAX_ total entries)",
        "search": "Search:",
        "paginate": {
          "first": "First",
          "previous": "Previous",
          "next": "Next",
          "last": "Last"
        }
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "paging": true,             // Enable pagination
      "lengthChange": true,       // Allow users to change the number of entries per page
      "searching": true,          // Enable search
      "ordering": true,           // Enable sorting
      "info": true,               // Show information about data
      "autoWidth": false,         // Disable automatic column width adjustment
      "responsive": true,         // Enable responsive mode
      "pageLength": 10,           // Set the default number of entries per page
      "language": {
        "lengthMenu": "Show _MENU_ entries per page",
        "zeroRecords": "No matching records found",
        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty": "Showing 0 to 0 of 0 entries",
        "infoFiltered": "(filtered from _MAX_ total entries)",
        "search": "Search:",
        "paginate": {
          "first": "First",
          "previous": "Previous",
          "next": "Next",
          "last": "Last"
        }
      }
    });
  });
</script>

</body>
</html>
