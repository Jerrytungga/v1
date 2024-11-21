@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase">point achievement standard</h1>
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
            <a href="{{ route('poin.create') }}" class="btn btn-success">Input point achievement standard</a>
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
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
   


@endsection
