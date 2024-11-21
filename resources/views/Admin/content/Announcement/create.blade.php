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
           <a href="{{ route('Announcement.index') }}" class="btn text-light bg-dark ">Back To View Announcement</a>
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
                        
                        <!-- date_mulai Field -->
                        <div class="form-group row">
                            <label for="Date start" class="col-sm-2 col-form-label">Start date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_mulai" required>
                            </div>
                        </div>
                        
                        <!-- time Field -->
                        <div class="form-group row">
                            <label for="Date start" class="col-sm-2 col-form-label">Start time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="jam_mulai" required>
                            </div>
                        </div>
                        
                        <!-- End date Field -->
                        <div class="form-group row">
                            <label for="End date" class="col-sm-2 col-form-label">End date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_akhir" required>
                            </div>
                        </div>
                        
                        <!-- time Field -->
                        <div class="form-group row">
                            <label for="End time" class="col-sm-2 col-form-label">End time</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" name="jam_akhir" required>
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
                        <button type="submit" class="btn btn-primary">Save</button>
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