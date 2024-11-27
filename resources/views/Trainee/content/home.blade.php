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

    {{-- Display session message if exists --}}
        @if (session('role'))
            <div class="m-2 mr-2 alert alert-success">
                You are logged in as: {{ session('role') }}
            </div>
        @else
            <div class="m-2 alert alert-warning">
                You are not logged in.
            </div>
        @endif


        <div class="row m-2">
  
  <!-- Card 1 (User Info) -->
  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card custom-card">
      <div class="card-body">
        <h5 class="card-title">Name: {{ $ambil->name }}</h5>
        <p class="card-text">
          Batch: {{ $ambil->batch }} <br>
          Semester: {{ $ambil->semester }} <br> 
          @php
          $asisten = \App\Models\Asisten::where('nip', $ambil->asisten_id)->first();
          @endphp
          Asisten: {{ $asisten ? $asisten->name : 'No Asisten' }} <br>
          Nip: {{ $ambil->nip }} <br> 
          Password: {{ $ambil->password }}
        </p>
        <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#changePasswordModal">Change Password</a>
      </div>
    </div>
  </div>

  <!-- Card 2 (Balance 1) -->
  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card custom-card">
      <div class="card-body">
        <h5 class="card-title">Total Incoming Balance</h5>
        <h3 class="card-text" id="balanceValue">
        @if($total)
        Rp. {{ number_format($total->total_pemasukan, 0, ',', '.') }}
        @else
        Rp. 0
       @endif

        </h3>
        <p class="card-text">Your total incoming for this week.</p>
        <a href="{{ route('keuangan.index') }}" class="btn btn-light">View Details</a>
      </div>
    </div>
  </div>

  <!-- Card 3 (Balance 2) -->
  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card custom-card">
        <div class="card-body">
        <h5 class="card-title">Total Expenses Balance</h5>
            <!-- Dynamically display the total pengeluaran -->
            <h3 class="card-text" id="balanceValue">
                @if($total)
                    Rp. {{ number_format($total->total_pengeluaran, 0, ',', '.') }}
                @else
                    Rp. 0
                @endif
            </h3>
            <p class="card-text">Your total expenses for this week.</p>
            <a href="{{ route('keuangan.index') }}" class="btn btn-light">View Details</a>
        </div>
    </div>
</div>


</div>

<!-- Custom CSS -->
<style>
  .custom-card {
    background: linear-gradient(145deg, #6a8dff, #5f76d1); /* Attractive gradient background */
    border-radius: 10px; /* Consistent rounded corners for all cards */
    color: white; /* White text to contrast with the background */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for a modern look */
    padding: 20px; /* Inner padding for the content */
  }

  .custom-card .btn-light {
    background-color: #ffffff;
    color: #5f76d1;
    border: 1px solid #5f76d1;
  }

  .custom-card .btn-light:hover {
    background-color: #5f76d1;
    color: white;
  }

  .card-title {
    font-weight: bold;
  }

  .card-text {
    font-size: 18px;
  }

  /* Responsive column sizing */
  @media (max-width: 767px) {
    .col-sm-12 {
      flex: 0 0 100%; /* Stack cards vertically on mobile */
    }
  }

  @media (min-width: 768px) and (max-width: 991px) {
    .col-md-6 {
      flex: 0 0 50%; /* Cards will be 50% width on medium-sized screens */
    }
  }

  @media (min-width: 992px) {
    .col-lg-4 {
      flex: 0 0 33.333%; /* Cards will take up 33% width on larger screens */
    }
  }
</style>



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


@if($pesan_Asisten)
    
    <div class="alert ml-3 mb-2 mr-3 mt-1" role="alert" style="
        background-color: #FAF5E4;">
      <h4 class="alert-heading text-danger text-bold soft-blink">Announcement!</h4>
      <p>{{ $pesan_Asisten->pesan }}</p>
      <hr>
      <p class="mb-0 from-admin">From Asisten</p>
    </div><br>
 
  @endif

   <!-- Modal for Change Password -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('change.password', ['id' => $ambil->id]) }}" method="POST">
        @csrf
        @method('PATCH') <!-- Assuming you are using PATCH to update the password -->
        <div class="modal-body">
          <!-- New Password Field -->
          <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="text" class="form-control" value="{{ $ambil->password }}" id="newPassword" name="new_password" required>
          </div>
          <!-- Confirm Password Field -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
 
@endsection

