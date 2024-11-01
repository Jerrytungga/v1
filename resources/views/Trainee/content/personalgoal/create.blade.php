@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Personal Goals</h1>
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
            <div class="card-header bg-primary">
           <a href="{{route('personalgoal.index')}}" class="btn text-light bg-dark ">Back To View Personal Goals</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{route('personalgoal.index')}}" method="post">
                @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
                  <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
                  <div class="mt-1">
                    <label for="pgoals">Enter daily personal goals description [Masukan keterangan personal goals harian]</label>
                    <textarea name="deskripsi" cols="4"  rows="4" required placeholder="Enter daily personal goals description" class="form-control"></textarea>
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