@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Batch</h1>
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
            <div class="card-header" style="
            background-color: #6A9C89;">
           <a href="{{ route('batch.index') }}" class="btn text-light bg-dark ">
           <i class="fas fa-arrow-left"></i>   
           Back To View Batch</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('batch.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="batch" class="col-sm-2 col-form-label">Name Batch</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="name" name="batch" required placeholder="Enter Name">
                            </div>
                        </div>
                        

                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn" style="background-color: #006A67; color:floralwhite;"><i class="fas fa-save"></i></button>
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