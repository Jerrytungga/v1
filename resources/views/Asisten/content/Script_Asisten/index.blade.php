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
                <a href="{{ route('htrainee.asisten') }}" class="btn text-light bg-dark mr-3">Back To View Trainee</a>
                <h6 class="text-left mb-0">Total Poin: <span class="badge badge-pill badge-danger">{{ $totalPoin }}</span></h6>
                </div>

                <form action="{{ route('Script-week', $ambil_trainee->nip) }}" method="POST">
                  @csrf
                  <div class="form-inline">
                    <label for="semester" class="mr-2 ml-2">Chosen Week :</label>
                    <select class="form-control ml-2 col-12 col-sm-4 col-md-2" style="background-color:#001F3F; color:#FFF;" id="chosenWeek" name="week">
                    <option value="">Please select a week</option>
                    @foreach (['PT 1', 'PT 2', 'PT 3', 'WEEK 1', 'WEEK 2', 'WEEK 3', 'WEEK 4', 'WEEK 5', 'WEEK 6', 'WEEK 7', 'WEEK 8', 'WEEK 9', 'WEEK 10', 'WEEK 11', 'WEEK 12', 'WEEK 13', 'WEEK 14', 'WEEK 15', 'WEEK 16', 'WEEK 17', 'EVALUASI 1', 'EVALUASI 2', 'EVALUASI 3'] as $week)
                    <option value="{{ $week }}" {{ old('week') == $week ? 'selected' : '' }}>{{ $week }}</option>
                    @endforeach
                    </select>
                    <button type="submit" class="btn ml-2" style="background-color:#001F3F; color:#FFFf;">View</button>
                    <a href="{{ route('Script-Asisten', $ambil_trainee->nip) }}" class="btn btn-danger ml-2">Reset</a>
                    
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
        <a href="javascript:void(0)" class="btn btn-warning d-block d-md-inline" data-toggle="modal" data-target="#ipoin-{{ $data->id }}">
            Input Note & Poin
        </a>
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

    @if ($ambil_Script->isNotEmpty())
    @foreach($ambil_Script as $data)

                            <!-- Modal for Input Note & Poin -->
                            <div class="modal fade" id="ipoin-{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color:#001F3F; color:#FFFf;">
                                      <h5 class="modal-title" id="changePasswordModalLabel">Input Note & Poin</h5>
                                      <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{ route('Script-poin', ['id' => $data->id]) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                        <div class="form-group">
                                        <label for="Date">Date :</label>
                                        <input type="text" disabled class="form-control" value="{{ $data->created_at }}">
                                        <label for="Week" class="mt-1">Week :</label>
                                           <input type="text" disabled class="form-control" value="{{ $data->week }}">
                                        <label for="Category" class="mt-1">Category :</label>
                                        <input type="text" disabled class="form-control" value="{{ $data->script }}">
                                          <label for="Topic" class="mt-1">Topic :</label>
                                          <input type="text" disabled class="form-control" value="{{ $data->Topic }}">
                                          <label for="verse" class="mt-1">Verse :</label>
                                          <textarea disabled class="form-control  mb-3" rows="5" style="text-align: left;">{{ $data->verse }}</textarea>
                                          <label for="Truth" class="mt-1">Truth :</label>
                                          <textarea disabled class="form-control  mb-3" rows="5" style="text-align: left;">{{ $data->Truth }}</textarea>
                                          <label for="Truth" class="mt-1">Experience :</label>
                                          <textarea disabled class="form-control  mb-3" rows="5" style="text-align: left;">{{ $data->Experience }}</textarea>

                                          <label for="Poin" class="mt-1">Poin Verse:</label>
                                          <select name="poinVerse" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->poin_verse }}">{{ $data->poin_verse }}</option>
                                            <option value="">Input Poin</option>
                                            @for ($i = 0; $i <= 20; $i++)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            @for ($i = -1; $i >= -20; $i--)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                          </select>
                                          <label for="Poin" class="mt-1">Poin Truth:</label>
                                          <select name="poinTruth" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->poin_truth }}">{{ $data->poin_truth }}</option>
                                            <option value="">Input Poin</option>
                                            @for ($i = 0; $i <= 20; $i++)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            @for ($i = -1; $i >= -20; $i--)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                          </select>
                                          <label for="Poin" class="mt-1">Poin Experience:</label>
                                          <select name="poinExperience" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->poin_experience }}">{{ $data->poin_experience }}</option>
                                            <option value="">Input Poin</option>
                                            @for ($i = 0; $i <= 20; $i++)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            @for ($i = -1; $i >= -20; $i--)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                          </select>
                                        </div>

                                        <div class="form-group">
                                          <label for="Note">Note :</label>
                                          <textarea name="note" class="form-control">{{ $data->catatan }} </textarea>
                                        </div>

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Save</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              @endforeach
                              @endif
   
@endsection
