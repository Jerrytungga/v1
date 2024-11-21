@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-uppercase">announcement</h1>
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
            <a href="{{ route('Announcement.create') }}" class="btn btn-success">Input Announcement</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th>Batch</th>
                      <th>Announcement</th>
                      <th>Start Date</th>
                      <th>Start time</th>
                      <th>End date</th>
                      <th>End time</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($Announcement as $index => $data)
                      <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $data->batch }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $data->announcement }}</td> <!-- Kolom Batch rata kiri -->
                        <td>{{ $data->date_mulai }}</td> <!-- Kolom Semester rata kiri -->
                        <td>{{ $data->jam_mulai }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->date_akhir }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->jam_akhir }}</td> <!-- Kolom Nip rata kanan -->
                        <td>{{ $data->status }}</td> <!-- Kolom Nip rata kanan -->
                        <td class="text-center">
                          <!-- Tombol Aksi (Edit dan Hapus) -->
                          <a href="{{ route('Announcement.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <!-- <a href="{{ route('trainee.show', $data->id) }}" class="btn btn-primary btn-sm">View</a> -->
                         
                        </td>
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
