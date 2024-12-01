@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Journal</h1>
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
      
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                    <th class="col-1">Week</th>
                    <th class="col-1">Bible</th>
                    <th class="col-1">Memorizing</th>
                    <th class="col-1">Hymns</th>
                    <th class="col-1">Prayer 5 Time</th>
                    <th class="col-1">TP</th>
                    <th class="col-1">Doa</th>
                    <th class="col-1">P.Goals</th>
                    <th class="col-1">Ministry</th>
                    <th class="col-1">Fellowship</th>
                    <th class="col-1">Ts</th>
                    <th class="col-1">Agenda</th>
                    <th class="col-1">Finance</th>
                    <th class="col-1">Achievement</th>
                    <th class="col-1 bg-dark">Standard Points</th>
                    <th class="col-1">Status</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $data)
                  <tr>
                      <td class="col-1">{{ $data->week }}</td>
                      <td class="col-1">{{ $data->bible }}</td>
                      <td class="col-1">{{ $data->memorizing }}</td>
                      <td class="col-1">{{ $data->hymns }}</td>
                      <td class="col-1">{{ $data->prayer_5_time }}</td>
                      <td class="col-1">{{ $data->tp }}</td>
                      <td class="col-1">{{ $data->doa }}</td>
                      <td class="col-1">{{ $data->p_goals }}</td>
                      <td class="col-1">{{ $data->ministry }}</td>
                      <td class="col-1">{{ $data->fellowship }}</td>
                      <td class="col-1">{{ $data->ts }}</td>
                      <td class="col-1">{{ $data->agenda }}</td>
                      <td class="col-1">{{ $data->finance }}</td>
                      <td class="col-1">{{ $data->achievement }}</td>
                      <td class="col-1">{{ $data->standart_poin }}</td>
                      <td class="col-1" 
    style="background-color: {{ $data->status == 'iC' ? 'red' : ($data->status == 'C' ? 'green' : 'white') }}; color: white; text-align: center;">
    {{ $data->status }}
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
  <!-- Menampilkan pesan jika ada -->
  @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

@endsection
