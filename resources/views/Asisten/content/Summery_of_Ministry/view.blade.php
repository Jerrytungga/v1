@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Summary Of Ministry | {{$ambil_trainee->name}}</h1>
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

                <form action="{{ route('view_summery_filter', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" method="POST">
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
                    <a href="{{ route('view-Summery-of-Ministry', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" class="btn btn-danger ml-2">Reset</a>
                    
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
@if ($ambil_ministri->isNotEmpty())
  @foreach($ambil_ministri as $data)
    <div class="card shadow mb-4" style="background-color: {{ $data->category == 'Pembinaan Dasar' ? '#CDE8E5' : '#EEF7FF' }};">
      <div class="card-body">
      <div class="mb-3 d-flex justify-content-end">
        </div>
        <!-- Input Fields Section -->
        <div class="row mb-3">
          <div class="col-12 col-md-4 mb-2">
            <input type="text" disabled class="form-control" value="Title : {{ $data->book_title }}">
          </div>
          <div class="col-12 col-md-2 mb-2">
            <input type="text" disabled class="form-control" value="News : {{ $data->news }}">
          </div>
          <div class="col-12 col-md-2 mb-2">
            <input type="text" disabled class="form-control" value="Date : {{ $data->created_at }}">
          </div>
          <div class="col-12 col-md-2 mb-2">
            <input type="text" disabled class="form-control" value="Week : {{ $data->week }}">
          </div>
          <div class="col-12 col-md-2 mb-2">
            <input type="text" disabled class="form-control" value="Category : {{ $data->category }}">
          </div>
        </div>

       

        <!-- Textarea Section -->
        <textarea disabled class="form-control mt-2 mb-3" rows="5" style="text-align: left;">Light/inspiration : 
{{ $data->inspirasi }}
</textarea>

        <!-- Catatan Blockquote Section -->
        @if (!empty($data->catatan))
          <blockquote class="blockquote mt-3" style="background-color: #FFF5E4;">
            <p class="mb-0 text-danger">{{ $data->catatan }}</p>
            <footer class="blockquote-footer">Asisten {{ $namaAsisten }}</footer>
          </blockquote>
        @endif

        <!-- Poin Badge Section -->
        @if($data->poin)
          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
            Poin: {{ $data->poin }}
          </span>
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
