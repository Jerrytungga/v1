<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background-color: #B17457;">
  <!-- Brand Logo -->
  <a href="" class="brand-link d-flex align-items-center">
    <i class="fas fa-book-open fa-2x logo-icon"></i>
    <h3 class="text-bold d-inline-block ml-2 brand-text">JURNAL FTTI</h3>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('asisten.Home') }}" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>{{ session('nama') }}</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('htrainee.asisten') }}" class="nav-link {{ ($title == 'myTrainee') ? 'active ' : '' }}">
            <i class="fas fa-users nav-icon"></i>
            <p class="">My Trainee</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{ route('notif.index') }}" class="nav-link {{ ($title == 'Announcement') ? 'active' : '' }}">
            <i class="fas fa-bell nav-icon"></i>
            <p class="">Announcement</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('HaventCompletedtheJournal') }}" class="nav-link {{ ($title == 'Jurnal') ? 'active' : '' }}">
            <i class="fas fa-book nav-icon"></i>
            <p class="">Jurnal</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

  <!-- Alert untuk mengakses ke halaman lain -->
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert m-3 alert-danger" role="alert">{{ $error }}</div>
    @endforeach
  @endif
</aside>

<!-- FontAwesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<style>
  /* Styling untuk Brand Logo dan Sidebar */
  .brand-link {
    display: flex;
    align-items: center;
    padding: 7px 20px;
    background: #4A4947;
    border-bottom: 1px solid #ddd;
  }

  .logo-icon {
    color: #B17457;
  }

  .brand-text {
    font-weight: bold;
    color: #B17457;
    font-size: 1.25rem;
    margin-left: 10px;
  }

  /* Hover effect untuk brand-link */
  .brand-link:hover {
    background-color: #000;
  }

  /* Sidebar Menu */
  .nav-sidebar .nav-item .nav-link {
    color: #f8f9fa;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s, color 0.3s;
  }

  /* Hover Effect dan Active Link Styling */
  .nav-sidebar .nav-item .nav-link:hover {
    background-color: #D8D2C2;
    color: #000;
    border-radius: 4px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  .nav-sidebar .nav-item .nav-link.active {
    background-color: #4A4947;
    color: #fff;
  }

  /* Responsive Adjustments */
  @media (max-width: 767px) {
    .brand-text {
      display: none;
    }

    .logo-icon {
      margin-left: 0;
    }
  }

  /* Sidebar header styling */
  .nav-header.bg-gradient-success {
    font-weight: bold;
    color: #fff;
    background-color: #28a745;
    padding: 10px;
    border-radius: 5px;
  }

  .nav-header.bg-gradient-success:hover {
    background-color: #218838;
  }
</style>
