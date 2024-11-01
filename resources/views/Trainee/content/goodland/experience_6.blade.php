@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Form Input Experience Good Land</h1>
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
          <form action="{{ route('goodland.saveexperience_6', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Experiences:</label>
              <div class="form-row">
                <div class="col-md-4">
                  <textarea name="experience_6" class="form-control" placeholder="Experience 6" style="height: 150px;">{{ old('experience_6', $data->experience_6) }}</textarea> <!-- Mengatur tinggi -->
                </div>
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
