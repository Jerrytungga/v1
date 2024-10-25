@extends('Trainee.layout.main')
@section('content')

{{-- alert --}}
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if (session('error'))
<script>
   Swal.fire({
      title: 'Error',
      text: '{{ session('error') }}',
      icon: 'error',
      confirmButtonText: 'OK',
      customClass: {
          confirmButton: 'btn btn-primary' // Ganti dengan kelas Bootstrap yang sesuai
      }
  });
</script>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bible Reading</h1>
          </div>
          
          
        </div>
        <div class="goup" style="text-align: right;">
          <button class="btn btn-outline-success ml-2 text-capitalize">Old Testament</button>
          <button class="btn btn-outline-success ml-2 text-capitalize">New Testament</button>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->

  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Bible reading input
            </button>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2"  class="table table-bordered table-hover">
                  <thead class="text-center">
                  <tr>
                    <th rowspan="2" class="col-1">Date</th>
                    <th rowspan="2" class="col-1">Book</th>
                    <th rowspan="2" class="col-1">Verse</th>
                    <th>Inspiration</th>
                    <th rowspan="2" class="col-1">Action</th>
                  </tr>
                  <tr>
                   <th>Words/Phrases</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($bibles as $bible)
                    <tr>
                        <td>{{ $bible->created_at }}</td>
                        <td>{{ $bible->book }}</td>
                        <td>{{ $bible->verse }}</td>
                        <td>{{ $bible->phrase_light }}</td>
                        <td><!-- Action buttons, e.g., Edit/Delete --></td>
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





<!-- Modal form bible reading -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary ">
  <h5 class="modal-title text-bold" id="exampleModalLabel">Form Bible Reading</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="{{ route('input-bible') }}" method="post">
  @csrf
  <div class="modal-body">
  <input type="text" name="asisten" value="123" id="">
  <input type="text" name="nip" value="123" id="">
      <div>
          <label for="Book">Book</label><span> [kitab]</span>
          <select id="testament" class="custom-select mb-1" required name="kitab" onchange="showBooks()">
              <option value="">Select</option>
              <option value="old">Old Testament</option>
              <option value="new">New Testament</option>
          </select>
          <div id="oldTestament" style="display: none;" >
              <select class="custom-select" name="kitab_pl" >
                <option value="Genesis">Genesis</option>
                <option value="Exodus">Exodus</option>
                <option value="Leviticus">Leviticus</option>
                <option value="Numbers">Numbers</option>
                <option value="Deuteronomy">Deuteronomy</option>
                <option value="Joshua">Joshua</option>
                <option value="Judges">Judges</option>
                <option value="Ruth">Ruth</option>
                <option value="1 Samuel">1 Samuel</option>
                <option value="2 Samuel">2 Samuel</option>
                <option value="1 Kings">1 Kings</option>
                <option value="2 Kings">2 Kings</option>
                <option value="1 Chronicles">1 Chronicles</option>
                <option value="2 Chronicles">2 Chronicles</option>
                <option value="Ezra">Ezra</option>
                <option value="Nehemiah">Nehemiah</option>
                <option value="Esther">Esther</option>
                <option value="Job">Job</option>
                <option value="Psalms">Psalms</option>
                <option value="Proverbs">Proverbs</option>
                <option value="Ecclesiastes">Ecclesiastes</option>
                <option value="Song of Solomon">Song of Solomon</option>
                <option value="Isaiah">Isaiah</option>
                <option value="Jeremiah">Jeremiah</option>
                <option value="Lamentations">Lamentations</option>
                <option value="Ezekiel">Ezekiel</option>
                <option value="Daniel">Daniel</option>
                <option value="Hosea">Hosea</option>
                <option value="Joel">Joel</option>
                <option value="Amos">Amos</option>
                <option value="Obadiah">Obadiah</option>
                <option value="Jonah">Jonah</option>
                <option value="Micah">Micah</option>
                <option value="Nahum">Nahum</option>
                <option value="Habakkuk">Habakkuk</option>
                <option value="Zephaniah">Zephaniah</option>
                <option value="Haggai">Haggai</option>
                <option value="Zechariah">Zechariah</option>
                <option value="Malachi">Malachi</option>
              </select>
          </div>
          <div id="newTestament" style="display: none;">
              <select class="custom-select" name="kitab_pb" >
                <option value="Matthew">Matthew</option>
                <option value="Mark">Mark</option>
                <option value="Luke">Luke</option>
                <option value="John">John</option>
                <option value="Acts">Acts</option>
                <option value="Romans">Romans</option>
                <option value="1 Corinthians">1 Corinthians</option>
                <option value="2 Corinthians">2 Corinthians</option>
                <option value="Galatians">Galatians</option>
                <option value="Ephesians">Ephesians</option>
                <option value="Philippians">Philippians</option>
                <option value="Colossians">Colossians</option>
                <option value="1 Thessalonians">1 Thessalonians</option>
                <option value="2 Thessalonians">2 Thessalonians</option>
                <option value="1 Timothy">1 Timothy</option>
                <option value="2 Timothy">2 Timothy</option>
                <option value="Titus">Titus</option>
                <option value="Philemon">Philemon</option>
                <option value="Hebrews">Hebrews</option>
                <option value="James">James</option>
                <option value="1 Peter">1 Peter</option>
                <option value="2 Peter">2 Peter</option>
                <option value="1 John">1 John</option>
                <option value="2 John">2 John</option>
                <option value="3 John">3 John</option>
                <option value="Jude">Jude</option>
                <option value="Revelation">Revelation</option>
              </select>
          </div>
      </div>
      <div class="mt-2">
          <label for="Verse">Verse</label><span> [Pasal]</span>
          <input type="number" name="verse" class="form-control" required>
      </div>
      <div class="mt-2">
          <label for="Frasa/light">Frasa/light</label><span> [Kata/Terang]</span>
          <textarea name="terang" class="form-control" cols="10" rows="10" required></textarea>
      </div>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
</div>
</div>
</form>
</div>
<script>
  function showBooks() {
    const testament = document.getElementById('testament').value;
    document.getElementById('oldTestament').style.display = testament === 'old' ? 'block' : 'none';
    document.getElementById('newTestament').style.display = testament === 'new' ? 'block' : 'none';
}

</script>
@endsection
