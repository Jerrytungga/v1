@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Journal</h1>
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
      
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                    <th class="col-1">Week</th>
                    <th class="col-1">Bible</th>
                    <th class="col-1">Memorizing</th>
                    <th class="col-1">Hymns</th>
                    <th class="col-1">Prayer 5 Time</th>
                    <th class="col-1">TP</th>
                    <th class="col-1">Doa</th>
                    <th class="col-1">P.Goals</th>
                    <th class="col-1">Ministry</th>
                    <th class="col-1">Fellowship</th>
                    <th class="col-1">Ts</th>
                    <th class="col-1">Agenda</th>
                    <th class="col-1">Finance</th>
                    <th class="col-1">Achievement</th>
                    <th class="col-1 bg-dark">Standard Points</th>
                    <th class="col-1">Status</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  @if ($entrys->isNotEmpty())
                  @foreach($entrys as $data)
                  <tr>
                      <td class="col-1">{{ $data->week }}
                      <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ipoin-{{ $data->id }}">View Note</a>
                      </td>
                      <td class="col-1">{{ $data->bible }}</td>
                      <td class="col-1">{{ $data->memorizing }}</td>
                      <td class="col-1">{{ $data->hymns }}</td>
                      <td class="col-1">{{ $data->prayer_5_time }}</td>
                      <td class="col-1">{{ $data->tp }}</td>
                      <td class="col-1">{{ $data->doa }}</td>
                      <td class="col-1">{{ $data->p_goals }}</td>
                      <td class="col-1">{{ $data->ministry }}</td>
                      <td class="col-1">{{ $data->fellowship }}</td>
                      <td class="col-1">{{ $data->ts }}</td>
                      <td class="col-1">{{ $data->agenda }}</td>
                      <td class="col-1">{{ $data->finance }}</td>
                      <td class="col-1">{{ $data->achievement }}</td>
                      <td class="col-1">{{ $data->standart_poin }}</td>
                      <td class="col-1" 
                        style="background-color: {{ $data->status == 'IC' ? 'red' : ($data->status == 'C' ? 'green' : 'white') }}; color: white; text-align: center;">
                        {{ $data->status }}
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
                </table>

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

    @if ($entrys->isNotEmpty())
    @foreach($entrys as $data)

    <div class="modal fade" id="ipoin-{{ $data->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable" role="document">
                              <div class="modal-content">
                                  <div class="modal-header bg-primary">
                                      <h5 class="modal-title" id="changePasswordModalLabel">View Note</h5>
                                      <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <!-- Form for editing note -->
                                  <form action="" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                          <!-- Input Note Field -->
                                          <div class="form-group">
                                              <label for="Note">Note:</label>
                                              <textarea name="note" readonly class="form-control" required>{{ old('note', $data->catatan) }}</textarea>
                                          </div>
                                      </div>

                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                      @endforeach
                      @endif









  <!-- Menampilkan pesan jika ada -->
  @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

@endsection
