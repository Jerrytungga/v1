@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Asisten</h1>
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
            <a href="{{route('asisten.create')}}" class="btn btn-success">Input Asisten</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Nip</th>
                      <th>Password</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($asisten as $index => $data)
                      <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $data->name }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $data->nip }}</td> <!-- Kolom Batch rata kiri -->
                        <td>{{ $data->password }}</td> <!-- Kolom Semester rata kiri -->
                        <td>{{ $data->status }}</td> <!-- Kolom Nip rata kanan -->
                        <td class="text-center">
                          <!-- Tombol Aksi (Edit dan Hapus) -->
                          <a href="{{ route('asisten.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
