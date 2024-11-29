@extends('Trainee.layout.main')
@section('content')

     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Memorizing Verses</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <form action="{{ route('MemorizingVerses.Filter') }}" method="POST">
              @csrf
              <div class="form-inline flex-wrap">
                <label for="semester" class="mr-2 ml-2">Chosen Semester & Week :</label>

                <!-- Semester Dropdown -->
                <select class="form-control col-12 col-md-2 mr-2 mb-2 bg-primary"  required id="semester" name="semester">
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
                <a href="{{ route('MemorizingVerses.index') }}" class="btn btn-danger col-12 col-md-auto mb-2">Reset</a>
              </div>
            </form>

            <a href="{{ route('MemorizingVerses.create') }}" class="btn btn-success">Input Memorizing Verses</a>
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
                  <thead class="text-center bg-primary font-weight-bold">
                     <tr>
                        <td>Date</td>
                        <td>Bible</td>
                        <td>Partner</td>
                        <td>Action</td>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $memorizingverses)
                  <tr>
                  <td>{{ $memorizingverses->created_at }}</td>
                  <td>{{ $memorizingverses->bible }}
                  @if (!empty($memorizingverses->catatan))
                    <blockquote class="blockquote" style="background-color: #FFF5E4;">
                    <p class="mb-0 text-danger">{{ $memorizingverses->catatan }}</p>
                     <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                    </blockquote>
                    @endif
                  </td>
                  <td>
                  @php
                   $trainee = \App\Models\Trainee::where('nip', $memorizingverses->paraf)->first();
                  @endphp
                  {{ $trainee ? $trainee->name : 'No trainee' }}
                  </td>
                  <td>
                  @if($memorizingverses && \Carbon\Carbon::parse($memorizingverses->created_at)->isToday())
                            <a href="{{ route('MemorizingVerses.edit', $memorizingverses->id) }}" class="btn btn-warning">Edit</a>
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
