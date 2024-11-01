@extends('Trainee.layout.main')
@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>5 Time Prayer</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <a href="{{ route('fiveTimesPrayer.create') }}" class="btn btn-success">Input 5 Time Prayer</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center font-weight-bold bg-primary">
                  <tr>
                     <th>Date</th>
                     <th>Topic Prayer</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $data)
                  <tr>
                      <td class="col-2">{{ $data->created_at }}</td>
                      <td class="col-8">{{ $data->poin_prayer }} 
                          @if (!empty($data->catatan)) <!-- Mengecek apakah catatan tidak kosong -->
                            <blockquote class="blockquote" style="background-color: #F5F5F5;">
                                <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                                <footer class="blockquote-footer">Asisten</footer>
                            </blockquote>
                        @endif
                      </td>
                      <td class="col-2">
                          @if (\Carbon\Carbon::parse($data->created_at)->diffInDays() < 1)
                              <a href="{{ route('fiveTimesPrayer.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                          @endif
                      </td>
                  </tr>
                    @endforeach
                 
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
@endsection
