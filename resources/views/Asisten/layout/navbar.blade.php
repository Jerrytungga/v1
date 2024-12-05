<div class="wrapper">
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-Success" style="
    background-color: #4A4947;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="
    color: #B17457;"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
       <h4 class="text-capitalize  text-bold"style="
    color: #B17457;">FULL TIME TRAINING INDONESIA</h4>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
      <form action="{{ route('auth.logout') }}" method="POST" id="logout-form">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->