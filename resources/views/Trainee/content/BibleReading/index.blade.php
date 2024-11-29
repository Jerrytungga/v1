@extends('Trainee.layout.main')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-12 col-md-6">
        <h1>Bible Reading</h1>
      </div>
    </div>

    <!-- Filter Section -->
    <div class="goup" style="text-align: right;">
      <form action="{{ route('BibleReading.index') }}" method="GET">
        <div class="btn-group">
          <button name="filter" value="Old Testament" class="btn btn-outline-success text-capitalize btn-sm">Old Testament</button>
          <button name="filter" value="New Testament" class="btn btn-outline-success text-capitalize btn-sm">New Testament</button>
          <button name="filter" value="All" class="btn btn-outline-success text-capitalize btn-sm">All</button>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <!-- Filter Form -->
            <form action="{{ route('Bible.Filter') }}" method="POST">
              @csrf
              <div class="form-inline flex-wrap">
                <label for="semester" class="mr-2 ml-2">Chosen Semester & Week :</label>

                <!-- Semester Dropdown -->
                <select class="form-control col-12 col-md-2 mb-2 bg-primary" required id="semester" name="semester">
                  <option value="">Please select a semester</option>
                  @foreach([1 => 'Semester 1', 2 => 'Semester 2', 3 => 'Semester 3', 4 => 'Semester 4'] as $value => $label)
                    <option value="{{ $value }}" {{ old('semester') == $value ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
                </select>

                <!-- Week Dropdown -->
                <select name="week" class="form-control col-12 col-md-2 mb-2 ml-md-2 mr-2 bg-primary"  required>
                <option value="">Please select a week</option>
                  @foreach ($weekly as $data)
                    <option value="{{ $data->Week }}">{{ $data->Week }}</option>
                  @endforeach
                </select>

                <!-- Submit and Reset Buttons -->
                <button type="submit" class="btn btn-primary col-12 mr-2 col-md-auto mb-2">View</button>
                <a href="{{ route('BibleReading.index') }}" class="btn btn-danger col-12 col-md-auto mb-2">Reset</a>
              </div>
            </form>

            <!-- Input Button -->
            <a href="{{ route('BibleReading.create') }}" class="btn btn-success mb-2">Input Bible Reading</a>

            <!-- Alert for Selected Semester -->
            @if (!empty($smt))
              <div class="alert m-2 alert-warning alert-dismissible fade show" role="alert">
              <strong>Semester {{$smt}} & {{$week}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>

          <!-- /.card-header -->

          <div class="card-body">
            <!-- Table to Display Entries -->
            <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                    <th rowspan="2" class="col-1">Date</th>
                    <th rowspan="2" class="col-1">Book</th>
                    <th rowspan="2" class="col-1">Chapter</th>
                    <th>Inspiration</th>
                    <th rowspan="2" class="col-1">Action</th>
                  </tr>
                  <tr>
                    <th>Words/Phrases</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($entrys as $bible)
                    <tr>
                      <td>{{ $bible->created_at }}</td>
                      <td>{{ $bible->book }}</td>
                      <td>{{ $bible->verse }}</td>
                      <td>
                        {{ $bible->phrase_light }}
                        @if (!empty($bible->catatan))
                          <blockquote class="blockquote" style="background-color: #FFF5E4;">
                            <p class="mb-0 text-danger">{{ $bible->catatan }}</p>
                            <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                          </blockquote>
                        @endif
                      </td>
                      <td>
                        @if($bible && \Carbon\Carbon::parse($bible->created_at)->isToday())
                          <a href="{{ route('BibleReading.edit', $bible->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
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
<!-- /.content -->

@endsection
