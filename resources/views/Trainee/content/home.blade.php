@extends('Trainee.layout.main')
@section('content')
   <h1>Selamat Datang</h1>
   {{-- Display session message if exists --}}
        @if (session('role'))
            <div class="alert alert-success">
                You are logged in as: {{ session('role') }}
            </div>
        @else
            <div class="alert alert-warning">
                You are not logged in.
            </div>
        @endif
@endsection
