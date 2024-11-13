@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Summary Of Ministry</h1>
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
           <a href="{{ route('ministri.index') }}" class="btn btn-light ">Back To View Summary Of Ministry</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('ministri.update', $data->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                  <div class="mt-2">
                    <label for="kategori">Category [Kategori]</label>
                    <select name="kategori" class="form-control bg-info col-4" required>
                      <option value="">Please select a category</option>
                      <option value="Pembinaan Dasar" {{ old('kategori', $data->category) == 'Pembinaan Dasar' ? 'selected' : '' }}>Basic Training [Pembinaan Dasar]</option>
                      <option value="Pelajaran Hayat" {{ old('kategori', $data->category) == 'Pelajaran Hayat' ? 'selected' : '' }}>Life Lessons [Pelajaran Hayat]</option>
                    </select>
                  </div>


                  <div class="mt-2">
                    <label for="Book">Book Title [Judul Buku]</label>
                    <input type="text" class="form-control" required name="Book" value="{{ old('Book', $data->book_title) }}">
                  </div>
                  <div class="mt-2">
                    <label for="News">News [Berita]</label>
                    <input type="number" class="form-control" required name="News" value="{{ old('News', $data->news) }}">
                  </div>
                  <div class="mt-2">
                    <label for="Inspiration">Inspiration [Kata/Frase yang menjamah]</label>
                    <textarea name="frase" cols="4" rows="4" required  class="form-control">{{ old('News', $data->inspirasi) }}</textarea>
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
