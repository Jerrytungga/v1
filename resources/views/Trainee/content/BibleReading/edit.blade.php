@extends('Trainee.layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Bible Reading</h1>
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
            <div class="card-header bg-warning">
           <a href="{{ route('BibleReading.index') }}" class="btn bg-light ">Back To View Bible Reading</a>
            </div>
              <!-- /.card-header --> 
              <div class="card-body">
              <form action="{{ route('BibleReading.update', $bibleReading->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div>
                            <label for="testament">Book</label><span> [kitab]</span>
                            <select id="testament" class="custom-select mb-1" required name="kitab" onchange="showBooks()">
                                <option value="{{ $bibleReading->pl_pb }}">{{ $bibleReading->pl_pb }}</option>
                                <option value="Old Testament" {{ $bibleReading->testament == 'Old Testament' ? 'selected' : '' }}>Old Testament</option>
                                <option value="New Testament" {{ $bibleReading->testament == 'New Testament' ? 'selected' : '' }}>New Testament</option>
                            </select>
                           <div id="oldTestament" style="{{ $bibleReading->testament == 'old' ? '' : 'display: none;' }}">
                                <select class="custom-select" name="kitab_pl">
                                    <option value="{{ $bibleReading->book }}">{{ $bibleReading->book }}</option>
                                    <!-- Daftar buku Alkitab Lama -->
                                    @foreach (['Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 'Judges', 'Ruth', '1 Samuel', '2 Samuel', '1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles', 'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalms', 'Proverbs', 'Ecclesiastes', 'Song of Solomon', 'Isaiah', 'Jeremiah', 'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel', 'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi'] as $book)
                                        <option value="{{ $book }}">{{ $book }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="newTestament" style="{{ $bibleReading->testament == 'new' ? '' : 'display: none;' }}">
                                <select class="custom-select" name="kitab_pb">
                                    <option value="{{ $bibleReading->book }}">{{ $bibleReading->book }}</option>
                                    <!-- Daftar buku Alkitab Baru -->
                                    @foreach (['Matthew', 'Mark', 'Luke', 'John', 'Acts', 'Romans', '1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians', 'Philippians', 'Colossians', '1 Thessalonians', '2 Thessalonians', '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews', 'James', '1 Peter', '2 Peter', '1 John', '2 John', '3 John', 'Jude', 'Revelation'] as $book)
                                        <option value="{{ $book }}">{{ $book }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-2">
                            <label for="Verse">Verse</label><span> [Pasal]</span>
                            <input type="number" name="verse" class="form-control" value="{{ old('verse', $bibleReading->verse) }}" required>
                        </div>

                        <div class="mt-2">
                            <label for="Frasa/light">Frasa/light</label><span> [Kata/Terang]</span>
                            <textarea name="terang" class="form-control" cols="10" rows="10" required>{{ old('terang', $bibleReading->phrase_light) }}</textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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
  function showBooks() {
    const testament = document.getElementById('testament').value;
    document.getElementById('oldTestament').style.display = testament === 'Old Testament' ? 'block' : 'none';
    document.getElementById('newTestament').style.display = testament === 'New Testament' ? 'block' : 'none';
}

</script>
@endsection
