@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Prayer Book</h1>
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
           <a href="{{ route('prayerbook.index') }}" class="btn btn-light ">Back To View Prayer Book</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{route('prayerbook.update', $data->id)}}" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT or PATCH for updates -->
                <div class="modal-body">
                    <!-- Topic -->
                    <div class="mt-2">
                        <label for="doa">Topic [Poin Doa Hari ini]</label>
                        <textarea name="doa" cols="2" rows="2"  placeholder="Example: Pray for a strict schedule for discussing God's Word." class="form-control">{{ old('doa', $data->topic) }}</textarea>
                    </div>

                    <!-- Light -->
                    <div class="mt-2">
                        <label for="terang">Light [Terang Doa Hari ini] <sub class="text-danger">There must be a scripture reference. | Wajib ada refrensi ayat alkitab.</sub></label>
                        <textarea name="terang" cols="2" rows="2"  placeholder="Example: I was enlightened through the word of John 1:1 that the Word is God. I realize that I have been lax in my reading of God's Word." class="form-control">{{ old('terang', $data->light) }}</textarea>
                    </div>

                    <!-- Appreciation -->
                    <div class="mt-2">
                        <label for="apresiasi">Appreciation [Apresiasi Doa Hari ini]</label>
                        <textarea name="apresiasi" cols="2" rows="2"  placeholder="Example: Praise God, the Word is the living person of God." class="form-control">{{ old('apresiasi', $data->appreciation) }}</textarea>
                    </div>

                    <!-- Action -->
                    <div class="mt-2">
                        <label for="action">Action [Tindakan Doa Hari ini]</label>
                        <textarea name="action" cols="2" rows="2"  placeholder="Example: Next week, I want to prioritize my Bible reading every morning after my morning revival." class="form-control">{{ old('action', $data->action) }}</textarea>
                    </div>

                    <div class="mt-2">
                      <label for="action">Prayer Answer [Jawaban Doa]</label>
                      @if(!empty($data->prayer_answer))
                        <textarea name="answer" cols="2" rows="2"  class="form-control">{{ old('answer', $data->prayer_answer) }}</textarea>
                        @else
                        <textarea name="answer" cols="2"  rows="2" disabled  class="form-control">{{ old('answer', $data->prayer_answer) }}</textarea>
                        @endif
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
