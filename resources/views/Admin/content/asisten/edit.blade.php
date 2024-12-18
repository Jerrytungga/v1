@extends('Admin.layout.main')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Asisten</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header" style="background-color: #6A9C89;">
              <a href="{{ route('asisten.index') }}" class="btn text-light bg-dark">
              <i class="fas fa-arrow-left"></i>    
              Back To View Asisten</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
                <!-- Form Edit Asisten -->
                <form action="{{ route('asisten.update', $asistens->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Menggunakan PUT untuk update data -->
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $asistens->name) }}" required placeholder="Enter Name">
                            </div>
                        </div>
                        
                        <!-- NIP Field -->
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $asistens->nip) }}" required placeholder="Enter NIP">
                            </div>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" value="{{ old('password', $asistens->password) }}" name="password" placeholder="Enter New Password (Leave empty to keep current)">
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active" {{ $asistens->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $asistens->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn" style="background-color: #006A67; color:floralwhite;"><i class="fas fa-pencil-alt"></i></button>
                    </div>
                </form>

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
