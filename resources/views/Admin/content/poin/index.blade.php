@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase">target points</h1>
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
      <div class="col-12 col-sm-6 col-md-6">
          <div class="card">
            <div class="card-header">
              <h6 class="font-italic text-bold text-danger">This is a table of weekly target points summarized for 1 week in filling out the trainee journal, this point determines the status of the weekly journal report.</h6>
              <a href="{{ route('poin.create') }}" class="btn btn-success">Enter weekly target points</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th>Semester</th>
                      <th>Bible</th>
                      <th>Memorizing Bible</th>
                      <th>Hymns</th>
                      <th>5 times prayer</th>
                      <th>Personal Goals</th>
                      <th>Good Land</th>
                      <th>Prayer Book</th>
                      <th>Summary Of Ministry</th>
                      <th>Fellowship</th>
                      <th>Script TS & Exhibition</th>
                      <th>Agenda</th>
                      <th>finance</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($poin as $index => $data)
                      <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $data->semester }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $data->bible }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->memorizing_bible }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->hymns }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->five_times_prayer }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->personal_goals }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->good_land }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->prayer_book }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->summary_of_ministry }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->fellowship }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->script_ts_exhibition }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->agenda }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->finance }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->total }}</td> <!-- Kolom Nip rata kanan -->
                        <td>
                        <a href="{{ route('poin.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td> <!-- Kolom Nip rata kanan -->
                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-6">
          <div class="card">
            <div class="card-header">
            <h6 class="font-italic text-bold text-danger">This is a table of daily target points for the trainee journal. This table is filled in if the assistant accidentally forgets to give points to the trainee journal. This table will automatically give an assessment to the trainee journal.</h6>
            <a href="{{ route('report.daily') }}" class="btn btn-info">Enter daily target points</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th>Semester</th>
                      <th>Bible</th>
                      <th>Memorizing Bible</th>
                      <th>Hymns</th>
                      <th>5 times prayer</th>
                      <th>Personal Goals</th>
                      <th>Good Land</th>
                      <th>Prayer Book</th>
                      <th>Summary Of Ministry</th>
                      <th>Fellowship</th>
                      <th>Script TS & Exhibition</th>
                      <th>Agenda</th>
                      <th>finance</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($poin_daily as $index => $data)
                      <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $data->semester }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $data->bible }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->memorizing_bible }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->hymns }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->five_times_prayer }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->personal_goals }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->good_land }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->prayer_book }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->summary_of_ministry }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->fellowship }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->script_ts_exhibition }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->agenda }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->financial }}</td> <!-- Kolom Nip rata kanan -->
                        <td>
                        <a href="{{ route('report.formeditdaily', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td> <!-- Kolom Nip rata kanan -->
                        
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>


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
