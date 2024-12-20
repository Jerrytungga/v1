@extends('Asisten.layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Trainees</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div id="selectedCount" class="mb-3" style="font-size: 18px; color:red; font-weight: bold;">
                                Total Selected: <span id="totalSelected">0</span>
                            </div>
                        </div>

                        <div class="card-body">
                        <div class="table-responsive">
                                <table id="interactiveTable" class="table table-bordered table-hover">
                                    <thead class="text-center" style="background-color: #4A4947; color:#ffffff;">
                                        <tr>
                                            <th style="width: 5%;">Select</th>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Batch</th>
                                            <th>Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trainee as $index => $data)
                                        <tr>
                                            <td><input type="checkbox" class="select-row" data-id="{{ $data->id }}"></td>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->batch }}</td>
                                            <td>{{ $data->semester }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Submit Button to Send Data -->
                            <button id="submitSelection" class="btn btn-primary">Submit Selections</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Include jQuery and DataTables scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net@1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net-responsive@2.3.0/js/dataTables.responsive.min.js"></script>

<script>
 $(document).ready(function() {
  // Initialize DataTable
  $('#interactiveTable').DataTable();

  // Update the count of selected rows
  function updateSelectedCount() {
    var selectedCount = $('#interactiveTable tbody input[type="checkbox"]:checked').length;
    $('#totalSelected').text(selectedCount);
  }

  // Select/Deselect all checkboxes
  $('#interactiveTable thead input[type="checkbox"]').on('click', function() {
    var checked = $(this).prop('checked');
    $('#interactiveTable tbody input[type="checkbox"]').prop('checked', checked);
    updateSelectedCount();
  });

  // Handle individual checkbox selection
  $('#interactiveTable tbody').on('change', 'input[type="checkbox"]', function() {
    var row = $(this).closest('tr');
    row.toggleClass('selected', this.checked);
    updateSelectedCount();
  });

  // Submit the selected data to the server
  $('#submitSelection').on('click', function() {
    var selectedRows = [];
    
    $('#interactiveTable tbody input[type="checkbox"]:checked').each(function() {
      var rowId = $(this).data('id');
      selectedRows.push({ id: rowId });
    });
    
    // Send selected data to the server using AJAX
    $.ajax({
      url: '/update-selected',  // Replace with the correct backend URL
      method: 'POST',
      data: {
        _token: '{{ csrf_token() }}',  // CSRF token for security
        selectedRows: selectedRows
      },
      success: function(response) {
        // Highlight the successfully updated rows
        $('#interactiveTable tbody input[type="checkbox"]:checked').each(function() {
          var row = $(this).closest('tr');
          row.css('background-color', 'lightgreen');  // Add green color to the row
          row.find('td').css('color', '#000');  // Ensure text color is readable
        });

        // Show a success message
        Swal.fire({
          icon: 'success',
          title: 'Data successfully sent!',
          text: 'The selected data has been successfully processed.',
          showConfirmButton: true,
        });
      },
      error: function(xhr, status, error) {
        Swal.fire({
          icon: 'error',
          title: 'An error occurred',
          text: 'An error occurred while sending data. Please try again.',
          showConfirmButton: true,
        });
      }
    });
  });

  // Update the count of selected rows when the page loads
  updateSelectedCount();
});

</script>


@endsection
