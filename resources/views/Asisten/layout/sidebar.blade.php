 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-white elevation-4"style="
    background-color: #001F3F;">
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
          <a href="{{ route('asisten.Home') }}" class="d-block text-light">JERRI CHRISTIAN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-header rounded"style="
    background-color: #EAD8B1;">DAILY</li>
          <li class="nav-item">
            <a href="{{ route('BibleReading.index') }}" class="nav-link {{ ($title == "Bible Reading") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Bible Reading
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_Memorizing') }}" class="nav-link {{ ($title == "Memorizing Verses") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Memorizing Verses
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_Hymn') }}" class="nav-link {{ ($title == "Hymn") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Hymn
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_TimesPrayer') }}" class="nav-link {{ ($title == "5 Times Prayer") ? 'active bg-info' :'' }}">
              <p class="text-light">
                5 Times Prayer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_Personalgoals') }}" class="nav-link {{ ($title == "Personal goals") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Personal goals
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_GoodLand') }}" class="nav-link {{ ($title == "Good Land") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Good Land
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_PrayerBook') }}" class="nav-link {{ ($title == "Prayer Book") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Prayer Book
              </p>
            </a>
          </li>
          <!-- Sidebar jurnal Mingguan -->
          <li class="nav-header rounded"style="
    background-color: #EAD8B1;">WEEKLY</li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_SummaryOfMinistry') }}" class="nav-link {{ ($title == "Summary Of Ministry") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Summary Of Ministry
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('Asisten.A_Fellowship') }}" class="nav-link {{ ($title == "Fellowship") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Fellowship
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_ScriptTs') }}" class="nav-link {{ ($title == "Script Ts") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Script Ts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_Agenda') }}" class="nav-link {{ ($title == "Agenda") ? 'active bg-info' :'' }}">
              <p class="text-light">
               Agenda
              </p>
            </a>
          </li>

          <li class="nav-header rounded"style="
    background-color: #EAD8B1;">REPORT</li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_FinancialStatements') }}" class="nav-link {{ ($title == "FinancialStatements") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Financial Statements
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Asisten.A_JournalReport') }}" class="nav-link {{ ($title == "Journal Report") ? 'active bg-info' :'' }}">
              <p class="text-light">
                Weekly Journal Report
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