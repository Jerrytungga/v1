@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Good Land | {{$ambil_trainee->name}}</h1>
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
                <a href="{{ route('htrainee.asisten') }}" class="btn text-light mb-1 bg-dark">Back To View Trainee</a>

                <form action="{{ route('GL-week', $ambil_trainee->nip) }}" method="POST">
                  @csrf
                  <div class="form-inline">
                    <label for="semester" class="mr-2 ml-2">Chosen Week :</label>
                    <select class="form-control ml-2 col-12 col-sm-4 col-md-2" style="background-color:#001F3F; color:#FFFf;" id="chosenWeek" name="week">
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
                    <a href="{{ route('Goodland-asisten', $ambil_trainee->nip) }}" class="btn btn-danger ml-2">Reset</a>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead class="text-center font-weight-bold" style="background-color: #001F3F; color:#fff;">
                      <tr>
                        <th class="col-1">Date</th>
                        <th class="col-1">Verses</th>
                        <th class="col-1">DA</th>
                        <th class="col-1">DT</th>
                        <th class="col-1">DS</th>
                        <th class="col-1">Experience 1</th>
                        <th class="col-1">Experience 2</th>
                        <th class="col-1">Experience 3</th>
                        <th class="col-1">Experience 4</th>
                        <th class="col-1">Experience 5</th>
                        <th class="col-1">Experience 6</th>
                        <th class="col-1">Note</th>
                        <th class="col-1">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                    @if ($ambil_goodland->isNotEmpty())
                      @foreach($ambil_goodland as $data)
                        <tr>
                          <td>{{ $data->created_at }}</td>
                          <td>{{ $data->verses }} <br> 
                          @if($data->poin_verses) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_verses }}
                          </span>
                          @endif
                          </td>

                          <td>{{ $data->da }} <br>
                          @if($data->poin_da) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_da }}
                          </span>
                          @endif
                          </td>

                          <td>{{ $data->dt }} <br>
                          @if($data->poin_dt) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_dt }}
                          </span>
                          @endif
                          </td>


                          <td>{{ $data->ds }} <br>
                          @if($data->poin_ds) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_ds }}
                          </span>
                          @endif
                          </td>



                          <td>{{ $data->experience_1 }} <br>
                          @if($data->poin_experience_1) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_experience_1 }}
                          </span>
                          @endif
                          
                          @if($data->experience_1_time) 
                          <span class="badge" style="background-color:#BE9639; color:#000000;">
                          Time: {{ $data->experience_1_time }}
                          </span>
                          @endif
                          </td>



                          <td>{{ $data->experience_2 }} <br> 
                          @if($data->poin_experience_2) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_experience_2 }}
                          </span>
                          @endif
                          
                          @if($data->experience_2_time) 
                          <span class="badge" style="background-color:#BE9639; color:#000000;">
                          Time: {{ $data->experience_2_time }}
                          </span>
                          @endif
                          </td>


                          <td>{{ $data->experience_3 }} <br>
                          @if($data->poin_experience_3) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_experience_3 }}
                          </span>
                          @endif
                          
                          @if($data->experience_3_time) 
                          <span class="badge" style="background-color:#BE9639; color:#000000;">
                          Time: {{ $data->experience_3_time }}
                          </span>
                          @endif
                          </td>

                          <td>{{ $data->experience_4 }} <br> 
                          @if($data->poin_experience_4) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_experience_4 }}
                          </span>
                          @endif
                          
                          @if($data->experience_4_time) 
                          <span class="badge" style="background-color:#BE9639; color:#000000;">
                          Time: {{ $data->experience_4_time }}
                          </span>
                          @endif
                          </td>

                          <td>{{ $data->experience_5 }} <br> 
                          @if($data->poin_experience_5) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_experience_5 }}
                          </span>
                          @endif
                          
                          @if($data->experience_5_time) 
                          <span class="badge" style="background-color:#BE9639; color:#000000;">
                          Time: {{ $data->experience_5_time }}
                          </span>
                          @endif
                          </td>


                          <td>{{ $data->experience_6 }} <br>
                          @if($data->poin_experience_6) 
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin_experience_6 }}
                          </span>
                          @endif
                          
                          @if($data->experience_6_time) 
                          <span class="badge" style="background-color:#BE9639; color:#000000;">
                          Time: {{ $data->experience_6_time }}
                          </span>
                          @endif   
                         </td>

                          <td>{{ $data->catatan }}</td>
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
                                    <form action="{{ route('GL-poin', ['id' => $data->id]) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                        <div class="form-group">
                                          <label for="Verses">Verses :</label>
                                          <textarea name="Verses" disabled class="form-control">{{ $data->verses }}</textarea>
                                          <select name="poin_verses" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->poin_verses }}">{{ $data->poin_verses }}</option>
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
                                          <label for="DA">DA :</label>
                                          <textarea name="DA" disabled class="form-control">{{ $data->da }}</textarea>
                                          <select name="poin_DA" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_da }}">{{ $data->poin_da }}</option>
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
                                          <label for="DT">DT :</label>
                                          <textarea name="DT" disabled class="form-control">{{ $data->dt }}</textarea>
                                          <select name="poin_DT" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_dt }}">{{ $data->poin_dt }}</option>
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
                                          <label for="DS">DS :</label>
                                          <textarea name="DS" disabled class="form-control">{{ $data->dt }}</textarea>
                                          <select name="poin_DS" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_ds }}">{{ $data->poin_ds }}</option>
                                            <option value="">Input Poin</option>
                                            @for ($i = 0; $i <= 20; $i++)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                            @for ($i = -1; $i >= -20; $i--)
                                              <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                          </select>
                                        </div>
                                        <!-- Repeat the same structure for Experience fields -->
                                        <div class="form-group">
                                          <label for="Experience 1">Experience 1 : <span class="badge badge-info">Time : {{ $data->experience_1_time }}</span></label>
                                          <textarea name="Experience_1" disabled class="form-control">{{ $data->experience_1 }} </textarea>
                                          <select name="poin_Experience_1" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_experience_1 }}">{{ $data->poin_experience_1 }}</option>
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
                                          <label for="Experience 2">Experience 2 : <span class="badge badge-info">Time : {{ $data->experience_2_time }}</span></label>
                                          <textarea name="Experience_2" disabled class="form-control">{{ $data->experience_2 }} </textarea>
                                          <select name="poin_Experience_2" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_experience_2 }}">{{ $data->poin_experience_2 }}</option>
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
                                          <label for="Experience 3">Experience 3 : <span class="badge badge-info">Time : {{ $data->experience_3_time }}</span></label>
                                          <textarea name="Experience_3" disabled class="form-control">{{ $data->experience_3 }} </textarea>
                                          <select name="poin_Experience_3" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_experience_3 }}">{{ $data->poin_experience_3 }}</option>
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
                                          <label for="Experience 4">Experience 4 : <span class="badge badge-info">Time : {{ $data->experience_4_time }}</span></label>
                                          <textarea name="Experience_4" disabled class="form-control">{{ $data->experience_4 }} </textarea>
                                          <select name="poin_Experience_4" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_experience_4 }}">{{ $data->poin_experience_4 }}</option>
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
                                          <label for="Experience 5">Experience 5 : <span class="badge badge-info">Time : {{ $data->experience_5_time }}</span></label>
                                          <textarea name="Experience_5" disabled class="form-control">{{ $data->experience_5 }} </textarea>
                                          <select name="poin_Experience_5" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_experience_5 }}">{{ $data->poin_experience_5 }}</option>
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
                                          <label for="Experience 6">Experience 6 : <span class="badge badge-info">Time : {{ $data->experience_6_time }}</span></label>
                                          <textarea name="Experience_6" disabled class="form-control">{{ $data->experience_6 }} </textarea>
                                          <select name="poin_Experience_6" class="form-control mt-1" style="background-color:#001F3F; color:#FFFf;">
                                          <option value="{{ $data->poin_experience_6 }}">{{ $data->poin_experience_6 }}</option>
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
                        <td colspan="13" class="text-left">Total Poin : <span class="badge badge-pill badge-danger">{{$totalPoin }} </span></td>
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
