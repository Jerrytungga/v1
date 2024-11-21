 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-white elevation-4"style="
    background-color: #006A67;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <h3 class="text-bold text-light text-center">JURNAL FTTI</h3>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="{{route('admin.Home')}}" class="d-block text-light">ADMINISTRATOR</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-header rounded"style="
    background-color: #EAD8B1;">USER</li>
          <li class="nav-item">
            <a href="{{route('trainee.index')}}" class="nav-link {{ ($title == "TRAINEE") ? 'active bg-info' :'' }}">
              <p class="text-light">
                TRAINEE
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{route('asisten.index')}}" class="nav-link {{ ($title == "ASISTEN") ? 'active bg-info' :'' }}">
              <p class="text-light">
                ASISTEN
              </p>
            </a>
          </li>
        
         





          <li class="nav-header rounded"style="
    background-color: #EAD8B1;">DATA</li>
          <li class="nav-item">
            <a href="{{route('weekly.index')}}" class="nav-link {{ ($title == "Week") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Weekly
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('report.w')}}" class="nav-link {{ ($title == "report") ? 'active bg-info' :'' }}">
              <p class="text-light">
                View Report Jurnal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('poin.index')}}" class="nav-link {{ ($title == "Target") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Target Poin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('Announcement.index')}}" class="nav-link {{ ($title == "Announcement") ? 'active bg-info' :'' }}">
              <p class="text-light">
              Announcement
              </p>
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
    <div class="alert m-3 alert-danger" role="alert">
    {{ $error }}
    </div>
    @endforeach
   @endif
  </aside>