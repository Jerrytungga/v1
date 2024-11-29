@extends('Trainee.layout.main')
@section('content')
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
                    <th rowspan="2" class="col-1">Hymns number</th>
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
                        <td>{{ $hymns->frase }}
                        @if (!empty($hymns->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $hymns->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                        </blockquote>
                        @endif
                        </td>
                        <td>
                        @if($hymns && \Carbon\Carbon::parse($hymns->created_at)->isToday())
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
