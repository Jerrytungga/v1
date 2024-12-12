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
            <a href="{{route('asisten.create')}}" class="btn" style="background-color: #006A67; color:floralwhite;">
            <i class="fas fa-user-plus"></i>
            </a>
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
                          <a href="{{ route('asisten.edit', $data->id) }}" class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i>
                          </a>
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">
                            <i class="fas fa-trash-alt"></i> <!-- Ikon untuk Delete -->
                        </button>
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
   

    @foreach($asisten as $data)
   <!-- Delete Confirmation Modal -->
   <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #006A67; color:floralwhite;">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Asisten</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this asisten?
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Cancel Button -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        
                                        <!-- Delete Form -->
                                        <form action="{{ route('asisten.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

@endsection
