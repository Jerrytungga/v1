
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

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


{{-- JavaScript Section --}}
   @push('scripts')
       <script>
           // Menghilangkan alert secara otomatis setelah 5 detik (5000 ms)
           setTimeout(() => {
               const alert = document.querySelector('.alert');
               if (alert) {
                   alert.classList.remove('show');
                   alert.classList.add('fade');
                   setTimeout(() => {
                       alert.remove();
                   }, 300); // waktu untuk fade out
               }
           }, 5000); // waktu untuk menghilangkan alert (dalam ms)
       </script>
   @endpush
</body>
</html>
