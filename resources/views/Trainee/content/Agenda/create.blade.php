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
            <form action="{{ route('agenda.store') }}" method="post">
              @csrf

              <div class="modal-body">
                <!-- Hidden fields for asisten and nip -->
                <input type="hidden" name="asisten" value="{{ $id_asisten }}">
                <input type="hidden" name="nip" value="{{ $nipTrainee }}">

                <div class="form-group">
                  <label for="agenda">Agenda [Catatan]</label>
                  <textarea name="agenda" id="agenda" cols="4" rows="4" class="form-control" required></textarea>
                </div>
              </div>

              <!-- Form footer with Save button -->
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
