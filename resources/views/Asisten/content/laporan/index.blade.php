@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report | {{$ambil_trainee->name}}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
    <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('htrainee.asisten') }}" class="btn text-light mb-1 bg-dark">Back To View Trainee</a>
          </div>
          <!-- /.card-header -->

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-sm">
                <thead class="text-center">
                  <tr style="background-color: #EEEEEE;">
                    <th colspan="4" class="font-weight-bold">
                      <br>
                      <h2>WEEKLY JOURNAL REPORT</h2>
                      JERRI CHRISTIAN GEDEON TUNGGA <br> SEMESTER 1 & WEEK 1
                    </th>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <th>Minimum score</th>
                    <th>Score</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <tr>
                    <td>Bible Reading</td>
                    <td>{{$standart_poin->bible}}</td>
                    <td>{{$ambil_report->bible}}</td>
                    <td 
                      @if($standart_poin->bible <= $ambil_report->bible)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->bible <= $ambil_report->bible)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Memorized Verses</td>
                    <td>{{$standart_poin->memorizing_bible}}</td>
                    <td>{{$ambil_report->memorizing}}</td>
                    <td 
                      @if($standart_poin->memorizing_bible <= $ambil_report->memorizing)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->memorizing_bible <= $ambil_report->memorizing)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Hymns</td>
                    <td>{{$standart_poin->hymns}}</td>
                    <td>{{$ambil_report->hymns}}</td>
                    <td 
                      @if($standart_poin->hymns <= $ambil_report->hymns)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->hymns <= $ambil_report->hymns)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>5 Time Prayer</td>
                    <td>{{$standart_poin->five_times_prayer}}</td>
                    <td>{{$ambil_report->prayer_5_time}}</td>
                    <td 
                      @if($standart_poin->five_times_prayer <= $ambil_report->prayer_5_time)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->five_times_prayer <= $ambil_report->prayer_5_time)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Personal Goals</td>
                    <td>{{$standart_poin->personal_goals}}</td>
                    <td>{{$ambil_report->p_goals}}</td>
                    <td 
                      @if($standart_poin->personal_goals <= $ambil_report->p_goals)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->personal_goals <= $ambil_report->p_goals)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Good Land</td>
                    <td>{{$standart_poin->good_land}}</td>
                    <td>{{$ambil_report->tp}}</td>
                    <td 
                      @if($standart_poin->good_land <= $ambil_report->tp)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->good_land <= $ambil_report->tp)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Prayer Book</td>
                    <td>{{$standart_poin->prayer_book}}</td>
                    <td>{{$ambil_report->doa}}</td>
                    <td 
                      @if($standart_poin->prayer_book <= $ambil_report->doa)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->prayer_book <= $ambil_report->doa)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Summary Of Ministry</td>
                    <td>{{$standart_poin->summary_of_ministry}}</td>
                    <td>{{$ambil_report->ministry}}</td>
                    <td 
                      @if($standart_poin->summary_of_ministry <= $ambil_report->ministry)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->summary_of_ministry <= $ambil_report->ministry)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Fellowship</td>
                    <td>{{$standart_poin->fellowship}}</td>
                    <td>{{$ambil_report->fellowship}}</td>
                    <td 
                      @if($standart_poin->fellowship <= $ambil_report->fellowship)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->fellowship <= $ambil_report->fellowship)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Script Ts & Exhibition</td>
                    <td>{{$standart_poin->script_ts_exhibition}}</td>
                    <td>{{$ambil_report->ts}}</td>
                    <td 
                      @if($standart_poin->script_ts_exhibition <= $ambil_report->ts)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->script_ts_exhibition <= $ambil_report->ts)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Agenda</td>
                    <td>{{$standart_poin->agenda}}</td>
                    <td>{{$ambil_report->agenda}}</td>
                    <td 
                      @if($standart_poin->agenda <= $ambil_report->agenda)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->agenda <= $ambil_report->agenda)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td>Finance</td>
                    <td>{{$standart_poin->finance}}</td>
                    <td>{{$ambil_report->finance}}</td>
                    <td 
                      @if($standart_poin->finance <= $ambil_report->finance)
                        style="background-color: green; color: white;"
                      @else
                        style="background-color: red; color: white;"
                      @endif>
                      @if($standart_poin->finance <= $ambil_report->finance)
                        Completed
                      @else
                        Incomplete
                      @endif
                    </td>
                  </tr>

                  <tr>
                    <td colspan="4" class="text-left">
                      <span class="badge badge-warning">Catatan</span> <br>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                        Add a note
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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


   <style>
/* Memperkecil ukuran tabel */
.table {
    font-size: 1rem; /* Ukuran font standar yang nyaman dibaca di layar laptop */
}

.table th, .table td {
    padding: 8px 12px; /* Padding yang lebih besar untuk tampilan di laptop */
}

.table th {
    background-color: #f5f5f5; /* Memberikan latar belakang header yang lembut */
    font-size: 1.1rem; /* Ukuran font header sedikit lebih besar */
}

.table tbody tr:hover {
    background-color: #f2f2f2; /* Efek hover pada baris tabel */
}

/* Membuat tabel responsif di layar laptop */
@media (max-width: 1024px) {
    .table {
        font-size: 0.9rem;  /* Mengurangi ukuran font untuk menyesuaikan dengan layar yang lebih kecil */
    }

    .table th, .table td {
        padding: 8px 10px; /* Padding lebih kecil agar tabel lebih kompak */
    }
}

/* Untuk layar yang lebih besar (desktop) */
@media (min-width: 1025px) {
    .table {
        font-size: 1rem;  /* Ukuran font normal di desktop */
    }
}

/* Membuat tabel lebih kompak di perangkat dengan lebar lebih kecil (mobile dan tablet) */
@media (max-width: 767px) {
    .table-responsive {
        overflow-x: auto;
    }
    .table {
        font-size: 0.8rem;  /* Ukuran font lebih kecil untuk perangkat mobile */
    }

    .table th, .table td {
        padding: 6px;  /* Padding lebih kecil di perangkat mobile */
    }
}


   </style>
@endsection
