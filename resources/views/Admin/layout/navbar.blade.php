<div class="wrapper">
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-Success" style="
    background-color: #006A67;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-light"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
       <h4 class="text-capitalize  text-bold"style="
    color: #fff;">FULL TIME TRAINING INDONESIA</h4>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
      <form action="{{ route('auth.logout') }}" method="POST" id="logout-form">
          @csrf
          <button type="submit" class="btn btn-light">Logout</button>
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->