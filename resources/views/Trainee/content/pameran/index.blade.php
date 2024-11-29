@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Script</h1>
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
          
           <form action="{{ route('pameranfilter.week') }}" method="POST">
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
                <a href="{{ route('pameran.index') }}" class="btn btn-danger col-12 col-md-auto mb-2">Reset</a>
              </div>
            </form>

              <a href="{{route('pameran.create')}}" class="btn m-2 btn-success">Input Script</a>
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
              @foreach($entrys as $data)
              <div class="card shadow" style="background-color: {{ $data->script == 'Exhibition' ? '#57A6A1' : '#3ABEF9' }};">
                
               <div class="card-body">
                  <input type="text" disabled class="col-4" value="Topic : {{ $data->Topic }}">
                  <input type="text" disabled class="col-3" value="TS/Exhibition : {{ $data->script }}"  >
                  <input type="text" disabled class="col-2" value="Date : {{ $data->created_at }}">
                  <input type="text" disabled class="col-1" value="Week : {{ $data->week }}"> 
                  @if($data && \Carbon\Carbon::parse($data->created_at)->isToday())
                  @if (empty($data->catatan))
                 <a href="{{route('pameran.edit', $data->id)}}" class="btn btn-sm mb-1 btn-warning">Edit</a>
                 @endif
                 @endif
                  <br>
                  <textarea disabled id="" cols="30" rows="3" class="form-control mt-1">Verse : 
{{ $data->verse }}</textarea>
                  <textarea disabled id="" cols="30" rows="5" class="form-control mt-1">Truth : 
{{ $data->Truth }}</textarea>
                  <textarea disabled id="" cols="30" rows="5" class="form-control mt-1">Experience : 
{{ $data->Experience }}</textarea>
                        @if (!empty($data->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                        </blockquote>
                        @endif
                 
               </div>
               </div>
               @endforeach
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
   

    @if ($noDataMessage)
            <script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $noDataMessage }}"
          });
            </script>
        @endif
  
@endsection
