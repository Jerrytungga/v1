 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-white elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <h3 class="text-bold text-primary text-center">JURNAL FTTI</h3>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="{{ route('trainee.Home') }}" class="d-block">JERRI CHRISTIAN</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-header bg-blue rounded">DAILY</li>
          <li class="nav-item">
            <a href="{{ route('BibleReading.index') }}" class="nav-link {{ ($title == "Bible Reading") ? 'active bg-dark' :'' }}">
              <p>
                Bible Reading
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.Memorizing') }}" class="nav-link {{ ($title == "Memorizing Verses") ? 'active bg-dark' :'' }}">
              <p>
                Memorizing Verses
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.Hymn') }}" class="nav-link {{ ($title == "Hymn") ? 'active bg-dark' :'' }}">
              <p>
                Hymn
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.TimesPrayer') }}" class="nav-link {{ ($title == "5 Times Prayer") ? 'active bg-dark' :'' }}">
              <p>
                5 Times Prayer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.Personalgoals') }}" class="nav-link {{ ($title == "Personal goals") ? 'active bg-dark' :'' }}">
              <p>
                Personal goals
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.GoodLand') }}" class="nav-link {{ ($title == "Good Land") ? 'active bg-dark' :'' }}">
              <p>
                Good Land
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.PrayerBook') }}" class="nav-link {{ ($title == "Prayer Book") ? 'active bg-dark' :'' }}">
              <p>
                Prayer Book
              </p>
            </a>
          </li>
          <!-- Sidebar jurnal Mingguan -->
          <li class="nav-header bg-blue rounded">WEEKLY</li>
          <li class="nav-item">
            <a href="{{ route('trainee.SummaryOfMinistry') }}" class="nav-link {{ ($title == "Summary Of Ministry") ? 'active bg-dark' :'' }}">
              <p>
                Summary Of Ministry
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('trainee.Fellowship') }}" class="nav-link {{ ($title == "Fellowship") ? 'active bg-dark' :'' }}">
              <p>
                Fellowship
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.ScriptTs') }}" class="nav-link {{ ($title == "Script Ts") ? 'active bg-dark' :'' }}">
              <p>
                Script Ts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.Agenda') }}" class="nav-link {{ ($title == "Agenda") ? 'active bg-dark' :'' }}">
              <p>
               Agenda
              </p>
            </a>
          </li>

          <li class="nav-header bg-blue rounded">REPORT</li>
          <li class="nav-item">
            <a href="{{ route('trainee.FinancialStatements') }}" class="nav-link {{ ($title == "FinancialStatements") ? 'active bg-dark' :'' }}">
              <p>
                Financial Statements
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('trainee.JournalReport') }}" class="nav-link {{ ($title == "Journal Report") ? 'active bg-dark' :'' }}">
              <p>
                Weekly Journal Report
              </p>
            </a>
          </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>