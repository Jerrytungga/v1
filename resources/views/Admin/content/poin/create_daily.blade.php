@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-uppercase">form input point daily</h1>
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
          <div class="card-header" style="background-color: #6A9C89;">
            <a href="{{ route('poin.index') }}" class="btn text-light bg-dark">Back To View Target Points</a>
          </div>
          <!-- /.card-header --> 
          <div class="card-body">
            <form action="{{ route('report.inputdaily') }}" method="post">
              @csrf
              <div class="modal-body">
                
                <!-- Semester Field -->
                <div class="form-group row">
                  <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                  <div class="col-sm-10">
                    <select name="semester" id="semester" required class="form-control">
                      <option value="">Select Semester</option>
                      <option value="1">Semester 1</option>
                      <option value="2">Semester 2</option>
                      <option value="3">Semester 3</option>
                      <option value="4">Semester 4</option>       
                    </select>
                    @error('semester')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Bible Field -->
                <div class="form-group row">
                  <label for="bible" class="col-sm-2 col-form-label">Bible</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="bible" name="bible" required placeholder="Enter Poin Bible">
                    @error('bible')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Memorizing Bible Field -->
                <div class="form-group row">
                  <label for="Memorizing" class="col-sm-2 col-form-label">Memorizing Bible</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="Memorizing" name="Memorizing" required placeholder="Enter Poin Memorizing Bible">
                    @error('Memorizing')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Hymns Field -->
                <div class="form-group row">
                  <label for="Hymns" class="col-sm-2 col-form-label">Hymns</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="Hymns" name="Hymns" required placeholder="Enter Poin Hymns">
                    @error('Hymns')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- 5 Times Prayer Field -->
                <div class="form-group row">
                  <label for="TimesPrayer" class="col-sm-2 col-form-label">5 Times Prayer</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="TimesPrayer" name="TimesPrayer" required placeholder="Enter Poin 5 Times Prayer">
                    @error('TimesPrayer')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Personal Goals Field -->
                <div class="form-group row">
                  <label for="pgoals" class="col-sm-2 col-form-label">Personal Goals</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="pgoals" name="pgoals" required placeholder="Enter Poin Personal Goals">
                    @error('pgoals')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Good Land Field -->
                <div class="form-group row">
                  <label for="tp" class="col-sm-2 col-form-label">Good Land</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="tp" name="tp" required placeholder="Enter Poin Good Land">
                    @error('tp')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Prayer Book Field -->
                <div class="form-group row">
                  <label for="bprayer" class="col-sm-2 col-form-label">Prayer Book</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="bprayer" name="bprayer" required placeholder="Enter Poin Prayer Book">
                    @error('bprayer')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Summary of Ministry Field -->
                <div class="form-group row">
                  <label for="sministry" class="col-sm-2 col-form-label">Summary Of Ministry</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="sministry" name="sministry" required placeholder="Enter Poin Summary Of Ministry">
                    @error('sministry')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Fellowship Field -->
                <div class="form-group row">
                  <label for="fellowship" class="col-sm-2 col-form-label">Fellowship</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="fellowship" name="fellowship" required placeholder="Enter Poin Fellowship">
                    @error('fellowship')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Script Ts & Exhibition Field -->
                <div class="form-group row">
                  <label for="script" class="col-sm-2 col-form-label">Script Ts & Exhibition</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="script" name="script" required placeholder="Enter Poin Script Ts & Exhibition">
                    @error('script')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Agenda Field -->
                <div class="form-group row">
                  <label for="agenda" class="col-sm-2 col-form-label">Agenda</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="agenda" name="agenda" required placeholder="Enter Poin Agenda">
                    @error('agenda')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Financial Field -->
                <div class="form-group row">
                  <label for="keuangan" class="col-sm-2 col-form-label">Finance</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="keuangan" name="keuangan" required placeholder="Enter Poin Finance">
                    @error('keuangan')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

              </div>

              <!-- Submit Button -->
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