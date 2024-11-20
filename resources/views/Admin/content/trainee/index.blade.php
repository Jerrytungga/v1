@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trainee</h1>
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
            <a href="{{ route('trainee.create') }}" class="btn btn-success">Input Trainee</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th class="text-left">Name</th>
                      <th class="text-left">Batch</th>
                      <th class="text-left">Semester</th>
                      <th class="text-right">Nip</th>
                      <th class="text-right">Password</th>
                      <th class="text-left">Status</th>
                      <th class="text-right">Asisten</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($trainee as $index => $data)
                      <tr>
                        <td class="text-center">{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td class="text-left">{{ $data->name }}</td> <!-- Kolom Name rata kiri -->
                        <td class="text-left">{{ $data->batch }}</td> <!-- Kolom Batch rata kiri -->
                        <td class="text-left">{{ $data->semester }}</td> <!-- Kolom Semester rata kiri -->
                        <td class="text-right">{{ $data->nip }}</td> <!-- Kolom Nip rata kanan -->
                        <td class="text-right">{{ $data->password }}</td> <!-- Kolom Password rata kanan -->
                        <td class="text-left">{{ $data->status }}</td> <!-- Kolom Status rata kiri -->
                        <td class="text-left">
                            <!-- Menampilkan nama asisten berdasarkan asisten_id -->
                            @php
                                $assistant = \App\Models\Asisten::where('nip', $data->asisten_id)->first();
                            @endphp
                            {{ $assistant ? $assistant->name : 'No Assistant' }}
                        </td> <!-- Kolom Asisten nama -->

                        <td class="text-center">
                          <!-- Tombol Aksi (Edit dan Hapus) -->
                          <a href="{{ route('trainee.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ route('trainee.show', $data->id) }}" class="btn btn-primary btn-sm">View</a>
                         
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
