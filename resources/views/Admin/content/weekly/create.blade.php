@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Weekly</h1>
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
           <a href="{{ route('weekly.index') }}" class="btn text-light bg-dark ">
           <i class="fas fa-arrow-left"></i>   
           Back To View Weekly</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('weekly.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name Week</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
                            </div>
                        </div>
                        

                        <!-- Status Field -->
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                       

                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn"style="background-color: #006A67; color:floralwhite;"><i class="fas fa-save"></i>
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