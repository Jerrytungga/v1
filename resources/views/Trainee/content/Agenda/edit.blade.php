@extends('Trainee.layout.main')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Input Agenda</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-primary">
            <a href="{{ route('agenda.index') }}" class="btn text-light bg-dark">Back To View Agenda</a>
          </div>

          <!-- Card Body -->
          <div class="card-body">
            <form action="{{ route('agenda.update', $data->id) }}" method="post">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="agenda">Agenda [Catatan]</label>
                <textarea name="agenda" id="agenda" cols="4" rows="4" class="form-control" required>{{ old('agenda', $data->agenda) }}</textarea>
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
