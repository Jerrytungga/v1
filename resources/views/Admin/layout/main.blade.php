@include('Admin.layout.header')
<body class="hold-transition sidebar-mini">
@include('Admin.layout.navbar')
@include('Admin.layout.sidebar')
<!-- isi kontent utama -->
<div class="content-wrapper">
{{-- Alert --}}
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session("success") }}',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if (session('error'))
<script>
    Swal.fire({
        title: 'Error',
        text: '{{ session("error") }}',
        icon: 'error',
        confirmButtonText: 'OK',
        customClass: {
            confirmButton: 'btn btn-primary' // Change to the appropriate Bootstrap class
        }
    });
</script>
@endif


    @yield('content')
</div>
@include('Admin.layout.footer')
@include('Admin.layout.script')

