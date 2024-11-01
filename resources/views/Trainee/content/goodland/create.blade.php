@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Good Land</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <section class="content">
  <div class="container-fluid">
    <div class="row justify-content-left">
      <div class="card m-3" style="width: 100%; max-width: 800px; border-radius: 15px;"> <!-- Memperlebar card -->
        <div class="card-body">
          <form action="{{ route('goodland.index') }}" method="POST">
            @csrf
            <div class="form-row">
            <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
            <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
              <div class="form-group col-md-6">
                <label for="verses">Verses:</label>
                <textarea name="verses" class="form-control" required placeholder="Verses"></textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="da">DA:</label>
                <textarea name="da" class="form-control" required placeholder="DA"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dt">DT:</label>
                <textarea name="dt" class="form-control" required placeholder="DT"></textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="ds">DS:</label>
                <textarea name="ds" class="form-control" required placeholder="DS"></textarea>
              </div>
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('goodland.index')}}" class="btn btn-dark">Back To View Good Land</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
