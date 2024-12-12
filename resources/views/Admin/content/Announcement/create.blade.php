@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Announcement</h1>
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
           <a href="{{ route('Announcement.index') }}" class="btn text-light bg-dark ">
           <i class="fas fa-arrow-left"></i>    
           Back To View Announcement</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('Announcement.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                            <div class="col-sm-10">
                            <select name="angkatan" id="" required class="form-control">
                              <option value="">Select Batch</option>
                              <option value="all">All</option>
                              <option value="50">50</option>
                              <option value="52">52</option>
                              <option value="53">53</option>
                              <option value="54">54</option>
                              <option value="55">55</option>
                              <option value="56">56</option>
                              <option value="57">57</option>
                              <option value="58">58</option>
                            </select>
                            </div>
                        </div>
                        
                        <!-- Announcement Field -->
                        <div class="form-group row">
                            <label for="Announcement" class="col-sm-2 col-form-label">Announcement</label>
                            <div class="col-sm-10">
                               <textarea name="Announcement" required class="form-control" id=""></textarea>
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