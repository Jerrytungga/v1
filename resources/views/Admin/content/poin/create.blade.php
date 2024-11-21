@extends('Admin.layout.main')
@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="text-uppercase">form input point achievement standard</h1>
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
            <div class="card-header" style="
            background-color: #6A9C89;">
           <a href="{{ route('poin.index') }}" class="btn text-light bg-dark ">Back To View Point Achievement Standard</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('poin.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Name Field -->
                        <div class="form-group row">
                            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                            <select name="semester" id="" required class="form-control">
                              <option value="">Select Semester</option>
                              <option value="1">Semester 1</option>
                              <option value="2">Semester 2</option>
                              <option value="3">Semester 3</option>
                              <option value="4">Semester 4</option>       
                            </select>
                            </div>
                        </div>
                        

                        <!-- Bible Field -->
                        <div class="form-group row">
                            <label for="bible" class="col-sm-2 col-form-label">Bible</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="bible" name="bible" required placeholder="Enter Poin Bible">
                            </div>
                        </div>
                        <!-- memorizing bible Field -->
                        <div class="form-group row">
                            <label for="Memorizing" class="col-sm-2 col-form-label">Memorizing Bible</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="Memorizing" name="Memorizing" required placeholder="Enter Poin Memorizing Bible">
                            </div>
                        </div>
                        <!-- hymns bible Field -->
                        <div class="form-group row">
                            <label for="Hymns" class="col-sm-2 col-form-label">Hymns</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="Hymns" name="Hymns" required placeholder="Enter Poin Hymns">
                            </div>
                        </div>
                        <!-- 5 times prayer bible Field -->
                        <div class="form-group row">
                            <label for="5 times prayer" class="col-sm-2 col-form-label">5 Times Prayer</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="TimesPrayer" name="TimesPrayer" required placeholder="Enter Poin 5 Times Prayer">
                            </div>
                        </div>
                        <!-- personal goals Field -->
                        <div class="form-group row">
                            <label for="personal goals" class="col-sm-2 col-form-label">Personal Goals</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="pgoals" name="pgoals" required placeholder="Enter Poin Personal Goals">
                            </div>
                        </div>
                        <!-- Good land Field -->
                        <div class="form-group row">
                            <label for="Good Land" class="col-sm-2 col-form-label">Good Land</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="tp" name="tp" required placeholder="Enter Poin Good Land">
                            </div>
                        </div>
                        <!-- prayer book Field -->
                        <div class="form-group row">
                            <label for="Prayer Book" class="col-sm-2 col-form-label">Prayer Book</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="bprayer" name="bprayer" required placeholder="Enter Poin Prayer Book">
                            </div>
                        </div>
                        <!-- summary of ministri Field -->
                        <div class="form-group row">
                            <label for="Summary Of Ministri" class="col-sm-2 col-form-label">Summary Of Ministy</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="sministry" name="sministry" required placeholder="Enter Poin Summary Of Ministy">
                            </div>
                        </div>
                        <!-- fellowship Field -->
                        <div class="form-group row">
                            <label for="fellowship" class="col-sm-2 col-form-label">Fellowship</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="fellowship" name="fellowship" required placeholder="Enter Poin fellowship">
                            </div>
                        </div>
                        <!-- script Field -->
                        <div class="form-group row">
                            <label for="script" class="col-sm-2 col-form-label">Script Ts & Exhibition</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="script" name="script" required placeholder="Enter Poin Script Ts & Exhibition">
                            </div>
                        </div>
                        <!-- Agenda Field -->
                        <div class="form-group row">
                            <label for="agenda" class="col-sm-2 col-form-label">Agenda</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="agenda" name="agenda" required placeholder="Enter Poin Agenda">
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