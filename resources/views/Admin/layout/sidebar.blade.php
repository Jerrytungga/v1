<style>
    /* Menyesuaikan ukuran dan margin logo di sidebar dan navbar */
.brand-link, .navbar-brand {
    display: flex;
    align-items: left;
    justify-content: left;
    padding: 6.7px;
    margin-left: 10px;
}

.logo-icon {
    font-size: 2rem; /* Ukuran ikon sama di sidebar dan navbar */
}

.brand-text {
    margin-left: 20px;
    font-weight: bold;
    font-size: 1.5rem;
    text-transform: uppercase;
}

.navbar .brand-text {
    font-size: 1.75rem; /* Menyesuaikan ukuran di navbar jika perlu */
}

</style>
<aside class="main-sidebar elevation-4" style="background-color: #006A67; position: fixed;">

<a href="" class="brand-link d-flex align-items-center">
    <i class="fas fa-book-open text-light fa-2x logo-icon"></i>
    <h3 class="text-bold text-center text-light d-inline-block ml-2 brand-text">JURNAL</h3>
</a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
                <!-- User Section -->
                <li class="nav-header rounded mb-3" style="background-color: #ffff; color:black;">
                <a href="{{ route('admin.Home') }}" class="d-block ">ADMINISTRATOR</a>
                </li>
       


                <li class="nav-header rounded mb-1" style="background-color: #EAD8B1;">USER</li>
                <li class="nav-item">
                    <a href="{{ route('trainee.index') }}" class="nav-link {{ ($title == 'TRAINEE') ? 'active bg-info' : '' }}">
                        <i class="fas fa-user-graduate nav-icon text-white"></i>
                        <p class="text-light">TRAINEE</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('asisten.index') }}" class="nav-link {{ ($title == 'ASISTEN') ? 'active bg-info' : '' }}">
                        <i class="fas fa-chalkboard-teacher nav-icon text-white"></i>
                        <p class="text-light">ASISTEN</p>
                    </a>
                </li>

                <!-- Settings Section -->
                <li class="nav-header rounded" style="background-color: #EAD8B1;">SETTINGS</li>
                <li class="nav-item">
                    <a href="{{ route('weekly.index') }}" class="nav-link {{ ($title == 'Week') ? 'active bg-info' : '' }}">
                        <i class="fas fa-calendar-week nav-icon text-white"></i>
                        <p class="text-light">WEEKLY</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('report.w') }}" class="nav-link {{ ($title == 'report') ? 'active bg-info' : '' }}">
                        <i class="fas fa-clipboard-list nav-icon text-white"></i>
                        <p class="text-light">VIEW REPORT JOURNAL</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('poin.index') }}" class="nav-link {{ ($title == 'Target') ? 'active bg-info' : '' }}">
                        <i class="fas fa-bullseye nav-icon text-white"></i>
                        <p class="text-light">TARGET POINTS</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('Announcement.index') }}" class="nav-link {{ ($title == 'Announcement') ? 'active bg-info' : '' }}">
                        <i class="fas fa-bullhorn nav-icon text-white"></i>
                        <p class="text-light">ANNOUNCEMENT</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('batch.index') }}" class="nav-link {{ ($title == 'Batch') ? 'active bg-info' : '' }}">
                        <i class="fas fa-users nav-icon text-white"></i>
                        <p class="text-light">BATCH</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('item.jurnal') }}" class="nav-link {{ ($title == 'jurnal') ? 'active bg-info' : '' }}">
                        <i class="fas fa-book nav-icon text-white"></i>
                        <p class="text-light">ITEM JOURNAL</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('report_view_jurnal') }}" class="nav-link {{ ($title == 'Report') ? 'active bg-info' : '' }}">
                        <i class="fas fa-book nav-icon text-white"></i>
                        <p class="text-light">REPORT JOURNAL</p>
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

<!-- External Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
