@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Hymns</h1>
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
           <a href="{{ route('Hymns.index') }}" class="btn text-light bg-dark ">Back To View Hymns</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('Hymns.index') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
                  <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
                  <div class="mt-2">
                    <label for="Numver">Hymns Number [Nomor Kidung]</label>
                    <input type="text" class="form-control" required name="kidung" placeholder="Example [kidung 147]">
                  </div>
                  <div class="mt-2">
                    <label for="stanza">Stanza [Bait Kidung]</label>
                    <input type="number" class="form-control" required name="stanza" placeholder=" Example [1] ">
                  </div>
                  <div class="mt-2">
                    <label for="Inspiration">Inspiration [Kata/Frase yang menjamah]</label>
                    <textarea name="frase" cols="4" rows="4" required placeholder=" Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!] " class="form-control"></textarea>
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
