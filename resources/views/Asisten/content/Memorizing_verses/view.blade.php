@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Memorizing Verses | {{$ambil_trainee->name}}</h1>
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

                <form action="{{ route('view_memorizing_filter', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" method="POST">
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
                    <a href="{{ route('view-memorizing', ['nip' => $ambil_trainee->nip, 'semester' => $semester]) }}" class="btn btn-danger ml-2">Reset</a>
                  </div>
                </form>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead class="text-center font-weight-bold" style="background-color: #001F3F; color:#fff;">
                    <tr>
                        <td>Date</td>
                        <td>Bible</td>
                        <td>Partner</td>
                     
                     </tr>
                    </thead>

                    <tbody>
                    @if ($ambil_memorizing_verse->isNotEmpty())
                  @foreach($ambil_memorizing_verse as $data)
                  <tr>
                      <td class="col-1">{{ $data->created_at }}</td>
                      <td class="col-4">{{ $data->bible }}
                          @if (!empty($data->catatan))
                          <blockquote class="blockquote" style="background-color: #FFF5E4;">
                              <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                              <footer class="blockquote-footer">Asisten {{ $namaAsisten }}</footer>
                            </blockquote>
                            @endif
                            @if($data->poin)  <br>
                          <span class="badge" style="background-color:#B9D7EA; color:#000000;">
                            Poin: {{ $data->poin }}
                          </span>
                          @endif

                        </td>
                        <td class="col-4">
                        @php
                        $trainee = \App\Models\Trainee::where('nip', $data->paraf)->first();
                        @endphp
                        {{ $trainee ? $trainee->name : 'No trainee' }}
                   
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
                        <td colspan="13" class="text-left">Total Poin : <span class="badge badge-pill badge-danger">{{ $totalPoin }} </span></td>
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
