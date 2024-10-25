@include('Trainee.layout.header')
<body class="hold-transition sidebar-mini">
@include('Trainee.layout.navbar')
@include('Trainee.layout.sidebar')
<!-- isi kontent utama -->
<div class="content-wrapper">
    @yield('content')
</div>
@include('Trainee.layout.footer')
@include('Trainee.layout.script')

