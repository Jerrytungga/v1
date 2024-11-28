@extends('Asisten.layout.main')
@section('content')

   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          {{-- Display session message if exists --}}
            @if (session('role'))
            <div class="alert  m-2 alert-success alert-dismissible fade show" role="alert">
         <strong>Congratulations!</strong>, you have successfully logged in as an {{ session('role') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         @endif
          </div>
        </div>
      </div>
    </section>

    @if (empty($Week))
<script>
        Swal.fire({
            title: "Announcement",
            text: "Sorry, at this time the journal system cannot be used because the current week has not been activated, please notify the admin.",  // Pesan Anda
            icon: "warning",  // Ikon segitiga tanda seru
            confirmButtonText: "OK",
            customClass: {
                title: 'swal-title-red'  // Menambahkan kelas CSS khusus pada title
            },
            showClass: {
                popup: 'animate__animated animate__bounceIn'  // Animasi Bounce In saat popup muncul
            },
            hideClass: {
                popup: 'animate__animated animate__bounceOut'  // Animasi Bounce Out saat popup ditutup
            }
        });
    </script>
@endif
<head>
    <!-- CDN Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<style>
    .swal-title-red {
        color: red !important;  /* Menetapkan warna merah untuk title */
    }
</style>

@endsection


