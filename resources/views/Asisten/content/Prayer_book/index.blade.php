@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Prayer Book | {{$ambil_trainee->name}}</h1>
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
              <a href="{{ route('htrainee.asisten') }}" class="btn text-light mb-1 bg-dark ">Back To View Trainee</a>

              <form action="{{ route('prayerBook-week', $ambil_trainee->nip) }}" method="POST">
                @csrf
                <div class="form-inline">
                    <label for="semester" class="mr-2 ml-2">Chosen Week :</label>
                    <select class="form-control ml-2 col-12 col-sm-4 col-md-2" style="background-color:#001F3F; color:#FFFf;"  id="chosenWeek" name="week">
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
                    <button type="submit" class="btn ml-2" style="background-color:#001F3F; color:#FFFf;">View</button>
                    <a href="{{ route('Prayerbook-asisten', $ambil_trainee->nip) }}" class="btn btn-danger ml-2">Reset</a>
                </div>
               </form>
            </div>
            <!-- /.card-header -->


            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold" style="background-color: #001F3F; color:#fff;">
                  <tr>
                     <th style="width: 15%;">Prayer Date</th>
                     <th style="width: 15%;">Topic</th>
                     <th style="width: 15%;">Light</th>
                     <th style="width: 20%;">Appreciation</th>
                     <th style="width: 20%;">Action</th>
                     <th style="width: 10%;">Prayer Answered Date</th>
                     <th style="width: 25%;">Prayer Answer</th>
                     <th style="width: 10%;">Action</th>
                     </tr>
                  
                  </thead>
                  <tbody>
                  @if ($ambil_prayer->isNotEmpty())
                  @foreach($ambil_prayer as $data)
                  <tr>
                      <td class="col-1">{{ $data->prayer_date }}</td>
                      <td class="col-4">{{ $data->topic }}
                      @if (!empty($data->catatan))
                        <blockquote class="blockquote" style="background-color: #FFF5E4;">
                        <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                        <footer class="blockquote-footer">Asisten {{ $namaAsisten }}</footer>
                        </blockquote>
                        @endif
                        <br>
                        @if($data->poin_topic) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_topic }}
                          </span>
                          @endif

                      </td>
                      <td class="col-4">{{ $data->light }} <br>
                      @if($data->light_poin) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->light_poin }}
                          </span>
                          @endif
                      </td>

                      <td class="col-4">{{ $data->appreciation }} <br>
                      @if($data->appreciation_poin) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->appreciation_poin }}
                          </span>
                          @endif
                      </td>


                      <td class="col-4">{{ $data->action }} <br>
                      @if($data->action_poin) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->action_poin }}
                          </span>
                          @endif

                      </td>
                      <td class="col-4">{{ $data->prayer_answered_date }}</td>
                      <td class="col-4">{{ $data->prayer_answer }}</td>
                      <td>
                          <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ipoin-{{ $data->id }}">Input Note & Poin</a>

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
                                    <form action="{{ route('Pb-poin', ['id' => $data->id]) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                        <div class="form-group">
                                          <label for="Topic">Topic :</label>
                                          <textarea name="Verses" disabled class="form-control">{{ $data->topic }}</textarea>
                                          <select name="poin_topic" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->poin_topic }}">{{ $data->poin_topic }}</option>
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
                                          <label for="light">Light :</label>
                                          <textarea name="Verses" disabled class="form-control">{{ $data->light }}</textarea>
                                          <select name="light_poin" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->light_poin }}">{{ $data->light_poin }}</option>
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
                                          <label for="Appreciation">Appreciation :</label>
                                          <textarea name="appreciation" disabled class="form-control">{{ $data->appreciation }}</textarea>
                                          <select name="appreciation_poin" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->appreciation_poin }}">{{ $data->appreciation_poin }}</option>
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
                                          <label for="Action">Action :</label>
                                          <textarea name="action" disabled class="form-control">{{ $data->action }}</textarea>
                                          <select name="action_poin" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->action_poin }}">{{ $data->action_poin }}</option>
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
                              </td>
                  </tr>
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
                  </tbody>
                  <tfoot>
                      <tr style="background-color: #F5F5F5; font-weight: bold;">
                        <td colspan="8" class="text-left">Total Poin : <span class="badge badge-pill badge-danger">{{$totalPoin }} </span></td>
                      </tr>
                    </tfoot>
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

@endsection
