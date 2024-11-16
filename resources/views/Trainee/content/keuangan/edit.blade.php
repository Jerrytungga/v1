@extends('Trainee.layout.main')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Edit Financial</h1>
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
          <form action="{{ route('keuangan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menyatakan bahwa ini adalah permintaan untuk update data -->

            <div class="modal-body">
              <!-- Hidden fields for asisten and nip, if needed -->
              <div class="form-group">
                <label for="agenda">Description [Keterangan]</label>
                <!-- Mengisi dengan data lama (jika ada) -->
                <input type="text" required class="form-control" name="keterangan" value="{{ old('keterangan', $data->keterangan) }}">
              </div>

              <div class="form-group mt-2">
                <label for="debit">Debit [Pemasukan]</label>
                <!-- Mengisi dengan data lama (jika ada) dan format Rupiah tetap aktif -->
                <input 
                  type="text" 
                  class="form-control rupiah" 
                  name="Pemasukan" 
                  id="debit" 
                  onkeyup="formatCurrency(this)" 
                  value="{{ old('Pemasukan', number_format($data->debit, 0, ',', '.')) }}">
              </div>

              <div class="form-group mt-2">
                <label for="credit">Credit [Pengeluaran]</label>
                <!-- Mengisi dengan data lama (jika ada) dan format Rupiah tetap aktif -->
                <input 
                  type="text" 
                  class="form-control rupiah" 
                  name="pengeluaran" 
                  id="credit" 
                  onkeyup="formatCurrency(this)" 
                  value="{{ old('pengeluaran', number_format($data->credit, 0, ',', '.')) }}">
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
  function formatCurrency(input) {
    // Remove non-numeric characters (except for the commas)
    let value = input.value.replace(/[^0-9]/g, '');

    // Format the number with commas as thousand separators
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    // Set the formatted value back into the input field
    input.value = value;
  }
</script>
@endsection
