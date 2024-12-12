@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report of Trainees Who Haven't Completed the Journal</h1>
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
                <form action="{{ route('HaventCompletedtheJournal_week') }}" method="POST">
                  @csrf
                  <div class="form-inline">
                    <label for="semester" class="mr-2 ml-2">Chosen Week :</label>
                    <select class="form-control ml-2 col-12 col-sm-4 col-md-2" style="background-color:#001F3F; color:#FFF;" id="chosenWeek" name="week">
                    <option value="">Please select a week</option>
                    @foreach ($weeklydropdown as $data)
                    <option value="{{ $data->Week }}">{{ $data->Week }}</option>
                    @endforeach
                    </select>
                    <button type="submit" class="btn ml-2" style="background-color:#001F3F; color:#FFFf;">View</button>
                    <a href="{{ route('HaventCompletedtheJournal') }}" class="btn btn-danger ml-2">Reset</a>
                  </div>
                </form>
              </div>
          
            
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead class="text-center" style="background-color: #4A4947; color:#ffff;">
                                    <tr>
                                        <th class="col-no">No</th>
                                        <th class="col-trainee">Trainee</th>
                                        <th class="col-bible">Bible</th>
                                        <th class="col-memorizing">Memorizing</th>
                                        <th class="col-hymns">Hymns</th>
                                        <th class="col-prayer">Prayer 5 Time</th>
                                        <th class="col-tp">TP</th>
                                        <th class="col-doa">Doa</th>
                                        <th class="col-pgoals">P.Goals</th>
                                        <th class="col-ministry">Ministry</th>
                                        <th class="col-fellowship">Fellowship</th>
                                        <th class="col-ts">Ts</th>
                                        <th class="col-agenda">Agenda</th>
                                        <th class="col-finance">Finance</th>
                                    </tr>
                                </thead>
                                <tbody>
                             
                                    @foreach($traineeData as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <p class="font-italic">{{ $data['name'] }}</p>
                                                <span class="badge badge-success">BATCH {{ $data['batch'] }}</span>
                                                <span class="badge badge-warning">SEMESTER {{ $data['semester'] }}</span>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['bible'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['bible'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['memorizing'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['memorizing'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['hymns'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['hymns'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['prayer5mnt'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['prayer5mnt'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['tp'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['tp'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['prayer'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['prayer'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['personalgoals'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['personalgoals'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['ministri'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['ministri'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['fellowship'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['fellowship'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['ts'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['ts'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['agenda'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['agenda'] }}
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="{{ $data['keuangan'] == 0 ? 'text-danger' : 'text-success' }}">
                                                    {{ $data['keuangan'] }}
                                                </h2>
                                            </td>
                                        </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div> <!-- /.table-responsive -->
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</section>

<style>
 /* Agar teks di dalam tabel rata tengah (center) */
 h2 {
    text-align: center;
}

/* Atur lebar setiap kolom */
th.col-no,
td.col-no {
    width: 5%;
}

th.col-trainee,
td.col-trainee {
    width: 15%;
}

th.col-bible,
td.col-bible,
th.col-memorizing,
td.col-memorizing,
th.col-hymns,
td.col-hymns,
th.col-prayer,
td.col-prayer,
th.col-tp,
td.col-tp,
th.col-doa,
td.col-doa,
th.col-pgoals,
td.col-pgoals,
th.col-ministry,
td.col-ministry,
th.col-fellowship,
td.col-fellowship,
th.col-ts,
td.col-ts,
th.col-agenda,
td.col-agenda,
th.col-finance,
td.col-finance {
    width: 6%;
}

/* Responsif: menyesuaikan lebar pada perangkat kecil */
@media (max-width: 768px) {
    th, td {
        font-size: 12px; /* Ukuran font lebih kecil */
    }

    th.col-no,
    td.col-no {
        width: 10%;
    }

    th.col-trainee,
    td.col-trainee {
        width: 20%;
    }

    th.col-bible,
    td.col-bible,
    th.col-memorizing,
    td.col-memorizing,
    th.col-hymns,
    td.col-hymns,
    th.col-prayer,
    td.col-prayer,
    th.col-tp,
    td.col-tp,
    th.col-doa,
    td.col-doa,
    th.col-pgoals,
    td.col-pgoals,
    th.col-ministry,
    td.col-ministry,
    th.col-fellowship,
    td.col-fellowship,
    th.col-ts,
    td.col-ts,
    th.col-agenda,
    td.col-agenda,
    th.col-finance,
    td.col-finance {
        width: 8%;
    }

    /* Mengatur tabel agar bisa digulir secara horizontal pada perangkat kecil */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
}

</style>
@endsection
