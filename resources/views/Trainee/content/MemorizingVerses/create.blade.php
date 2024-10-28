@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Memorizing Verses</h1>
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
            <div class="card-header bg-primary">
           <a href="{{ route('MemorizingVerses.index') }}" class="btn text-light bg-dark ">Back To View Memorizing Verses</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('MemorizingVerses.index') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="123" id="">
                  <input type="hidden" name="nip" value="123" id="">
                  <div class="mt-2">
                    <label for="Bible">Bible [Alamat Ayat Hafalan]</label>
                    <input type="text" class="form-control" name="ayat" placeholder="Example [Yohanes 1:1]">
                  </div>
                  <div class="mt-2">
                    <label for="Paraf">Initial</label>
                    <input type="text" class="form-control" name="paraf" placeholder="Input nip trainee ">
                  </div>
                   
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
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