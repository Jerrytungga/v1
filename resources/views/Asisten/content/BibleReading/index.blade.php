@extends('Asisten.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bible Reading</h1>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center" style="background-color: #001F3F; color:#fff;">
                    <tr>
                        <th>No</th>
                        <th>Trainee</th>
                        <th>Batch</th>
                        <th>Semester</th>
                        <th>Poin</th>
                    </tr>
                   
                  </thead>
                  <tbody>
                  @foreach ($entrys as $index => $Trainee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td> <a href="{{ route('BibleReading.show', $Trainee->nip) }}">{{ $Trainee->name }}</a></td>
                        <td>{{ $Trainee->batch }}</td>
                        <td>{{ $Trainee->semester }}</td>
                        <td>
                       
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
