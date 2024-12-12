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

        <div class="goup" style="text-align: right;">
      <form action="{{ route('trainee.index') }}" method="GET">
        <div class="btn-group">
          <button name="filter" value="active" class="btn btn-outline-info text-capitalize btn-sm">Active</button>
          <button name="filter" value="inactive" class="btn btn-outline-info text-capitalize btn-sm">Inactive</button>
        </div>
      </form>
    </div>



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
<style>
  .card-header {
    padding: 15px;
}

.button-group {
    display: flex;
    flex-wrap: wrap; /* Allow buttons to wrap on smaller screens */
    gap: 10px; /* Spacing between buttons */
}

.button-group .btn {
    flex: 1 1 auto; /* Ensure buttons are flexible */
    min-width: 150px; /* Set a minimum width for buttons */
}

@media (min-width: 768px) {
    .button-group {
        justify-content: flex-start; /* Align buttons horizontally on larger screens */
    }

    .button-group .btn {
        flex: 0 1 auto; /* Prevent the buttons from taking up too much space on larger screens */
    }
}

</style>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header">
          <div class="button-group">
              <!-- Button untuk Input Trainee dengan ikon -->
              <a href="{{ route('trainee.create') }}" class="btn btn-md-1" style="background-color: #006A67; color:floralwhite;">
                  <i class="fas fa-user-plus"></i> <!-- Ikon untuk tambah pengguna -->
              </a>
              
              <!-- Button untuk Change Semester dengan ikon -->
              <button type="button" class="btn" style="background-color: #006A67; color:floralwhite;" data-toggle="modal" data-target="#Changesemester">
                  <i class="fas fa-sync-alt"></i> <!-- Ikon untuk perubahan -->
              </button>
              
              <!-- Button untuk Change Status dengan ikon -->
              <button type="button" class="btn" data-toggle="modal" data-target="#Changestatus" style="background-color: #006A67; color:floralwhite;">
                  <i class="fas fa-cogs"></i> <!-- Ikon untuk setting -->
              </button>
          </div>

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
                        <a href="{{ route('trainee.edit', $data->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> <!-- Ikon untuk Edit -->
                        </a>
                        <!-- <a href="{{ route('trainee.show', $data->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i>
                        </a> -->
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

    <!-- Modal -->
<div class="modal fade" id="Changesemester" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #006A67; color:floralwhite;">
        <h5 class="modal-title" id="staticBackdropLabel">Change semester trainee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('ubasemester_admin') }}" method="post">
      @csrf
      <div class="modal-body">
           <!-- Batch Field -->
           <div class="form-group row">
              <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                <div class="col-sm-10">
                <select name="angkatan" required class="form-control">
                    <option value="">Select Batch</option>
                      @foreach ($batch as $batch)
                      <option value="{{ $batch->batch }}">{{ $batch->batch }}</option>
                        @endforeach
                </select>
                </div>
          </div>

          <!-- Semester Field -->
          <div class="form-group row">
            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
              <div class="col-sm-10">
                <select name="semester" required class="form-control">
                  <option value="">Select Semester</option>
                  <option value="1">Semester 1</option>
                  <option value="2">Semester 2</option>
                  <option value="3">Semester 3</option>
                  <option value="4">Semester 4</option>       
                </select>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" style="background-color: #006A67; color:floralwhite;">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>






<div class="modal fade" id="Changestatus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #006A67; color:floralwhite;">
        <h5 class="modal-title" id="staticBackdropLabel">Change status trainee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('ubastatus_admin') }}" method="post">
      @csrf
      <div class="modal-body">
       <!-- Batch Field -->
       <div class="form-group row">
              <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                <div class="col-sm-10">
                <select name="angkatan" required class="form-control">
                    <option value="">Select Batch</option>
                      @foreach ($angkatan as $angkatan)
                      <option value="{{ $angkatan->batch }}">{{ $angkatan->batch }}</option>
                        @endforeach
                </select>
                </div>
          </div>

          <div class="form-group row">
            <label for="semester" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select name="status" required class="form-control">
                  <option value="">Select status</option>
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>     
                </select>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" style="background-color: #006A67; color:floralwhite;">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

@foreach($trainee as $data)
   <!-- Delete Confirmation Modal -->
   <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #006A67; color:floralwhite;">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete Trainee</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this trainee?
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Cancel Button -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        
                                        <!-- Delete Form -->
                                        <form action="{{ route('trainee.destroy', $data->id) }}" method="POST">
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
