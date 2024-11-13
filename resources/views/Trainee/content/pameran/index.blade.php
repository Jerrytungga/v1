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
            <form action="{{route('pameranfilter.week')}}" method="POST">
            @csrf
            <div class="form-inline">
              <label for="semester" class="mr-2 ml-2">Chosen Semester & Week :</label>
                <select class="form-control col-2" style="background-color:#2C74B3; color:#FFFf; " required id="semester" name="semester">
                    <option value="">Please select a semester</option>
                    <option value="1" {{ old('semester') == 'PT 1' ? 'selected' : '' }}>Semester 1</option>
                    <option value="2" {{ old('semester') == 'PT 2' ? 'selected' : '' }}>Semester 2</option>
                    <option value="3" {{ old('semester') == 'PT 3' ? 'selected' : '' }}>Semester 3</option>
                    <option value="4" {{ old('semester') == 'WEEK 1' ? 'selected' : '' }}>Semester 4</option>
                </select>
                <select class="form-control col-2 ml-2" style="background-color:#2C74B3; color:#FFFf;" id="chosenWeek" name="week">
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
                    <option value="EVALUASI 1" {{ old('week') == 'EVALUASI 1' ? 'selected' : '' }}>EVALUASI 1</option>
                    <option value="EVALUASI 2" {{ old('week') == 'EVALUASI 2' ? 'selected' : '' }}>EVALUASI 2</option>
                    <option value="EVALUASI 3" {{ old('week') == 'EVALUASI 3' ? 'selected' : '' }}>EVALUASI 3</option>
                </select>
                <button type="submit" class="btn ml-2"  style="background-color:#2C74B3; color:#FFFf;">View</button>
                <a href="{{route('pameran.index')}}" class="btn btn-danger ml-2">Reset</a>
            </div>
           </form>
              <a href="{{route('pameran.create')}}" class="btn m-2 btn-success">Input Script</a>
              @if (!empty($smt))
              <div class="alert m-2 alert-warning alert-dismissible fade show" role="alert">
                <strong>Semester {{$smt}}</strong>
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
                  @if (empty($data->catatan))
                 <a href="{{route('pameran.edit', $data->id)}}" class="btn btn-sm mb-1 btn-warning">Edit</a>
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
