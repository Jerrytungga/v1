@extends('Trainee.layout.main')
@section('content')
{{-- Alert --}}

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bible Reading</h1>
          </div>
        
        </div>
        <div class="goup" style="text-align: right;">
            <div class="goup" style="text-align: right;">
                <form action="{{ route('BibleReading.index') }}" method="GET">
                    <button name="filter" value="Old Testament" class="btn btn-outline-success ml-2 text-capitalize">Old Testament</button>
                    <button name="filter" value="New Testament" class="btn btn-outline-success ml-2 text-capitalize">New Testament</button>
                    <button name="filter" value="All" class="btn btn-outline-success ml-2 text-capitalize">All</button>
                </form>
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
            <a href="{{ route('BibleReading.create') }}" class="btn btn-success">Input Bible Reading</a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                    <th rowspan="2" class="col-1">Date</th>
                    <th rowspan="2" class="col-1">Book</th>
                    <th rowspan="2" class="col-1">Chapter</th>
                    <th>Inspiration</th>
                    <th rowspan="2" class="col-1">Action</th>
                  </tr>
                  <tr>
                   <th>Words/Phrases</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($entrys as $bible)
                    <tr>
                        <td>{{ $bible->created_at }}</td>
                        <td>{{ $bible->book }}</td>
                        <td>{{ $bible->verse }}</td>
                        <td>{{ $bible->phrase_light }}
                        @if (!empty($bible->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $bible->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                        </blockquote>
                        @endif
                        </td>
                        <td>
                        @if (\Carbon\Carbon::parse($bible->created_at)->diffInDays() < 1)
                            <a href="{{ route('BibleReading.edit', $bible->id) }}" class="btn btn-warning">Edit</a>
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
