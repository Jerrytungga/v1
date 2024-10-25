<?php

namespace App\Http\Controllers;


use App\Models\Bible;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BibleController extends Controller
{  public function index()
    {
        $bibles = Bible::all(); // Mengambil semua data dari tabel bible
        return view('Trainee.bible', compact('bibles')); // Mengirimkan data ke tampilan
    }

    public function store(Request $request){

        $today = now()->format('Y-m-d'); // Format tanggal saat ini
        $entryCount = Bible::whereDate('created_at', $today)->count();
           // Cek apakah sudah ada 2 entri
            if ($entryCount >= 2) {
                return redirect()->route('bible')->with('error', 'You have entered data 2 times today');
            }
      
        $request->validate([
            'asisten' => 'required|string',
            'nip' => 'required|string',
            'kitab' => 'required|string|in:old,new',
            'kitab_pl' => 'required_if:kitab,old|string', // For Old Testament
            'kitab_pb' => 'required_if:kitab,new|string', // For New Testament
            'verse' => 'required|integer',
            'terang' => 'required|string',
        ]);


        $book = $request->kitab === 'old' ? $request->kitab_pl : $request->kitab_pb;

        Bible::create([
            'asisten_id' => $request->asisten,
            'nip' => $request->nip,
            'pl_pb' => $request->kitab,
            'book' => $request->kitab_pl,
            'book' => $book,
            'verse' => $request->verse,
            'phrase_light' => $request->terang,
        ]);

        return redirect()->route('trainee.bible');

    }

  
}
