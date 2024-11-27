@include('Asisten.layout.header')
<body class="hold-transition sidebar-mini">
@include('Asisten.layout.navbar')
@include('Asisten.layout.sidebar')


<!-- isi kontent utama -->
<div class="content-wrapper">
    @yield('content')
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
</div>
@include('Asisten.layout.footer')
@include('Asisten.layout.script')

