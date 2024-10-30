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
            <h1>My Hymns</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->

  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <a href="{{ route('Hymns.create') }}" class="btn btn-success">Input Hymns</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                    <th rowspan="2" class="col-1">Date</th>
                    <th rowspan="2" class="col-1">Number Hymns</th>
                    <th rowspan="2" class="col-1">Stanza</th>
                    <th>Inspiration</th>
                    <th rowspan="2" class="col-1">Action</th>
                  </tr>
                  <tr>
                   <th>Words/Phrases</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $hymns)
                    <tr>
                        <td>{{ $hymns->created_at }}</td>
                        <td>{{ $hymns->no_Hymns }}</td>
                        <td>{{ $hymns->stanza }}</td>
                        <td>{{ $hymns->frase }}</td>
                        <td>
                        @if (\Carbon\Carbon::parse($hymns->created_at)->diffInDays() < 1)
                            <a href="{{ route('Hymns.edit', $hymns->id) }}" class="btn btn-warning">Edit</a>
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
