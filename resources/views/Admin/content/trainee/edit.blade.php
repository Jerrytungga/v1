<!-- resources/views/trainee/edit.blade.php -->

@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Trainee</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header" style="background-color: #6A9C89;">
                <a href="{{ route('trainee.index') }}" class="btn text-light bg-dark">Back To View Trainee</a>
              </div>
              <!-- /.card-header --> 
              <div class="card-body">
                <form action="{{ route('trainee.update', $trainee->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Menggunakan PUT untuk update data -->
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $trainee->name) }}" required placeholder="Enter Name">
                            </div>
                        </div>
                        
                        <!-- Batch Field -->
                        <div class="form-group row">
                            <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                            <div class="col-sm-10">
                            <select name="angkatan" class="form-control">
                                    <option value="">Select Batch</option>
                                    @foreach ($batch as $batch)
                                        <option value="{{ $batch->batch }}" {{ $batch->batch ? 'selected' : '' }}>{{ $batch->batch }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <!-- Semester Field -->
                        <div class="form-group row">
                            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <select name="semester" class="form-control">
                                    <option value="">Select Semester</option>
                                    <option value="1" {{ $trainee->semester == 1 ? 'selected' : '' }}>Semester 1</option>
                                    <option value="2" {{ $trainee->semester == 2 ? 'selected' : '' }}>Semester 2</option>
                                    <option value="3" {{ $trainee->semester == 3 ? 'selected' : '' }}>Semester 3</option>
                                    <option value="4" {{ $trainee->semester == 4 ? 'selected' : '' }}>Semester 4</option>
                                </select>
                            </div>
                        </div>

                        <!-- NIP Field -->
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $trainee->nip) }}" required placeholder="Enter NIP">
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $trainee->password) }}" placeholder="Enter Password (Leave empty to keep current password)">
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" required>
                                    <option value="active" {{ $trainee->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $trainee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Asisten Field -->
                        <div class="form-group row">
                            <label for="asisten" class="col-sm-2 col-form-label">Asisten</label>
                            <div class="col-sm-10">
                                <select name="asisten" class="form-control">
                                    <option value="">Select Asisten</option>
                                    @foreach ($asistens as $asisten)
                                        <option value="{{ $asisten->nip }}" {{ $trainee->asisten_id == $asisten->nip ? 'selected' : '' }}>{{ $asisten->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
