@include('Asisten.layout.header')
<body class="hold-transition sidebar-mini">
@include('Asisten.layout.navbar')
@include('Asisten.layout.sidebar')
<!-- isi kontent utama -->
<div class="content-wrapper">
    @yield('content')
</div>
@include('Asisten.layout.footer')
@include('Asisten.layout.script')

