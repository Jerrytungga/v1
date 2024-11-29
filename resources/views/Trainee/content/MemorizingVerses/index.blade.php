@extends('Trainee.layout.main')
@section('content')

     <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Memorizing Verses</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <a href="{{ route('MemorizingVerses.create') }}" class="btn btn-success">Input Memorizing Verses</a>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center bg-primary font-weight-bold">
                     <tr>
                        <td>Date</td>
                        <td>Bible</td>
                        <td>Partner</td>
                        <td>Action</td>
                     </tr>
                  </thead>
                  <tbody>
                  @foreach($entrys as $memorizingverses)
                  <tr>
                  <td>{{ $memorizingverses->created_at }}</td>
                  <td>{{ $memorizingverses->bible }}
                  @if (!empty($memorizingverses->catatan))
                    <blockquote class="blockquote" style="background-color: #FFF5E4;">
                    <p class="mb-0 text-danger">{{ $memorizingverses->catatan }}</p>
                     <footer class="blockquote-footer">Asisten {{ $name_asisten }}</footer>
                    </blockquote>
                    @endif
                  </td>
                  <td>
                  @php
                   $trainee = \App\Models\Trainee::where('nip', $memorizingverses->paraf)->first();
                  @endphp
                  {{ $trainee ? $trainee->name : 'No trainee' }}
                  </td>
                  <td>
                  @if($memorizingverses && \Carbon\Carbon::parse($memorizingverses->created_at)->isToday())
                            <a href="{{ route('MemorizingVerses.edit', $memorizingverses->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                  </td>
                    
                  </tr>
                  @endforeach
                  </tbody>
                </table>
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
