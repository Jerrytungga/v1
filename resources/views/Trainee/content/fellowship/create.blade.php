@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Fellowship</h1>
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
            <div class="card-header bg-primary">
           <a href="{{ route('fellowship.index') }}" class="btn text-light bg-dark ">Back To View Fellowship</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('fellowship.store') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
                  <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
                  <div class="mt-2">
                    <label for="Name">Trainer’s or assistant’s name [Nama pengajar atau asisten]</label>
                    <input type="text" class="form-control" required name="name">
                  </div>
                  <div class="mt-2">
                    <label for="topic">Topic [Topik]</label>
                    <input type="text" class="form-control" required name="topic">
                  </div>
                  <div class="mt-2">
                    <label for="Notes">Notes [Catatan]</label>
                    <textarea name="Notes" cols="4" rows="4" required placeholder=" " class="form-control"></textarea>
                  </div>
                  <div class="mt-2">
                    <label for="action">Action [Tindakan]</label>
                    <textarea name="action" cols="4" rows="4" required placeholder="" class="form-control"></textarea>
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
