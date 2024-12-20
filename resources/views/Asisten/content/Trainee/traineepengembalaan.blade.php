@extends('Asisten.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1>Trainees Who Have Been Shepherded</h1>
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
          <a href="{{ route('htrainee.asisten') }}" class="btn text-light mb-1 bg-dark">Back To View Trainee</a>
          </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center" style="background-color: #4A4947; color:#ffff;">
                   
                  <tr>
                    <th rowspan="2" style="width: 50px;">No</th>
                    <th rowspan="2" style="width: 400px;">Trainee</th>
                    <th colspan="2" style="width: 50px;">Jurnal</th>
                  </tr>
                  <tr>
                     <th>Daily</th>
                     <th>Weekly</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($traines as $index => $data)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>
                      <p class="font-italic">
                        @php
                                $ambiltrainee = \App\Models\Trainee::where('nip', $data->nip)->first();
                        @endphp
                            {{ $ambiltrainee ? $ambiltrainee->name : '' }}


                      
                    
                    </p>
                      <span class="badge badge-success">BACTH {{ $ambiltrainee->batch }}</span>
                      <span class="badge badge-warning">SEMESTER {{ $data->semester }}</span>
                      </td>
                  
                      <td class="col-4">
                    
                        <a href="{{ route('view-biblereading', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                              Bible Reading
                        </a>
                          <a href="{{ route('view-memorizing', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                                View Memorizing
                          </a>
                          <a href="{{ route('view-hymns', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                                Hymns
                          </a>
                          <a href="{{ route('view-five-time-prayer', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                                5 Time Prayer
                          </a>
                          <a href="{{ route('view-personal-goals', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                                Personal Goals
                          </a>
                          <a href="{{ route('view-goodland', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                                Good Land
                          </a>
                          <a href="{{ route('view-prayerbook', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                                Prayer Book
                          </a>
                        </td>
                        
                        <td class="col-4">
                        <a href="{{ route('view-Summery-of-Ministry', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                              Ministry Summary
                        </a>
                        <a href="{{ route('view-fellowship', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                              Fellowship
                        </a>
                        <a href="{{ route('view-script', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                            Script Ts & Exhibition
                        </a>
                        <a href="{{ route('view-agenda', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                            Agenda
                        </a>
                        <a href="{{ route('view-finance', ['nip' => $data->nip, 'semester' => $data->semester]) }}" class="btn btn-sm m-1" style="background-color: #f0f8ff; color: #333;">
                        Financial Statements
                        </a>
                       
                      </td>

                  
                    </tr>
                    @endforeach
          
                   


                  </tbody>
                 
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

<script>
  

  let table = new DataTable('#example3', {
    responsive: true
});

</script>
@endsection
