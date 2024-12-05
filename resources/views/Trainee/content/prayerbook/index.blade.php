@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Prayer Book</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->

  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <form action="{{ route('prayerbook.Filter') }}" method="POST">
              @csrf
              <div class="form-inline flex-wrap">
                <label for="semester" class="mr-2 ml-2">Chosen Semester & Week :</label>

                <!-- Semester Dropdown -->
                <select class="form-control col-12 col-md-2 mr-2 mb-2 bg-primary" required id="semester" name="semester">
                  <option value="">Please select a semester</option>
                  @foreach([1 => 'Semester 1', 2 => 'Semester 2', 3 => 'Semester 3', 4 => 'Semester 4'] as $value => $label)
                    <option value="{{ $value }}" {{ old('semester') == $value ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
                </select>

                <!-- Week Dropdown -->
                <select name="week" class="form-control col-12 col-md-2 mr-2 mb-2 ml-md-2 bg-primary" required>
                <option value="">Please select a week</option>
                  @foreach ($weekly as $data)
                    <option value="{{ $data->Week }}">{{ $data->Week }}</option>
                  @endforeach
                </select>

                <!-- Submit and Reset Buttons -->
                <button type="submit" class="btn btn-primary col-12 mr-2 col-md-auto mb-2">View</button>
                <a href="{{ route('prayerbook.index') }}" class="btn btn-danger col-12 col-md-auto mb-2">Reset</a>
              </div>
            </form>
            <a href="{{ route('prayerbook.create') }}" class="btn btn-success">Input Prayer Book</a>
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
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                     <tr>
                     <th style="width: 15%;">Prayer Date</th>
                     <th style="width: 15%;">Topic</th>
                     <th style="width: 15%;">Light</th>
                     <th style="width: 20%;">Appreciation</th>
                     <th style="width: 20%;">Action</th>
                     <th style="width: 15%;">Prayer Answered Date</th>
                     <th style="width: 15%;">Prayer Answer</th>
                     <th style="width: 10%;">Settings</th>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $data)
                  <tr>
                      <td class="col-1">{{ \Carbon\Carbon::parse($data->prayer_date)->format('d-m-y') }}</td>
                      <td class="col-2">{{ $data->topic }}
                   

                      </td>
                      <td class="col-2">{{ $data->light }}</td>
                      <td class="col-2">{{ $data->appreciation }}</td>
                      <td class="col-4">{{ $data->action }}
                         @if (!empty($data->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                        </blockquote>
                        @endif
                      </td>
                      <!--<td class="col-4">{{ $data->prayer_answered_date }}</td>-->
                      <td class="col-1">{{ \Carbon\Carbon::parse($data->prayer_answered_date)->format('d-m-y') }}</td>

                      <td class="col-4">{{ $data->prayer_answer }}</td>
                      <td class="col-8">
                      @if(empty($data->prayer_answer) && empty($data->prayer_answered_date))
                      <div class="btn-group m-2" role="group">
                            <a href="{{ route('prayerbook.answer', $data->id) }}" class="btn btn-info">Input Answer to Prayer</a>
                        </div>
                      @endif

                      @if($data && \Carbon\Carbon::parse($data->created_at)->isToday())
                      <div class="btn-group m-2" role="group">
                      <a href="{{ route('prayerbook.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                     </div>
                     @endif
                      </td>
                  </tr>
                    @endforeach
                 
                  </tbody>
                </table>
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
