@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Script</h1>
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
           <a href="{{route('pameran.index')}}" class="btn text-light bg-dark ">Back To View Script</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{route('pameran.store')}}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
                  <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
                  <div class="mt-2">
                    <label for="Naskah">Chosen script [Pilih Naskah]</label>
                    <select name="script" id="" class="form-control" required>
                    <option value="">Please select a script</option>
                    <option value="Sidang Pemecahan Roti">Sidang Pemecahan Roti</option>
                    <option value="Exhibition">Exhibition</option>
                    </select>
                  </div>
                  <div class="mt-2">
                    <label for="topic">Topic [Judul]</label>
                    <input type="text" class="form-control" required name="topic" placeholder="Example [Pengalaman Hayat]">
                  </div>
            
                  <div class="mt-2">
                    <label for="verse">Bible Verse [Ayat Alkitab]</label>
                    <textarea name="verse" cols="4" rows="4" required placeholder=" Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!] " class="form-control"></textarea>
                  </div>
                  <div class="mt-2">
                    <label for="truth">Truth [Kebenaran]</label>
                    <textarea name="Truth" cols="4" rows="4" required placeholder=" Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!] " class="form-control"></textarea>
                  </div>
                  <div class="mt-2">
                    <label for="Experience">Experience [Pengalaman]</label>
                    <textarea name="Experience" cols="4" rows="4" required placeholder=" Example [Mulia bagi Tuhan! Alam s'mesta bers'ru, Puji Tuhan!] " class="form-control"></textarea>
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
