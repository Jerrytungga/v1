@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hymns | {{$ambil_trainee->name}}</h1>
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

                <form action="{{ route('Hymns-week', $ambil_trainee->nip) }}" method="POST">
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
                    <a href="{{ route('Hymns-Asisten', $ambil_trainee->nip) }}" class="btn btn-danger ml-2">Reset</a>
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
                    <th class="col-1">Hymns number</th>
                    <th class="col-1">Stanza</th>
                    <th>Words/Phrases</th>
                    <th class="col-1">Action</th>
                     </tr>
                    </thead>

                    <tbody>
                    @if ($ambil_hymns->isNotEmpty())
                  @foreach($ambil_hymns as $data)
                  <tr>
                  <td>{{ $data->created_at }}</td>
                        <td>{{ $data->no_Hymns }}</td>
                        <td>{{ $data->stanza }}</td>
                        <td>{{ $data->frase }}
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
                        <td>
                          <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ipoin-{{ $data->id }}">Input Note & Poin</a>
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

    @if ($ambil_hymns->isNotEmpty())
    @foreach($ambil_hymns as $data)

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
                                    <form action="{{ route('HYMNS-poin', ['id' => $data->id]) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                        <div class="form-group">
                                          <label for="Hymns">Hymns Number :</label>
                                          <input type="text" class="form-control mb-1" disabled value="{{ $data->no_Hymns }}">
                                          <label for="Stanza">Stanza :</label>
                                          <input type="text" class="form-control mb-1" disabled value="{{ $data->stanza }}">
                                          <label for="Words/Phrases">Words/Phrases :</label>
                                          <textarea name="" class="form-control mb-1" disabled id="">{{ $data->frase }}</textarea>
                                          <label for="Poin">Poin :</label>
                                          <select name="poin" class="form-control " style="background-color:#001F3F; color:#FFFf;">
                                            <option value="{{ $data->poin }}">{{ $data->poin }}</option>
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
