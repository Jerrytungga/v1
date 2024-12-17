@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personal Goals Assignment | {{$ambil_trainee->name}}</h1>
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
                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#staticBackdrop">
                Add Assignment
                </button>
                <form action="{{ route('Add_Assignment_Week', $ambil_trainee->nip) }}" method="POST">
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
                    <a href="{{ route('Assignment-Asisten', $ambil_trainee->nip) }}" class="btn btn-danger ml-2">Reset</a>
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
                    <th class="col-1">Assignment</th>
                    <th class="col-1">Status</th>
                    <th class="col-1">Action</th>
                     </tr>
                    </thead>

                    <tbody>
                    @if ($ambil_tugas->isNotEmpty())
                      @foreach($ambil_tugas as $data)
                    <tr>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->Assignment }}</td>
                        <td>{{ $data->status }}</td>
                        <td>
                            @if($data->status == 'active')
                                <!-- If status is 'Active', show the 'Inactive' button -->
                                <form action="{{ route('Add_Assignment_Inactive', $data->id) }}" method="post">
                                    @csrf
                                    @method('PUT') <!-- Use PUT method -->
                                    <button type="submit" class="btn btn-danger">Inactive</button>
                                </form>
                            @else
                                <!-- If status is not 'Active', show the 'Active' button -->
                                <form action="{{ route('Add_Assignment_Active', $data->id) }}" method="post">
                                    @csrf
                                    @method('PUT') <!-- Use PUT method -->
                                    <button type="submit" class="btn btn-success">Active</button>
                                </form>
                            @endif
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

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"  style="background-color: #001F3F; color:#fff;">
        <h5 class="modal-title" id="staticBackdropLabel">Personal Goals Assignment </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('Add_Assignment') }}" method="post">
      @csrf
      <div class="modal-body">
        <input type="hidden" name="nip" value="{{$ambil_trainee->nip}}">
        <input type="hidden" name="asisten_id" value="{{$ambil_trainee->asisten_id}}">
        <input type="hidden" name="semester" value="{{$ambil_trainee->semester}}">
        <input type="hidden" name="week" value="{{$Week}}">
        <div class="mb-1">
            <label for="">Assignment :</label>
            <textarea name="Assignment" class="form-control" id=""></textarea>
        </div>
        <div class="mb-1">
            <label for="">Status :</label>
            <select name="status" class="form-control" id="">
                <option value="">Pleace select a status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
    
  </div>
</div>

@endsection
