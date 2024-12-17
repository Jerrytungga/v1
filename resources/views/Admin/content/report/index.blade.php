@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>REPORT JOURNAL TRAINEE</h1>
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
                <!-- Start of Form -->
                <form action="{{ route('report_fil_jurnal') }}" method="POST">
                  @csrf
                  <div class="form-inline flex-wrap">
                    <label for="batch" class="mr-2 ml-2">Chosen Batch & Week :</label>

                    <!-- Batch Dropdown -->
                    <select name="angkatan" required class="form-control col-12 col-md-2 mr-2 mb-2 ml-md-2" style="background-color: #006A67; color:#fff;">
                        <option value="">Select Batch</option>
                        @foreach ($batch as $batch)
                          <option value="{{ $batch->batch }}">{{ $batch->batch }}</option>
                        @endforeach
                    </select>

                    <!-- Week Dropdown -->
                    <select name="week" class="form-control col-12 col-md-2 mr-2 mb-2 ml-md-2" style="background-color: #006A67; color:#fff;" required>
                      <option value="">Please select a week</option>
                      @foreach ($weekly as $data)
                        <option value="{{ $data->Week }}">{{ $data->Week }}</option>
                      @endforeach
                    </select>

                    <!-- Submit and Reset Buttons -->
                    <button type="submit" class="btn col-12 mr-2 col-md-auto mb-2" style="background-color: #006A67; color:#fff;">
                      <i class="fas fa-eye"></i>
                    </button>
                    <a href="{{ route('report_view_jurnal') }}" class="btn btn-danger col-12 col-md-auto mb-2">Reset</a>
                  </div>
                </form>

                <!-- Form for PDF Generation -->
                <form action="{{ route('generatePDF') }}" method="POST">
                  @csrf
                  <input type="hidden" name="angkatan" value="{{ $request->angkatan }}">
                  <input type="hidden" name="week" value="{{ $request->week }}">
                  <button type="submit" class="btn btn-success col-12 col-md-auto mb-2">
                      <i class="fas fa-print"></i> Print PDF
                  </button>
                </form>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <div class="table-responsive">
                  @if($report->isEmpty())
                    <div class="alert alert-warning" role="alert">
                      No data available to display.
                    </div>
                  @else
                    <table class="table table-bordered table-hover">
                      <thead class="font-weight-bold" style="background-color: #BCCCDC;">
                        <tr>
                          <th colspan="14">
                            <center>
                              <h2>WEEKLY JOURNAL REPORT</h2>
                              Week : {{ $request->week }} || Batch : {{ $request->angkatan }}
                            </center>
                          </th>
                        </tr> 
                        <tr>
                          <th>No</th>
                          <th>Trainee</th>
                          <th>Bible Reading</th>
                          <th>Memorizing Verses</th>
                          <th>Hymns</th>
                          <th>5 Times Prayer</th>
                          <th>Personal Goals</th>
                          <th>Good Land</th>
                          <th>Prayer Book</th>
                          <th>Summary Of Ministry</th>
                          <th>Fellowship</th>
                          <th>Script Ts & Exhibition</th>
                          <th>Agenda</th>
                          <th>Financial Statements</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($report as $index => $data)
                        @php
                          $standar = \App\Models\Poinjurnal::where('semester', $data->semester)->first();
                        @endphp
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td class="col-3">
                            @php
                              $trainee = \App\Models\Trainee::where('nip', $data->nip)->first();
                            @endphp
                            {{ $trainee ? $trainee->name : '' }}
                            <br>
                            <span class="badge badge-pill badge-primary">Semester : {{ $data->semester }} || 
                              Asisten : 
                              @php
                               $assistant = \App\Models\Asisten::where('nip', $data->asisten_id)->first();
                              @endphp
                              {{ $assistant ? $assistant->name : 'No Assistant' }}
                            </span>
                            @php
                                if($data->status == 'C') {
                                    echo '<span class="badge badge-pill badge-success">Status : Completed</span><br>';
                                } else {
                                    echo '<span class="badge badge-pill badge-danger">Status : Incomplete</span><br>';
                                }
                            @endphp
                            <span class="badge badge-warning">Note : {{ $data->catatan }}</span>
                          </td>
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->bible }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->bible : 0 }}</h3>
                          </td>
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->memorizing }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->memorizing_bible : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->hymns }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->hymns : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->prayer_5_time }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->five_times_prayer : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->p_goals }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->personal_goals : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->tp }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->good_land : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->doa }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->prayer_book : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->ministry }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->summary_of_ministry : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->fellowship }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->fellowship : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->ts }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->script_ts_exhibition : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->agenda }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->agenda : 0 }}</h3>
                          </td> 
                          <td class="text-center">
                            <h3 class="text-danger">{{ $data->finance }}</h3> 
                            <h3 class="text-primary">{{ $standar ? $standar->finance : 0 }}</h3>
                          </td> 
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <p><span class="badge badge-danger">.</span> The red color indicates the achievement points.</p>
                    <p><span class="badge badge-primary">.</span> The blue color indicates the target points that must be achieved.</p>
                  @endif
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
