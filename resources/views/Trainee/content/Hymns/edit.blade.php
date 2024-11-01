@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Hymns</h1>
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
           <a href="{{ route('Hymns.index') }}" class="btn text-dark btn-light ">Back To View Hymns</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('Hymns.update', $hymns->id) }}" method="post">
              @csrf
              @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                    <label for="Number">Hymns Number [Nomor Kidung]</label>
                    <input type="text" class="form-control" value="{{ old('kidung', $hymns->no_Hymns) }}" required name="kidung" placeholder="Example [kidung 147]">
                  </div>
                  <div class="mt-2">
                    <label for="stanza">Stanza [Bait Kidung]</label>
                    <input type="number" value="{{ old('stanza', $hymns->stanza) }}" class="form-control" required name="stanza" placeholder=" Example [1] ">
                  </div>
                  <div class="mt-2">
                    <label for="Inspiration">Inspiration [Kata/Frase yang menjamah]</label>
                    <textarea name="frase" cols="4" rows="4"  required placeholder=" Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!] " class="form-control">{{ old('frase', $hymns->frase) }}</textarea>
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
