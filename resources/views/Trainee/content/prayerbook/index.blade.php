@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Prayer Book</h1>
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
            <a href="{{ route('prayerbook.create') }}" class="btn btn-success">Input Prayer Book</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                     <tr>
                     <th style="width: 15%;">Prayer Date</th>
                     <th style="width: 15%;">Topic</th>
                     <th style="width: 15%;">Light</th>
                     <th style="width: 20%;">Appreciation</th>
                     <th style="width: 20%;">Action</th>
                     <th style="width: 15%;">Prayer Answered Date</th>
                     <th style="width: 15%;">Prayer Answer</th>
                     <th style="width: 10%;">Settings</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $data)
                  <tr>
                      <td class="col-1">{{ $data->prayer_date }}</td>
                      <td class="col-4">{{ $data->topic }}
                      @if (!empty($data->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                        </blockquote>
                        @endif

                      </td>
                      <td class="col-4">{{ $data->light }}</td>
                      <td class="col-4">{{ $data->appreciation }}</td>
                      <td class="col-4">{{ $data->action }}</td>
                      <td class="col-4">{{ $data->prayer_answered_date }}</td>
                      <td class="col-4">{{ $data->prayer_answer }}</td>
                      <td class="col-8">
                      @if(empty($data->prayer_answer) && empty($data->prayer_answered_date))
                      <div class="btn-group m-2" role="group">
                            <a href="{{ route('prayerbook.answer', $data->id) }}" class="btn btn-info">Input Answer to Prayer</a>
                        </div>
                      @endif

                      <div class="btn-group m-2" role="group">
                      <a href="{{ route('prayerbook.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                     </div>
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
