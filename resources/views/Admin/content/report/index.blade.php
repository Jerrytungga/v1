@extends('Admin.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>REPORT JOURNAL TRAINEE</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->
  <style>
  /* Gaya untuk tabel */
  table {
    width: 100%;  /* Pastikan tabel memanfaatkan lebar penuh */
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  /* Gaya untuk header tabel yang tetap */
  th {
    background-color: #C4DAD2;
    color: black;
    padding: 12px;
    text-align: left;
    position: sticky;      /* Membuat header tetap */
    top: 0;                /* Menempatkan header di atas */
    z-index: 1;            /* Agar header tetap di atas konten tabel */
  }

  /* Gaya untuk cell tabel */
  td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
  }

  /* Gaya untuk baris genap (untuk efek zebra) */
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Gaya untuk baris saat dihover */
  tr:hover {
    background-color: #ddd;
  }

  /* Gaya untuk tabel ketika ada border */
  table, th, td {
    border: 1px solid #ddd;
  }

  /* Menambahkan scroll pada tabel */
  .table-responsive {
    overflow-x: auto;   /* Scroll horizontal */
    overflow-y: auto;   /* Scroll vertikal */
    max-height: 400px;   /* Batas tinggi tabel yang membuat scroll vertikal */
    margin-bottom: 20px; /* Spasi di bawah tabel */
  }
</style>


  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <a href="{{ route('trainee.create') }}" class="btn btn-success">Input Trainee</a>
            </div>
        
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
              <thead class="text-center font-weight-bold" style="background-color: #C4DAD2;">
      <tr>
        <th rowspan="2">Nama</th>
        <th colspan="2">Jurnal</th>
        <th colspan="2">Keterangan</th>
      </tr>
      <tr>
        <th>Item</th>
        <th>Poin</th>
        <th>Target Poin</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    @foreach($report as $data)
      <tr>
        <td rowspan="12">
            Andi <br> <span class="badge badge-info">Batch 1 </span> <span class="badge badge-warning">Semester 1</span>
            <span class="badge badge-warning">Asisten : Elohim</span>
         
        </td>
        {{ $alkitab = '15' }}
        <td style="background-color: {{ $data->bible >= $alkitab ? 'green' : 'red' }}; color: white;">Bible Reading</td>
            <td style="background-color: {{ $data->bible >= $alkitab ? 'green' : 'red' }}; color: white;">{{ $data->bible }}</td>
            <td style="background-color: {{ $data->bible >= $alkitab ? 'green' : 'red' }}; color: white;">{{ $alkitab }}</td>
            <td style="background-color: {{ $data->bible >= $alkitab ? 'green' : 'red' }}; color: white;">
                @if($data->bible >= $alkitab)
                Complete
                @else
                Incomplete
                @endif
    </td>
      </tr>
      <tr>
        <td>Memorizing Verses</td>
        <td>{{ $data->memorizing }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Hymns</td>
        <td>{{ $data->hymns }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>5 Times Prayer</td>
        <td>{{ $data->prayer_5_time }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Personal Goals</td>
        <td>{{ $data->p_goals }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Good Land</td>
        <td>{{ $data->tp }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Prayer Book</td>
        <td>{{ $data->doa }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Summary Of Ministry</td>
        <td>{{ $data->ministry }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Fellowship</td>
        <td>{{ $data->fellowship }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Script Ts & Exhibition</td>
        <td>{{ $data->ts }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Agenda</td>
        <td>{{ $data->agenda }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td>Financial Statements</td>
        <td>{{ $data->finance }}</td>
        <td>100</td>
        <td>Lengkap</td>
      </tr>
      <tr>
        <td colspan="5"><span class="badge badge-primary">Note</span></td>
      </tr>

      @endforeach
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
   


@endsection
