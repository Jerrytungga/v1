@extends('Trainee.layout.main')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Input Financial</h1>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header bg-primary">
            <a href="{{ route('keuangan.index') }}" class="btn text-light bg-dark">Back To View Financial</a>
          </div>

          <!-- Card Body -->
          <div class="card-body">
            <form action="{{ route('keuangan.store') }}" method="post">
              @csrf
              <div class="modal-body">
                <!-- Hidden fields for asisten and nip -->
                <input type="hidden" name="asisten" value="{{ $id_asisten }}">
                <input type="hidden" name="nip" value="{{ $nipTrainee }}">

                <div class="form-group">
                  <label for="agenda">Description [Keterangan]</label>
                  <input type="text" required class="form-control" name="keterangan">
                </div>
                <div class="form-group mt-2">
                  <label for="agenda">Debit [Pemasukan]</label>
                  <input type="text" class="form-control rupiah" name="Pemasukan" onkeyup="formatCurrency(this)" >
                </div>
                <div class="form-group mt-2">
                  <label for="agenda">Credit [Pengeluaran]</label>
                  <input type="text" class="form-control rupiah" name="pengeluaran" onkeyup="formatCurrency(this)">
                </div>
              </div>

              <!-- Form footer with Save button -->
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

<script>
  // Function to format the input as Rupiah currency
  function formatCurrency(input) {
    let value = input.value;

    // Remove all non-numeric characters except for the decimal point
    value = value.replace(/[^0-9]/g, '');

    // Format the number with commas for thousands
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Add the "Rp" prefix
    input.value = 'Rp ' + value;
  }

  // Function to remove 'Rp' and commas when submitting the form
  document.querySelector("form").addEventListener("submit", function(event) {
    var pemasukan = document.querySelector('input[name="Pemasukan"]');
    var pengeluaran = document.querySelector('input[name="pengeluaran"]');

    // Remove "Rp" and commas before submitting the value to the server
    pemasukan.value = pemasukan.value.replace(/[^0-9]/g, '');
    pengeluaran.value = pengeluaran.value.replace(/[^0-9]/g, '');
  });
</script>
@endsection
