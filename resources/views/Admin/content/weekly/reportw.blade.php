@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase">settings to display weekly report in trainee</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
  <div class=" ml-3 card text-white mb-3" style="max-width: 18rem;">
  <div class="card-header"  style="background-color: #6A9C89;">Display</div>
  <div class="card-body text-danger">
  <form action="{{ route('set') }}"  method="post">
  @csrf
  <div>
        <label for="Day">DAY :</label>
       <select name="hari" class="form-control">
        <option value="{{$viewreport->setting_name}}">{{$viewreport->setting_name}}</option>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
        <option value="Sabtu">Sabtu</option>
        <option value="Minggu">Minggu</option>
       </select>
    </div>

    <div>
     <input type="time" value="{{$viewreport->input_time}}" name="waktu" class="form-control mt-1">
    </div>
    <button type="submit" class="btn btn-success mt-1">Set</button>
    </form>
  </div>
</div>
  

@endsection