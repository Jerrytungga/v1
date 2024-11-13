@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Prayer Book</h1>
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
           <a href="{{ route('prayerbook.index') }}" class="btn text-light bg-dark ">Back To View Prayer Book</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('prayerbook.store') }}" method="post">
                  @csrf
                  <div class="modal-body">
                  <input type="hidden" name="asisten" value="{{ $id_asisten }}" id="">
                  <input type="hidden" name="nip" value="{{ $nipTrainee }}" id="">
                  <div class="mt-2">
                    <label for="poindoa">Topic [Poin Doa Hari ini]</label>
                    <textarea name="doa" cols="2" rows="2" required placeholder=" Example [Pray for To have a strict schedule for discussing God's Word.] " class="form-control"></textarea>
                  </div>
                  <div class="mt-2">
                    <label for="light">Light [Terang Doa Hari ini] <sub class="text-danger">There must be a scripture reference. | Wajib ada refrensi ayat alkitab.</sub></label>
                    <textarea name="terang" cols="2" rows="2" required placeholder=" Example [I was enlightened through the word of John 1:1 that the Word is God. I realize that I have been lax in my reading of God's Word.] " class="form-control"></textarea>
                  </div>
                  <div class="mt-2">
                    <label for="apresiasi">Appreciation [Apresiasi Doa Hari ini]</label>
                    <textarea name="apresiasi" cols="2" rows="2" required placeholder=" Example [Praise God, the Word is the living person of God.] " class="form-control"></textarea>
                  </div>
                  <div class="mt-2">
                    <label for="Tindakan">Action [Tindakan Doa Hari ini]</label>
                    <textarea name="action" cols="2" rows="2" required placeholder=" Example [Next week, I want to prioritize my Bible reading every morning after my morning revival.] " class="form-control"></textarea>
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