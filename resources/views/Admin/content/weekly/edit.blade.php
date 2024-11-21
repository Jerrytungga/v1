@extends('Admin.layout.main')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Weekly</h1>
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
              <a href="{{ route('weekly.index') }}" class="btn text-light bg-dark">Back To View Weekly</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
                <!-- Form Edit Weekly -->
                <form action="{{ route('weekly.update', $weekly->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Using PUT to update the existing data -->
                    <div class="modal-body">
                        <!-- Name Week Field -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name Week</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="name" name="name" value="{{ old('name', $weekly->Week) }}" required placeholder="Enter Name Week">
                            </div>
                        </div>

                        <!-- Status Field -->
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active" {{ $weekly->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $weekly->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
