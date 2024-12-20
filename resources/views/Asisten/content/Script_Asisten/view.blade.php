@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Script Ts & Exhibition | {{$ambil_trainee->name}}</h1>
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
              <div class="d-flex align-items-center mb-3">
              <a href="{{ route('pengembalaan-trainee') }}" class="btn text-light mr-1 mb-1 bg-dark">Back To Shepherded</a>
                <h6 class="text-left mb-0">Total Poin: <span class="badge badge-pill badge-danger">{{ $totalPoin }}</span></h6>
                </div>

                <form action="{{ route('view_script_filter', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" method="POST">
                  @csrf
                  <div class="form-inline">
                    <label for="semester" class="mr-2 ml-2">Chosen Week :</label>
                    <select class="form-control ml-2 col-12 col-sm-4 col-md-2" style="background-color:#001F3F; color:#FFF;" id="chosenWeek" name="week">
                    <option value="">Please select a week</option>
                    @foreach ($dropdown_weekly as $data)
                    <option value="{{ $data->Week }}">{{ $data->Week }}</option>
                    @endforeach
                    </select>
                    <button type="submit" class="btn ml-2" style="background-color:#001F3F; color:#FFFf;">View</button>
                    <a href="{{ route('view-script', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" class="btn btn-danger ml-2">Reset</a>
                    
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
@if ($ambil_Script->isNotEmpty())
  @foreach($ambil_Script as $data)
    <div class="card shadow mb-4" style="background-color: {{ $data->script == 'Exhibition' ? '#57A6A1' : '#3ABEF9' }};">
      <div class="card-body">
      <div class="mb-3 d-flex justify-content-end">
        </div>
        <!-- Input Fields Section -->
        <div class="row mb-3">
          <div class="col-12 col-md-4 mb-2">
            <input type="text" disabled class="form-control" value="Topic : {{ $data->Topic }}">
          </div>
          <div class="col-12 col-md-4 mb-2">
            <input type="text" disabled class="form-control" value="TS/Exhibition : {{ $data->script }}">
          </div>
          <div class="col-12 col-md-2 mb-2">
            <input type="text" disabled class="form-control" value="Date : {{ $data->created_at }}">
          </div>
          <div class="col-12 col-md-2 mb-2">
            <input type="text" disabled class="form-control" value="Week : {{ $data->week }}">
          </div>
        </div>

        <!-- Textarea Section -->
        <textarea disabled class="form-control mt-2 mb-3" rows="5" style="text-align: left;">Verse : 
{{ $data->verse }}
</textarea>
@if($data->poin_verse)
<span class="badge" style="background-color:#B9D7EA; color:#000000;">
Poin Verse : {{ $data->poin_verse }}
</span>
        @endif
        <textarea disabled class="form-control mt-2 mb-3" rows="5" style="text-align: left;">Truth : 
{{ $data->Truth }}
</textarea>
@if($data->poin_truth)
<span class="badge" style="background-color:#B9D7EA; color:#000000;">
Poin Truth : {{ $data->poin_truth }}
</span>
@endif
        <textarea disabled class="form-control mt-2 mb-3" rows="5" style="text-align: left;">Experience : 
{{ $data->Experience }}
</textarea>

<!-- Poin Badge Section -->
@if($data->poin_experience)
  <span class="badge" style="background-color:#B9D7EA; color:#000000;">
    Poin Experience : {{ $data->poin_experience }}
  </span>
@endif
        <!-- Catatan Blockquote Section -->
        @if (!empty($data->catatan))
          <blockquote class="blockquote mt-3" style="background-color: #FFF5E4;">
            <p class="mb-0 text-danger">{{ $data->catatan }}</p>
            <footer class="blockquote-footer">Asisten {{ $namaAsisten }}</footer>
          </blockquote>
        @endif

      </div>
    </div>
  @endforeach
  @else
                      <script>
                        Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: "No data available for this week.",
                        });
                      </script>
                     @endif
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
