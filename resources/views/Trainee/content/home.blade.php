@extends('Trainee.layout.main')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Welcome</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




    <div class="row m-2">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Name : Jerri Christian Gedeon Tungga</h5>
        <p class="card-text">Batch : 52 <br> Semester : 1 <br> Asisten : Elohim <br> Nip : 11213 <br> Password : Makassar</p>
        <a href="#" class="btn btn-warning">Update Profile</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>

</div>


@if($Announcement)
    <div class="alert ml-3 mr-3 mt-1" role="alert" style="background-color: #FFFF; color:black;">
      <h4 class="alert-heading text-danger text-bold soft-blink">Announcement!</h4>
      <p>{{ $Announcement->announcement }}</p>
      <hr>
      <p class="mb-0 from-admin">From Admin</p>
    </div>
 
  @endif

  @if ($message)
    <div class="alert m-3" style="background-color: #B3C8CF; color:black;">
        {{ $message }}
    </div>
@endif



<style>
    /* Animasi kedap-kedip yang lembut */
    @keyframes softBlink {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }

    /* Menambahkan animasi soft blink pada teks h4 */
    .soft-blink {
        animation: softBlink 2s ease-in-out infinite;
    }

    /* Mengubah teks "From Admin" menjadi miring dan biru */
    .from-admin {
        font-style: italic;  /* Miringkan teks */
        color: blue;         /* Beri warna biru pada teks */
    }
</style>



<div class="alert ml-3 mb-2 mr-3 mt-1" role="alert" style="
    background-color: #FAF5E4;">
  <h4 class="alert-heading text-danger text-bold soft-blink">Announcement!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0 from-admin">From Asisten</p>
</div><br>

    
   <!-- {{-- Display session message if exists --}}
        @if (session('role'))
            <div class="m-2 alert alert-success">
                You are logged in as: {{ session('role') }}
            </div>
        @else
            <div class="alert alert-warning">
                You are not logged in.
            </div>
        @endif -->
@endsection

