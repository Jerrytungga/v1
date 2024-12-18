@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit 5 Time Prayer</h1>
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
           <a href="{{ route('fiveTimesPrayer.index') }}" class="btn text-dark btn-light ">Back To View 5 Time Prayer</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('fiveTimesPrayer.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                    <label for="poindoa">Today's prayer points [Poin Doa Hari ini]</label>
                    <textarea name="doa" cols="4"  rows="4" required placeholder=" Example [Pray for YKDE so that its expansion in Indonesia continues to progress and thrive.] " class="form-control">{{ old('doa', $data->poin_prayer) }}</textarea>
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
