@extends('Asisten.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bible Reading</h1>
          </div>
          
        </div>
        <div class="goup" style="text-align: right;">
          <button class="btn btn-outline-success ml-2 text-capitalize">Old Testament</button>
          <button class="btn btn-outline-success ml-2 text-capitalize">New Testament</button>
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
              <button class="btn btn-primary text-capitalize">Bible reading input</button>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center">
                  <tr>
                    <th rowspan="2" class="col-1">Date</th>
                    <th rowspan="2" class="col-1">Book</th>
                    <th rowspan="2" class="col-1">Verse</th>
                    <th>Inspiration</th>
                    <th rowspan="2" class="col-1">Action</th>
                  </tr>
                  <tr>
                   <th>Words/Phrases</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>21-10-2024</td>
                      <td>Yohanes</td>
                      <td>1</td>
                      <td>Ayat 1 Firman itu adalah Allah yang berinkarnasi menjadi Manusia yang sekarang Dia adalah Roh itu</td>
                      <td>
                        <Button class="btn btn-warning">Edit</Button>
                      </td>
                    </tr>
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
