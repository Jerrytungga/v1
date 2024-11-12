@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personal Goals</h1>
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
            <a href="{{route('personalgoal.create')}}" class="btn btn-success">Input Personal Goals</a>
            <!-- <a href="" class="btn btn-info">View Personal Goals Task</a> -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
            View Personal Goals Task
            </button>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                    <th class="col-1">Date</th>
                    <th class="col-3">Description</th>
                    <th class="col-1">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $data)
                  <tr>
                      <td class="col-2">{{ $data->created_at }}</td>
                      <td class="col-8">{{ $data->personalgoals }} 
                      @if (!empty($data->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                        </blockquote>
                        @endif
                      </td>
                      <td class="col-2">
                          @if (\Carbon\Carbon::parse($data->created_at)->diffInDays() < 1)
                          <a href="{{ route('personalgoal.edit', $data->id) }}" class="btn btn-warning">Edit</a>
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
   

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Personal Goals Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-info">
                  <tr>
                    <th class="col-1">No</th>
                    <th class="col-1">Date</th>
                    <th class="col-3">Description</th>
                    <th class="col-1">Start</th>
                    <th class="col-1">End</th>
                  </tr>
                
                  </thead>
                  <tbody>
                  @foreach($tasks as $index => $ambil_data)
                  <tr>
                  <td class="col-1">{{ $index + 1 }}</td>
                  <td class="col-2">{{ $ambil_data->created_at }}</td>
                  <td class="col-8">{{ $ambil_data->task }}</td>
                  <td class="col-8">{{ $ambil_data->start }}</td>
                  <td class="col-8">{{ $ambil_data->end }}</td>
                     
                  </tr>
                    @endforeach
                 
                  </tbody>
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
