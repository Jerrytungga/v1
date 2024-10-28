@extends('Trainee.layout.main')
@section('content')

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
     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Memorizing Verses</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <a href="{{ route('MemorizingVerses.create') }}" class="btn btn-success">Input Memorizing Verses</a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center bg-primary font-weight-bold">
                     <tr>
                        <td>Date</td>
                        <td>Bible</td>
                        <td>Paraf</td>
                        <td>Action</td>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $memorizingverses)
                  <tr>
                  <td>{{ $memorizingverses->created_at }}</td>
                  <td>{{ $memorizingverses->bible }}</td>
                  <td>{{ $memorizingverses->paraf }}</td>
                  <td>
                  @if (\Carbon\Carbon::parse($memorizingverses->created_at)->diffInDays() < 1)
                            <a href="{{ route('MemorizingVerses.edit', $memorizingverses->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                  </td>
                    
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
   
@endsection
