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
              <a href="{{ route('pengembalaan-trainee') }}" class="btn text-light mb-1 bg-dark">Back To Shepherded
              </a>
                <form action="{{ route('view_goodland_filter', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" method="POST">
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
                    <a href="{{ route('view-goodland', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" class="btn btn-danger ml-2">Reset</a>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <div class="table-responsive">
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
