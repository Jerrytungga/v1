@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Memorizing Verses</h1>
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
            <div class="card-header bg-warning">
           <a href="{{ route('MemorizingVerses.index') }}" class="btn  bg-light ">Back To View Memorizing Verses</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('MemorizingVerses.update', $MemorizingVerses->id) }}" method="post">
              @csrf
              @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                    <label for="Bible">Bible [Alamat Ayat Hafalan]</label>
                    <input type="text" value="{{ old('ayat', $MemorizingVerses->bible) }}" class="form-control" name="ayat" placeholder="Example [Yohanes 1:1]">
                  </div>
                  <div class="mt-2">
                    <label for="Paraf">Initial</label>
                    <input type="text" value="{{ old('paraf', $MemorizingVerses->paraf) }}" class="form-control" name="paraf" placeholder="Input nip trainee ">
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
