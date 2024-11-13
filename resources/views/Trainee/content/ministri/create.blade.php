@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Summary Of Ministry</h1>
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
           <a href="{{ route('ministri.index') }}" class="btn text-light bg-dark ">Back To View Summary Of Ministry</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('ministri.store') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
                  <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
                  <div class="mt-2">
                    <label for="Keterangan">Category  [Kategori]</label>
                    <select name="kategori" class="form-control bg-info col-4" required id="">
                    <option value="">Please select a category</option>
                    <option value="Pembinaan Dasar">Basic Training [Pembinaan Dasar]</option>
                    <option value="Pelajaran Hayat">Life Lessons [Pelajaran Hayat]</option>
                    </select>
                  </div>
                  <div class="mt-2">
                    <label for="Book">Book Title [Judul Buku]</label>
                    <input type="text" class="form-control" required name="Book" placeholder="Example [Pengalaman Hayat]">
                  </div>
                  <div class="mt-2">
                    <label for="News">News [Berita]</label>
                    <input type="number" class="form-control" required name="News" placeholder=" Example [1] ">
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
