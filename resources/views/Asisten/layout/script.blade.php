
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>





<style>
  /* Tabel DataTables */
  #example2_wrapper table.dataTable {
    table-layout: fixed; /* Lebar kolom tetap */
    width: 100%; /* Lebar tabel 100% */
  }

  /* Sticky Header */
  #example2_wrapper table.dataTable thead th {
    position: sticky; /* Posisi tetap untuk header */
    top: 0; /* Header menempel di bagian atas */
    z-index: 1000; /* Prioritaskan header agar selalu di atas */
    background-color: #0000; /* Warna background header */
    border-bottom: 1px solid #ddd; /* Tambahkan garis bawah */
  }

  /* Tingkatkan kerapatan dengan padding */
  #example2_wrapper table.dataTable th, 
  #example2_wrapper table.dataTable td {
    padding: 8px 10px; /* Sesuaikan kerapatan */
    white-space: normal; /* Bungkus teks panjang */
    word-wrap: break-word; /* Potong teks jika panjang */
    word-break: break-word; /* Kompatibilitas tambahan */
  }

  /* Scroll container untuk tabel */
  #example2_wrapper .dataTables_scrollBody {
    max-height: 400px; /* Tetapkan tinggi maksimal untuk scroll */
    overflow-y: auto; /* Scroll vertikal jika data melebihi tinggi */
    overflow-x: auto; /* Scroll horizontal jika kolom terlalu lebar */
  }
</style>

<script>
  // Inisialisasi DataTables
  let table = new DataTable('#example2', {
    responsive: true, // Tabel responsif
    autoWidth: false, // Nonaktifkan penyesuaian lebar otomatis
    scrollY: '400px', // Tetapkan tinggi maksimal tabel
    scrollX: true, // Scroll horizontal
    scrollCollapse: true, // Tinggi tabel menyesuaikan data
    paging: true, // Aktifkan pagination
    fixedHeader: true, // Header tetap saat scroll
    columnDefs: [
      { width: "30%", targets: "_all" } // Terapkan lebar kolom untuk semua
    ]
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
