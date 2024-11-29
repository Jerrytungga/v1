@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Financial Statements</h1>
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
          <div class="card-header">
          
            <form action="{{ route('keuangan.week') }}" method="POST">
              @csrf
              <div class="form-inline flex-wrap">
                <label for="semester" class="mr-2 ml-2">Chosen Semester & Week :</label>

                <!-- Semester Dropdown -->
                <select class="form-control col-12 col-md-2 mr-2 mb-2 bg-primary" required id="semester" name="semester">
                  <option value="">Please select a semester</option>
                  @foreach([1 => 'Semester 1', 2 => 'Semester 2', 3 => 'Semester 3', 4 => 'Semester 4'] as $value => $label)
                    <option value="{{ $value }}" {{ old('semester') == $value ? 'selected' : '' }}>{{ $label }}</option>
                  @endforeach
                </select>

                <!-- Week Dropdown -->
                <select name="week" class="form-control col-12 col-md-2 mr-2 mb-2 ml-md-2 bg-primary" required>
                <option value="">Please select a week</option>
                  @foreach ($weekly as $data)
                    <option value="{{ $data->Week }}">{{ $data->Week }}</option>
                  @endforeach
                </select>

                <!-- Submit and Reset Buttons -->
                <button type="submit" class="btn btn-primary col-12 mr-2 col-md-auto mb-2">View</button>
                <a href="{{ route('keuangan.index') }}" class="btn btn-danger col-12 col-md-auto mb-2">Reset</a>
              </div>
            </form>

            <!-- Button untuk Input Agenda -->
            <a href="{{ route('keuangan.create') }}" class="btn btn-success ml-2">Input Financial</a>
            @if (!empty($smt))
              <div class="alert m-2 alert-warning alert-dismissible fade show" role="alert">
              <strong>Semester {{$smt}} & {{$week}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>

          <!-- Card Body -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead class="text-center font-weight-bold bg-primary">
                <tr>
                <th class="col-1">Date</th>
                <th class="col-3">Description</th>
                <th class="col-1">Debit</th>
                <th class="col-1">Credit</th>
                <th class="col-1">Balance</th>
                <th class="col-1">Action</th>
              </thead>
              <tbody>
              @foreach($entrys as $data)
             <tr>
               <td>{{ $data->created_at }}</td>
               <td>{{ $data->keterangan }}
               @if (!empty($data->catatan))
                <blockquote class="blockquote" style="background-color: #FFF5E4;">
                <p class="mb-0 text-danger">{{ $data->catatan }}</p>
                <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                </blockquote>
                @endif
               </td>
               <td>Rp {{ number_format($data->debit, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($data->credit, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($data->saldo, 0, ',', '.') }}</td>
               <td>
               @if($data && \Carbon\Carbon::parse($data->created_at)->isToday())
                            <a href="{{ route('keuangan.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                @endif
               </td>
             </tr>
             @endforeach
              </tbody>
              <tfoot class="bg-info">
              <tr>
                <td colspan="2" class="text-right"><strong>Total</strong></td>
                <td>Rp {{ number_format($entrys->sum('debit'), 0, ',', '.') }}</td>
                <td>Rp {{ number_format($entrys->sum('credit'), 0, ',', '.') }}</td>
                <td>Rp 
                  @if($entrys->isNotEmpty()) 
                    {{ number_format($entrys->last()->saldo, 0, ',', '.') }}
                  @else
                    {{ number_format(0, 0, ',', '.') }}
                  @endif
                </td>
                <td>
               
                </td>
              </tr>
            </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  
@if ($noDataMessage)
            <script>
            Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $noDataMessage }}"
          });
            </script>
        @endif

@endsection
