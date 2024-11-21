@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-uppercase">form edit point achievement standard</h1>
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
              <a href="{{ route('poin.index') }}" class="btn text-light bg-dark">Back To View Point Achievement Standard</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('poin.update', $poinjurnal->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Semester Field -->
                        <div class="form-group row">
                            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                            <select name="semester" id="" disabled  class="form-control">
                              <option value="">Select Semester</option>
                              <option value="1" {{ $poinjurnal->semester == 1 ? 'selected' : '' }}>Semester 1</option>
                              <option value="2" {{ $poinjurnal->semester == 2 ? 'selected' : '' }}>Semester 2</option>
                              <option value="3" {{ $poinjurnal->semester == 3 ? 'selected' : '' }}>Semester 3</option>
                              <option value="4" {{ $poinjurnal->semester == 4 ? 'selected' : '' }}>Semester 4</option>       
                            </select>
                            </div>
                        </div>
                        

                        <!-- Bible Field -->
                        <div class="form-group row">
                            <label for="bible" class="col-sm-2 col-form-label">Bible</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="bible" name="bible" value="{{ old('bible', $poinjurnal->bible) }}" required placeholder="Enter Poin Bible">
                            </div>
                        </div>
                        
                        <!-- Memorizing Bible Field -->
                        <div class="form-group row">
                            <label for="Memorizing" class="col-sm-2 col-form-label">Memorizing Bible</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="Memorizing" name="Memorizing" value="{{ old('Memorizing', $poinjurnal->memorizing_bible) }}" required placeholder="Enter Poin Memorizing Bible">
                            </div>
                        </div>
                        
                        <!-- Hymns Field -->
                        <div class="form-group row">
                            <label for="Hymns" class="col-sm-2 col-form-label">Hymns</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="Hymns" name="Hymns" value="{{ old('Hymns', $poinjurnal->hymns) }}" required placeholder="Enter Poin Hymns">
                            </div>
                        </div>
                        
                        <!-- 5 Times Prayer Field -->
                        <div class="form-group row">
                            <label for="TimesPrayer" class="col-sm-2 col-form-label">5 Times Prayer</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="TimesPrayer" name="TimesPrayer" value="{{ old('TimesPrayer', $poinjurnal->five_times_prayer) }}" required placeholder="Enter Poin 5 Times Prayer">
                            </div>
                        </div>
                        
                        <!-- Personal Goals Field -->
                        <div class="form-group row">
                            <label for="pgoals" class="col-sm-2 col-form-label">Personal Goals</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="pgoals" name="pgoals" value="{{ old('pgoals', $poinjurnal->personal_goals) }}" required placeholder="Enter Poin Personal Goals">
                            </div>
                        </div>
                        
                        <!-- Good Land Field -->
                        <div class="form-group row">
                            <label for="tp" class="col-sm-2 col-form-label">Good Land</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="tp" name="tp" value="{{ old('tp', $poinjurnal->good_land) }}" required placeholder="Enter Poin Good Land">
                            </div>
                        </div>
                        
                        <!-- Prayer Book Field -->
                        <div class="form-group row">
                            <label for="bprayer" class="col-sm-2 col-form-label">Prayer Book</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="bprayer" name="bprayer" value="{{ old('bprayer', $poinjurnal->prayer_book) }}" required placeholder="Enter Poin Prayer Book">
                            </div>
                        </div>
                        
                        <!-- Summary of Ministry Field -->
                        <div class="form-group row">
                            <label for="sministry" class="col-sm-2 col-form-label">Summary Of Ministry</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="sministry" name="sministry" value="{{ old('sministry', $poinjurnal->summary_of_ministry) }}" required placeholder="Enter Poin Summary Of Ministry">
                            </div>
                        </div>
                        
                        <!-- Fellowship Field -->
                        <div class="form-group row">
                            <label for="fellowship" class="col-sm-2 col-form-label">Fellowship</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="fellowship" name="fellowship" value="{{ old('fellowship', $poinjurnal->fellowship) }}" required placeholder="Enter Poin Fellowship">
                            </div>
                        </div>
                        
                        <!-- Script Field -->
                        <div class="form-group row">
                            <label for="script" class="col-sm-2 col-form-label">Script Ts & Exhibition</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="script" name="script" value="{{ old('script', $poinjurnal->script_ts_exhibition) }}" required placeholder="Enter Poin Script Ts & Exhibition">
                            </div>
                        </div>
                        
                        <!-- Agenda Field -->
                        <div class="form-group row">
                            <label for="agenda" class="col-sm-2 col-form-label">Agenda</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="agenda" name="agenda" value="{{ old('agenda', $poinjurnal->agenda) }}" required placeholder="Enter Poin Agenda">
                            </div>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
