@extends('Admin.layout.main')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Batch</h1>
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
              <a href="{{ route('batch.index') }}" class="btn text-light bg-dark">Back To View Batch</a>
            </div>
            <!-- /.card-header --> 
            <div class="card-body">
              <!-- Form Edit -->
              <form action="{{ route('batch.update', $batch->id) }}" method="post">
              @csrf
              @method('PUT') <!-- Using PUT to update the existing data -->
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="batch" class="col-sm-2 col-form-label">Name Batch</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="batch" name="batch" required 
                                       value="{{ old('batch', $batch->batch) }}" placeholder="Enter Name">
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
