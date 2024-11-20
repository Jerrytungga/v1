@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Trainee</h1>
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
           <a href="{{ route('trainee.index') }}" class="btn text-light bg-dark ">Back To View Trainee</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('trainee.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
                            </div>
                        </div>
                        
                        <!-- Batch Field -->
                        <div class="form-group row">
                            <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                            <div class="col-sm-10">
                            <select name="angkatan" id="" required class="form-control">
                              <option value="">Select Batch</option>
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
                        
                        <!-- Semester Field -->
                        <div class="form-group row">
                            <label for="semester" required class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                            <select name="semester" id="" class="form-control">
                              <option value="">Select Semester</option>
                              <option value="1">Semester 1</option>
                              <option value="2">Semester 2</option>
                              <option value="3">Semester 3</option>
                              <option value="4">Semester 4</option>       
                            </select>
                            </div>
                        </div>
                        
                        <!-- NIP Field -->
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nip" name="nip" required placeholder="Enter NIP">
                            </div>
                        </div>
                        
                        <!-- Password Field -->
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter Password">
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

                        <!-- Asisten Field -->
                        <div class="form-group row">
                            <label for="asisten" class="col-sm-2 col-form-label">Asisten</label>
                            <div class="col-sm-10">
                            <select name="asisten" class="form-control">
                            <option value="">Pilih</option>
                              @foreach ($asistens as $asisten)
                              <option value="{{ $asisten->nip }}">{{ $asisten->name }}</option>
                              @endforeach
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