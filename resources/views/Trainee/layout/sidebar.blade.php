<aside class="main-sidebar sidebar-light-dark elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('trainee.Home') }}" class="brand-link d-flex align-items-center">
    <i class="fas fa-journal-whills fa-2x text-primary logo-icon"></i>  <!-- FontAwesome Icon -->
    <h3 class="text-bold text-primary d-inline-block ml-2 brand-text">JURNAL FTTI</h3>  <!-- Brand Text -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
   
    

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{ route('trainee.Home') }}" class="nav-link">
            <i class="fas fa-user nav-icon"></i>
            <p>
            {{ session('name') }}
            </p>
          </a>
        </li>
        
        @php
          $activeDailyItems = \App\Models\Itemjurnal::where('type', 'daily')->where('status', 'active')->get();
        @endphp
            <!-- Check if there are any active daily items -->
        @if($activeDailyItems->isNotEmpty())
          <li class="nav-header bg-gradient-success rounded text-white">DAILY</li>
          
          <!-- Loop through each active daily item -->
          @foreach($activeDailyItems as $menu)
            <li class="nav-item">
              <a href="{{ route($menu->route) }}" class="nav-link {{ (request()->is(str_replace('.', '/', $menu->route))) ? 'active' : '' }}">
                <i class="{{ $menu->icon }} nav-icon"></i>
                <p>{{ $menu->name }}</p>
              </a>
            </li>
          @endforeach
        @endif



        @php
          $activeWeeklyItems = \App\Models\Itemjurnal::where('type', 'weekly')->where('status', 'active')->get();
        @endphp

        <!-- Check if there are any active weekly items -->
        @if($activeWeeklyItems->isNotEmpty())
          <li class="nav-header bg-gradient-success rounded text-white">WEEKLY</li>
          
          <!-- Loop through each active weekly item -->
          @foreach($activeWeeklyItems as $menu)
            <li class="nav-item">
              <a href="{{ route($menu->route) }}" class="nav-link {{ (request()->is(str_replace('.', '/', $menu->route))) ? 'active' : '' }}">
                <i class="{{ $menu->icon }} nav-icon"></i>
                <p>{{ $menu->name }}</p>
              </a>
            </li>
          @endforeach
        @endif


        @php
          $activeReports = \App\Models\Itemjurnal::where('type', 'report')->where('status', 'active')->get();
        @endphp

        <!-- Check if there are any active reports -->
        @if($activeReports->isNotEmpty())
          <li class="nav-header bg-gradient-success rounded text-white">REPORT</li>
          
          <!-- Loop through each active report item -->
          @foreach($activeReports as $menu)
            <li class="nav-item">
              <a href="{{ route($menu->route) }}" class="nav-link {{ (request()->is(str_replace('.', '/', $menu->route))) ? 'active' : '' }}">
                <i class="{{ $menu->icon }} nav-icon"></i>
                <p>{{ $menu->name }}</p>
              </a>
            </li>
          @endforeach
        @endif

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<style>
  /* Elegant Sidebar Color Scheme */
  .main-sidebar {
    background: linear-gradient(180deg, #005792, #00204A); /* Elegant gradient */
    border-right: 1px solid #ddd;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  /* Brand logo and text styling */
  .brand-link {
    display: flex;
    align-items: center;
    padding: 7px 20px;
    background: #ffffff;
    border-bottom: 1px solid #ddd;
  }

  .logo-icon {
    color: #007bff;
  }
  .nav-item .nav-link:hover{
    background-color: #f8f9fa;
    color: #ffffff;
  }

  .brand-text {
    display: inline-block;
    font-weight: bold;
    color: #333;
    font-size: 1.25rem;
    margin-left: 10px;
  }

  /* Hover effect on brand link */
  .brand-link:hover {
    background-color: #f8f9fa;
  }

  /* Sidebar menu items */
  .nav-sidebar .nav-item .nav-link {
    color: #f8f9fa;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  /* Hover effect for sidebar links */
  .nav-sidebar .nav-item .nav-link:hover {
    background-color: #f8f9fa;
    color: #ffffff;
  }

  /* Active link style */
  .nav-sidebar .nav-item .nav-link.active {
    background-color: #0069d9;
    color: #ffffff;
  }

  /* Style for navbar */
  .main-header.navbar {
    background-color: #ffffff;
    border-bottom: 1px solid #ddd;
  }

  .main-header .navbar-nav {
    margin-left: 15px;
  }

  .navbar-nav .nav-item .nav-link {
    color: #495057;
  }

  .navbar-nav .nav-item .nav-link:hover {
    color: #007bff;
  }

  .navbar-nav .nav-item .nav-link.active {
    color: #007bff;
  }

  /* Responsive adjustments */
  @media (max-width: 767px) {
    .brand-text {
      display: none;
    }
    .logo-icon {
      margin-left: 0;
    }
  }

  /* Navbar brand text */
  .main-header .nav-item h4 {
    font-weight: bold;
    text-transform: capitalize;
  }

  /* Adjust right navbar links for logout and fullscreen */
  .navbar-nav.ml-auto {
    margin-left: auto;
  }

  .btn-danger {
    background-color: #dc3545;
    border: none;
  }

  /* Sidebar menu items */
.nav-sidebar .nav-item .nav-link {
  color: #f8f9fa; /* Default text color */
  padding: 12px 20px;
  font-size: 16px;
  font-weight: 500;
  transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hover effect for sidebar links */
.nav-sidebar .nav-item .nav-link:hover {
  background-color: #007bff; /* Change hover background to bright blue */
  color: #ffffff !important;  /* Ensure font color changes to white on hover */
  border-radius: 4px; /* Rounded corners */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for effect */
}

/* Active link style */
.nav-sidebar .nav-item .nav-link.active {
  background-color: #0069d9; /* Active background color */
  color: #ffffff; /* Active link text color */
  border-radius: 4px;
}

/* Active item hover effect */
.nav-sidebar .nav-item .nav-link.active:hover {
  background-color: #0056b3; /* Darken active background on hover */
  color: #ffffff; /* Keep text color white */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Sidebar header (Daily, Weekly, Report sections) */
.nav-header.bg-gradient-success {
  font-weight: bold;
  color: #fff;
  background-color: #28a745; /* Green background */
  padding: 10px;
  border-radius: 5px;
}

/* Hover effect for section headers */
.nav-header.bg-gradient-success:hover {
  background-color: #218838; /* Darken background on hover */
  color: #fff; /* Keep the text white */
}

</style>
<!-- FontAwesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
