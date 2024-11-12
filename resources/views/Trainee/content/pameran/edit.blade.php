@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Script</h1>
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
           <a href="{{route('pameran.index')}}" class="btn btn-light ">Back To View Script</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('pameran.update', $data->id) }}" method="post">
              @csrf
              @method('PUT')

              <div class="modal-body">

                  <!-- Chosen Script (Select Dropdown) -->
                  <div class="mt-2">
                      <label for="script">Chosen script [Pilih Naskah]</label>
                      <select name="script" id="script" class="form-control" required>
                          <option value="">Please select a script</option>
                          <option value="Sidang Pemecahan Roti" {{ $data->script == 'Sidang Pemecahan Roti' ? 'selected' : '' }}>Sidang Pemecahan Roti</option>
                          <option value="Exhibition" {{ $data->script == 'Exhibition' ? 'selected' : '' }}>Exhibition</option>
                      </select>
                  </div>

                  <!-- Topic (Text Input) -->
                  <div class="mt-2">
                      <label for="topic">Topic [Judul]</label>
                      <input type="text" class="form-control" required name="topic" value="{{ old('topic', $data->Topic) }}" placeholder="Example [Pengalaman Hayat]">
                  </div>

                  <!-- Bible Verse (Textarea) -->
                  <div class="mt-2">
                      <label for="verse">Bible Verse [Ayat Alkitab]</label>
                      <textarea name="verse" cols="4" rows="4" required placeholder="Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!]" class="form-control">{{ old('verse', $data->verse) }}</textarea>
                  </div>

                  <!-- Truth (Textarea) -->
                  <div class="mt-2">
                      <label for="Truth">Truth [Kebenaran]</label>
                      <textarea name="Truth" cols="4" rows="4" required placeholder="Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!]" class="form-control">{{ old('Truth', $data->Truth) }}</textarea>
                  </div>

                  <!-- Experience (Textarea) -->
                  <div class="mt-2">
                      <label for="Experience">Experience [Pengalaman]</label>
                      <textarea name="Experience" cols="4" rows="4" required placeholder="Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!]" class="form-control">{{ old('Experience', $data->Experience) }}</textarea>
                  </div>

              </div>

              <!-- Modal Footer -->
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
