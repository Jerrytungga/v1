@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Personal Goals</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-warning">
           <a href="{{ route('personalgoal.index') }}" class="btn text-dark btn-light ">Back To View Personal Goals</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('personalgoal.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                  <label for="pgoals">Enter the changes to your daily personal goals description. [Masukan perubahan keterangan personal goals harian]</label>
                  <textarea name="deskripsi" cols="4"  rows="4" required  class="form-control">{{ old('deskripsi', $data->personalgoals) }}</textarea>
                  </div>
                   
                  </div>
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
