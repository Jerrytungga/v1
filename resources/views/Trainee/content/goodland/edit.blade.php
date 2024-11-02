@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Good Land</h1>
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
          <form action="{{route('goodland.update', $data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="verses">Verses:</label>
                <textarea name="verses" class="form-control" required placeholder="Verses">{{ $data->verses  }}</textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="da">DA:</label>
                <textarea name="da" class="form-control" required placeholder="DA">{{ $data->da  }}</textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dt">DT:</label>
                <textarea name="dt" class="form-control" required placeholder="DT">{{ $data->dt  }}</textarea>
              </div>

              <div class="form-group col-md-6">
                <label for="ds">DS:</label>
                <textarea name="ds" class="form-control" required placeholder="DS">{{ $data->ds  }}</textarea>
              </div>
            </div>

            <div class="form-group">
              <label>Experiences:</label>
              <div class="form-row">
                <div class="col-md-4">
                @if(!empty($data->experience_1))
                  <textarea name="experience_1" class="form-control" placeholder="Experience 1" style="height: 150px;">{{ $data->experience_1 }}</textarea> <!-- Mengatur tinggi -->
                  @else
                  <textarea name="experience_1" disabled class="form-control" placeholder="Experience 1" style="height: 150px;">{{ $data->experience_1 }}</textarea> <!-- Mengatur tinggi -->
                  @endif
                </div>
                <div class="col-md-4">
                @if(!empty($data->experience_2))
                  <textarea name="experience_2" class="form-control" placeholder="Experience 2" style="height: 150px;">{{ $data->experience_2 }}</textarea> <!-- Mengatur tinggi -->
                  @else
                  <textarea name="experience_2" disabled class="form-control" placeholder="Experience 2" style="height: 150px;">{{ $data->experience_2 }}</textarea> <!-- Mengatur tinggi -->
                  @endif
                </div>

                <div class="col-md-4">
                @if(!empty($data->experience_3))
                  <textarea name="experience_3" class="form-control" placeholder="Experience 3" style="height: 150px;">{{ $data->experience_3 }}</textarea> <!-- Mengatur tinggi -->
                  @else
                  <textarea name="experience_3" disabled class="form-control" placeholder="Experience 3" style="height: 150px;">{{ $data->experience_3 }}</textarea> <!-- Mengatur tinggi -->
                  @endif
                </div>


              </div>
              <div class="form-row mt-2">
                <div class="col-md-4">
                @if(!empty($data->experience_4))
                  <textarea name="experience_4" class="form-control" placeholder="Experience 4" style="height: 150px;">{{ $data->experience_4 }}</textarea> <!-- Mengatur tinggi -->
                  @else
                  <textarea name="experience_4" disabled class="form-control" placeholder="Experience 4" style="height: 150px;">{{ $data->experience_4 }}</textarea> <!-- Mengatur tinggi -->
                  @endif
                </div>
                <div class="col-md-4">
                @if(!empty($data->experience_5))
                  <textarea name="experience_5" class="form-control" placeholder="Experience 5" style="height: 150px;">{{ $data->experience_5 }}</textarea> <!-- Mengatur tinggi -->
                  @else
                  <textarea name="experience_5" disabled class="form-control" placeholder="Experience 5" style="height: 150px;">{{ $data->experience_5 }}</textarea> <!-- Mengatur tinggi -->
                  @endif
                </div>
                <div class="col-md-4">
                @if(!empty($data->experience_6))
                  <textarea name="experience_6" class="form-control" placeholder="Experience 6" style="height: 150px;">{{ $data->experience_6 }}</textarea> <!-- Mengatur tinggi -->
                  @else
                  <textarea name="experience_6" disabled class="form-control" placeholder="Experience 6" style="height: 150px;">{{ $data->experience_6 }}</textarea> <!-- Mengatur tinggi -->
                  @endif
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
