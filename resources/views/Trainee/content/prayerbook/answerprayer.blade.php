@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Answer Prayer Book</h1>
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
            <div class="card-header bg-info">
           <a href="{{ route('prayerbook.index') }}" class="btn text-light bg-dark ">Back To View Prayer Book</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('prayerbook.save_answer', $data->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                    <label for="answer">Prayer Answer [Jawaban Doa]</label>
                    <textarea name="answer" cols="2" rows="2" required placeholder="Enter the details of your prayer answer." class="form-control"></textarea>
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
