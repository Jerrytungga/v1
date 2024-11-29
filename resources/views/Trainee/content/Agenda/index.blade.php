@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agenda</h1>
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
          <div class="card-header">
            <!-- Form untuk filter Semester dan Week -->
            <form action="{{ route('Agendafilter.week') }}" method="POST">
              @csrf
              <div class="form-inline">
                <label for="semester" class="mr-2 ml-2">Chosen Semester & Week:</label>

                <!-- Dropdown Semester -->
                <select class="form-control col-2" style="background-color:#2C74B3; color:#FFF;" required id="semester" name="semester">
                  <option value="">Please select a semester</option>
                  <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                  <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                  <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>Semester 3</option>
                  <option value="4" {{ old('semester') == '4' ? 'selected' : '' }}>Semester 4</option>
                </select>

                <!-- Dropdown Week -->
                <select class="form-control col-2 ml-2" style="background-color:#2C74B3; color:#FFF;" id="chosenWeek" name="week">
                <option value="">Please select a week</option>
                <option value="PT 1" {{ old('week') == 'PT 1' ? 'selected' : '' }}>PT 1</option>
                <option value="PT 2" {{ old('week') == 'PT 2' ? 'selected' : '' }}>PT 2</option>
                <option value="PT 3" {{ old('week') == 'PT 3' ? 'selected' : '' }}>PT 3</option>
                <option value="WEEK 1" {{ old('week') == 'WEEK 1' ? 'selected' : '' }}>WEEK 1</option>
                <option value="WEEK 2" {{ old('week') == 'WEEK 2' ? 'selected' : '' }}>WEEK 2</option>
                <option value="WEEK 3" {{ old('week') == 'WEEK 3' ? 'selected' : '' }}>WEEK 3</option>
                <option value="WEEK 4" {{ old('week') == 'WEEK 4' ? 'selected' : '' }}>WEEK 4</option>
                <option value="WEEK 5" {{ old('week') == 'WEEK 5' ? 'selected' : '' }}>WEEK 5</option>
                <option value="WEEK 6" {{ old('week') == 'WEEK 6' ? 'selected' : '' }}>WEEK 6</option>
                <option value="WEEK 7" {{ old('week') == 'WEEK 7' ? 'selected' : '' }}>WEEK 7</option>
                <option value="WEEK 8" {{ old('week') == 'WEEK 8' ? 'selected' : '' }}>WEEK 8</option>
                <option value="WEEK 9" {{ old('week') == 'WEEK 9' ? 'selected' : '' }}>WEEK 9</option>
                <option value="WEEK 10" {{ old('week') == 'WEEK 10' ? 'selected' : '' }}>WEEK 10</option>
                <option value="WEEK 11" {{ old('week') == 'WEEK 11' ? 'selected' : '' }}>WEEK 11</option>
                <option value="WEEK 12" {{ old('week') == 'WEEK 12' ? 'selected' : '' }}>WEEK 12</option>
                <option value="WEEK 13" {{ old('week') == 'WEEK 13' ? 'selected' : '' }}>WEEK 13</option>
                <option value="WEEK 14" {{ old('week') == 'WEEK 14' ? 'selected' : '' }}>WEEK 14</option>
                <option value="WEEK 15" {{ old('week') == 'WEEK 15' ? 'selected' : '' }}>WEEK 15</option>
                <option value="WEEK 16" {{ old('week') == 'WEEK 16' ? 'selected' : '' }}>WEEK 16</option>
                <option value="WEEK 17" {{ old('week') == 'WEEK 17' ? 'selected' : '' }}>WEEK 17</option>
                <option value="EVALUASI 1" {{ old('week') == 'EVALUASI 1' ? 'selected' : '' }}>EVALUASI 1</option>
                <option value="EVALUASI 2" {{ old('week') == 'EVALUASI 2' ? 'selected' : '' }}>EVALUASI 2</option>
                <option value="EVALUASI 3" {{ old('week') == 'EVALUASI 3' ? 'selected' : '' }}>EVALUASI 3</option>

                </select>

                <!-- Button untuk Submit Filter -->
                <button type="submit" class="btn ml-2" style="background-color:#2C74B3; color:#FFF;">View</button>
                
                <!-- Button untuk Reset Filter -->
                <a href="{{ route('agenda.index') }}" class="btn btn-danger ml-2">Reset</a>
              </div>
            </form>
            <!-- Button untuk Input Agenda -->
            <a href="{{ route('agenda.create') }}" class="btn btn-success">Input Agenda</a>

            <!-- Alert untuk Menampilkan Semester yang Dipilih -->
            @if (!empty($smt))
              <div class="alert m-2 alert-warning alert-dismissible fade show" role="alert">
                <strong>Semester {{$smt}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>

          <!-- Card Body -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead class="text-center font-weight-bold bg-primary">
                <tr>
                  <th class="col-1">Date</th>
                  <th class="col-4">Agenda</th>
                  <th class="col-1">Week</th>
                  <th class="col-1">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($entrys as $data)
                  <tr>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->agenda }}
                    @if (!empty($data->catatan))
                    <blockquote class="blockquote" style="background-color: #FFF5E4;">
                    <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                     <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                    </blockquote>
                    @endif
                    </td>
                    <td>{{ $data->week }}</td>
                    <td>
                    @if($data && \Carbon\Carbon::parse($data->created_at)->isToday())
                        <!-- Button Edit hanya tampil jika agenda baru (kurang dari 1 hari) -->
                        <a href="{{ route('agenda.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  

@endsection
