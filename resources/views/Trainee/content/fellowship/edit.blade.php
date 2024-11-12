@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Fellowship</h1>
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
            <div class="card-header bg-warning">
           <a href="{{ route('fellowship.index') }}" class="btn btn-light">Back To View Fellowship</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('fellowship.update', $data->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                    <label for="Name">Name Trainer Or Asistant [Nama pengajar atau asisten]</label>
                    <input type="text" class="form-control" name="name"  value="{{ old('name', $data->asisten_trainer) }}">
                  </div>
                  <div class="mt-2">
                    <label for="topic">Topic [Topik]</label>
                    <input type="text" class="form-control" name="topic"  value="{{ old('topic', $data->topic) }}">
                  </div>
                  <div class="mt-2">
                    <label for="Notes">Notes [Catatan]</label>
                    <textarea name="Notes" cols="4" rows="4" class="form-control">{{ old('Notes', $data->notes_trainee) }}</textarea>
                  </div>
                  <div class="mt-2">
                    <label for="action">Action [Tindakan]</label>
                    <textarea name="action" cols="4" rows="4"  class="form-control">{{ old('Notes', $data->action) }}</textarea>
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
