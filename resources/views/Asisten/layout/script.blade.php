
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script>
  let table = new DataTable('#example2', {
    responsive: true
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
