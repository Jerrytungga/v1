@extends('Admin.layout.main')
@section('content')

   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          {{-- Display session message if exists --}}
            @if (session('role'))
            <div class="alert  m-2 alert-success alert-dismissible fade show" role="alert">
         <strong>Congratulations!</strong>, you have successfully logged in as an {{ session('role') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         @endif
          </div>
        </div>
      </div>
    </section>







 


@endsection


