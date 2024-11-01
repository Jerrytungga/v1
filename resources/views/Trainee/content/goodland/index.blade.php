@extends('Trainee.layout.main')
@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Good Land</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
  <section class="content">
  <div class="container-fluid">
    <div class="row  justify-content-left">
      <div class="card shadow m-3" style="width: 100%; max-width: 800px; border-radius: 15px;">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
          <div class="d-flex align-items-center">
            <label for="filter-date" class="mr-2 mb-0">Filter Date:</label>
            <input type="date" id="filter-date" name="filter-date" class="form-control mr-3" style="width: auto;">
            <button type="button" class="btn btn-info mr-2">View</button> <!-- Tambahkan kelas mr-2 -->
            <a href="{{route('goodland.create')}}" class="btn btn-light">Input Good Land</a>
            @if($entry)
            <a href="{{route('goodland.edit', $entry->id)}}" class="btn ml-2 btn-warning">Edit Good Land</a>
            @else
              
            @endif
          </div>

        </div>
        @if($entry)
        <div class="card-body">
          <p class="text-muted">Date: <span class="font-weight-bold">{{ $entry->created_at }}</span></p>
          
          <div class="mb-2">
            <h6 class="text-secondary font-weight-bold">Verses:</h6>
            <p class="card-text text-primary font-weight-bold">{{ $entry->verses }}</p>
          </div>
          
          <div class="mb-2">
            <h6 class="text-secondary font-weight-bold">DA:</h6>
            <p class="card-text">{{ $entry->da }}</p>
          </div>
          
          <div class="mb-2">
            <h6 class="text-secondary font-weight-bold">DT:</h6>
            <p class="card-text">{{ $entry->dt }}</p>
          </div>
          
          <div class="mb-2">
            <h6 class="text-secondary font-weight-bold">DS:</h6>
            <p class="card-text">{{ $entry->ds }}</p>
          </div>

          <div class="mb-2">
            <h6 class="text-secondary font-weight-bold">Experience:</h6>
            <div class="d-flex flex-wrap">
              <div class="p-1 w-50">
              @if(!empty($entry->experience_1))
                <div class="card-text">1. <span class="text-muted">({{ $entry->experience_1_time }})</span> {{ $entry->experience_1 }} 
                </div>
                @else
                  <a href="{{route('goodland.inputpengalaman', $entry->id)}}" class="btn btn-primary">Input Experience 1</a>
                @endif
              </div>


              <div class="p-1 w-50">
                  @if(!empty($entry->experience_2))
                      <div class="card-text">
                          2. <span class="text-muted">({{ $entry->experience_2_time }})</span> {{ $entry->experience_2 }}
                      </div>
                  @else
                      <a href="{{route('goodland.experience_2', $entry->id)}}" class="btn btn-primary">Input Experience 2</a>
                  @endif
              </div>

              <div class="p-1 w-50">
                  @if(!empty($entry->experience_3))
                      <div class="card-text text-bold">
                          3. <span class="text-muted">({{ $entry->experience_3_time }})</span> {{ $entry->experience_3 }}
                      </div>
                  @else
                      <a href="{{route('goodland.experience_3', $entry->id)}}" class="btn btn-primary">Input Experience 3</a>
                  @endif
              </div>
              
              <div class="p-1 w-50">
                  @if(!empty($entry->experience_4))
                      <div class="card-text">
                          4. <span class="text-muted">({{ $entry->experience_4_time }})</span> {{ $entry->experience_4 }}
                      </div>
                  @else
                      <a href="{{route('goodland.experience_4', $entry->id)}}" class="btn btn-primary">Input Experience 4</a>
                  @endif
              </div>
              
              <div class="p-1 w-50">
                  @if(!empty($entry->experience_5))
                      <div class="card-text">
                          5. <span class="text-muted">({{ $entry->experience_5_time }})</span> {{ $entry->experience_5 }}
                      </div>
                  @else
                      <a href="{{route('goodland.experience_5', $entry->id)}}" class="btn btn-primary">Input Experience 5</a>
                  @endif
              </div>
              
              <div class="p-1 w-50">
                  @if(!empty($entry->experience_6))
                      <div class="card-text">
                          6. <span class="text-muted">({{ $entry->experience_6_time }})</span> {{ $entry->experience_6 }}
                      </div>
                  @else
                      <a href="{{route('goodland.experience_6', $entry->id)}}" class="btn btn-primary">Input Experience 6</a>
                  @endif
              </div>


            
        
              <div class="p-1 w-100">
                <div class="card-text">Catatan: {{ $entry->catatan }}</div>
              </div>
            </div>
          </div>
          
        </div>
        @else
        <script>
        Swal.fire({
        position: "top-center",
        icon: "error",
        title: "Data is not available, please enter the data.",
        showConfirmButton: false,
        timer: 1500
      });



        </script>
        @endif
      </div>
    </div>
  </div>
</section>




@endsection
