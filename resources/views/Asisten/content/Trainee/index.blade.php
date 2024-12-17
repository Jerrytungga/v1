@extends('Asisten.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
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
                      <p class="font-italic">{{ $data->name }}</p>
                      <span class="badge badge-success">BACTH {{ $data->batch }}</span>
                      <span class="badge badge-warning">SEMESTER {{ $data->semester }}</span>
                      </td>
                  
                      <td class="col-4">
                          @if($dailyItems->isEmpty())
                              <div class="alert alert-warning" role="alert">
                                  No active daily menu items.
                              </div>
                          @else
                              @foreach ($dailyItems as $item)
                                  <a href="{{ route($item->route, $data->nip) }}" class="btn btn-sm btn-info m-1">{{ $item->title }}</a>
                              @endforeach
                          @endif
                      </td>

                      <td class="col-4">
                          @if($weeklyItems->isEmpty())
                              <div class="alert alert-warning" role="alert">
                                  No active weekly menu items.
                              </div>
                          @else
                              @foreach ($weeklyItems as $item)
                                  <a href="{{ route($item->route, $data->nip) }}" class="btn btn-sm btn-info m-1">{{ $item->title }}</a>
                              @endforeach
                          @endif
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
