@extends('Asisten.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Trainee</h1>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center" style="background-color: #001F3F; color:#fff;">
                   
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
                      <p class="font-italic">{{ $data->name }}</p>
                      <span class="badge badge-success">BACTH {{ $data->batch }}</span>
                      <span class="badge badge-warning">SEMESTER {{ $data->semester }}</span>
                      </td>
                      <td class="col-4">
                        <a href="{{ route('bible-asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Bible Reading</a>
                        <a href="{{ route('Memorizing_verses-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Memorizing Verses</a>
                        <a href="{{ route('Hymns-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Hymns</a>
                        <a href="{{ route('Fivetimeprayer-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">5 Times Prayer</a>
                        <a href="{{ route('personalgoals-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Personal Goals</a>
                        <a href="{{ route('Goodland-asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Good Land</a>
                        <a href="{{ route('Prayerbook-asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Prayer Book</a>
                      </td>
                      <td>
                        <a href="{{ route('Ministry-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Summary Of Ministry</a>
                        <a href="{{ route('Fellowship-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Fellowship</a>
                        <a href="{{ route('Script-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Script Ts & Exhibition</a>
                        <a href="{{ route('Agenda-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Agenda</a>
                        <a href="{{ route('Financial-Asisten', $data->nip) }}" class="btn btn-sm btn-info m-1">Financial Statements</a>
                        <!-- <a href="" class="btn btn-sm btn-info m-1">Journal Report</a> -->
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

@endsection
