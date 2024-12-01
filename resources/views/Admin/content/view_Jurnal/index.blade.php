@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> ITEM JOURNAL
            </h1>
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
      <div class="col-12 col-sm-6 col-md-6">
          <div class="card">
            <div class="card-header">
            <h4 class="text-bold text-success">Trainee</h4>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead class="font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th>Category</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($jurnal as $index => $data)
                      <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $data->type }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $data->name }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $data->status }}</td> <!-- Kolom Name rata kiri -->
                        <td>
                        @if($data->status == 'active')
                                <!-- If status is 'Active', show the 'Inactive' button -->
                                <form action="{{ route('Inactive.jurnal', $data->id) }}" method="post">
                                    @csrf
                                    @method('GET') <!-- Use PUT method -->
                                    <button type="submit" class="btn btn-danger">Inactive</button>
                                </form>
                            @else
                                <!-- If status is not 'Active', show the 'Active' button -->
                                <form action="{{ route('Active.jurnal', $data->id) }}" method="post">
                                    @csrf
                                    @method('GET') <!-- Use PUT method -->
                                    <button type="submit" class="btn btn-success">Active</button>
                                </form>
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-6">
          <div class="card">
            <div class="card-header">
            <h4 class="text-bold text-success">Asisten</h4>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-bordered table-hover">
                  <thead class="font-weight-bold" style="background-color: #C4DAD2;">
                    <tr>
                      <th>No</th>
                      <th>Category</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($itemMenu as $index => $menu)
                      <tr>
                        <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                        <td>{{ $menu->type }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $menu->title }}</td> <!-- Kolom Name rata kiri -->
                        <td>{{ $menu->status }}</td> <!-- Kolom Name rata kiri -->
                        <td>
                        @if($menu->status == 'active')
                                <!-- If status is 'Active', show the 'Inactive' button -->
                                <form action="{{ route('Inactive.jurnal_Asisten', $menu->id) }}" method="post">
                                    @csrf
                                    @method('GET') <!-- Use PUT method -->
                                    <button type="submit" class="btn btn-danger">Inactive</button>
                                </form>
                            @else
                                <!-- If status is not 'Active', show the 'Active' button -->
                                <form action="{{ route('Active.jurnal_Asisten', $menu->id) }}" method="post">
                                    @csrf
                                    @method('GET') <!-- Use PUT method -->
                                    <button type="submit" class="btn btn-success">Active</button>
                                </form>
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
            <!-- /.card -->
          </div>
          <!-- /.col -->










          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
   


@endsection
