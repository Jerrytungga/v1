<?php

namespace App\Http\Controllers\Trainee;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class BibleReadingController extends Controller
{
 
    public function index(Request $request)
    {
        // Inisialisasi query
        $nipTrainee = Session::get('nip');
        $query = BibleReading::where('nip', $nipTrainee);

         // Cek apakah ada filter yang diterima
         if ($request->has("filter")) {
            $filter = $request->input("filter");
            if ($filter === "Old Testament") {
                $query->where("pl_pb", "Old Testament");
            } elseif ($filter === "New Testament") {
                $query->where("pl_pb", "New Testament");
            }
        }

        // Ambil data berdasarkan filter yang diterapkan
        $entrys = $query->orderBy("created_at", "DESC")->get();

        return view("Trainee.content.BibleReading.index", [
            "title" => "Bible Reading",
            "entrys" => $entrys,
        ]);
    }

    public function create()
    {
        // Ke halaman form input
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        return view('Trainee.content.biblereading.create', [
            "title" => "Add Bible Reading",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
        ]);
      
    }

    public function store(Request $request)
    {
        // Insert data ke Database
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = BibleReading::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 2 entri
            if ($entryCount >= 2) {
                return redirect()->route('BibleReading.index')->with('error', 'You have entered data 2 times today');
            }
      
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'kitab' => 'required|string|in:Old Testament,New Testament',
            'kitab_pl' => 'required_if:kitab,Old Testament|string', // For Old Testament
            'kitab_pb' => 'required_if:kitab,New Testament|string', // For New Testament
            'verse' => 'required|integer',
            'terang' => 'required|string',
        ]);
        $semester = Session::get('semester');
        $book = $request->kitab === 'Old Testament' ? $request->kitab_pl : $request->kitab_pb;
        BibleReading::create([
            'asisten_id' => $request->asisten,
            'nip' => $request->nip,
            'pl_pb' => $request->kitab,
            'book' => $request->kitab_pl,
            'book' => $book,
            'verse' => $request->verse,
            'phrase_light' => $request->terang,
            'semester' => $semester,
        ]);
        return redirect()->route('BibleReading.index')->with('success', 'Input Bible Reading successfully!');

    }
    public function edit(string $id)
    {
        // Pengambilan data berdasarkan id
        $bibleReading = BibleReading::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
        // Ke halaman form edit data
        return view('Trainee.content.BibleReading.edit', [
            "title" => "Edit Bible Reading",
            "bibleReading" => $bibleReading // Kirim data ke view
        ]);
    }


    public function update(Request $request, string $id)
    {
       // Validasi input
       $request->validate([
        'kitab' => 'required|string',
        'verse' => 'required|integer',
        'terang' => 'required|string',
        'kitab_pl' => 'nullable|string',
        'kitab_pb' => 'nullable|string',
    ]);

    // Temukan data berdasarkan ID
    $bibleReading = BibleReading::findOrFail($id);

    // Update data berdasarkan input yang diterima
    if ($request->kitab === 'Old Testament') {
        $bibleReading->book = $request->kitab_pl; // Update untuk Old Testament
    } else {
        $bibleReading->book = $request->kitab_pb; // Update untuk New Testament
    }

    $bibleReading->verse = $request->verse;
    $bibleReading->phrase_light = $request->terang;
    $bibleReading->pl_pb = $request->kitab; // Menyimpan jenis kitab

    // Simpan perubahan
    $bibleReading->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('BibleReading.index')->with('success', 'Bible Reading updated successfully!');

    }

}
