@extends('Asisten.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Announcement</h1>
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
          <button type="button" class="btn" style="background-color: #001F3F; color:#fff;" data-toggle="modal" data-target="#Announcement">
          Input Announcement
          </button>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center" style="background-color: #001F3F; color:#fff;">
                   
                  <tr>
                     <th>No</th>
                     <th>Trainee</th>
                     <th>Message</th>
                     <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($tampilkan_pesan as $index => $data)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>
                      @php
                       $trainee = \App\Models\Trainee::where('nip', $data->nip)->first();
                       @endphp
                      {{ $trainee ? $trainee->name : 'all' }}

                      </td>
                      <td>{{ $data->pesan }}</td>
                     <td>
                     <form action="{{ route('h.message', $data->id) }}" method="post">
                          @csrf
                          @method('PUT') <!-- Menggunakan method PUT -->
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>


                     </td>
                  
                    </tr>
                    @endforeach
                   


                  </tbody>
                 
                </table>
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


    <!-- Modal -->
<div class="modal fade" id="Announcement" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #001F3F; color:#fff;">
        <h5 class="modal-title" id="staticBackdropLabel">Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('notif.store') }}" method="post">
      @csrf
      <div class="modal-body">
        <div>
          <label for="trainee">Trainee</label>
          <select name="traines" class="form-control" id="">
            <option value="">Select trainee</option>
            <option value="all">All trainee</option>
          @foreach ($ambil_trainee as $trainee)
          <option value="{{ $trainee->nip }}">{{ $trainee->name }}</option>
          @endforeach
          </select>
        </div>
        <div class="mt-2">
          <label for="Message">Message</label>
          <textarea name="message" class="form-control" id=""></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">save</button>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection
