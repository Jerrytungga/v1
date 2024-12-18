<?php

namespace App\Http\Controllers\Trainee;

use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Ministri;
use App\Models\Poindaily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MinistriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!Session::has('role') || Session::get('role') !== 'trainee') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

         //menampilkan data awal
         $nipTrainee = Session::get('nip');
         $ambil_minggu = Weekly::where('status', 'active')->first();
         $dapat_minggu = $ambil_minggu ? $ambil_minggu->Week : null;
         
        // Fetch only 4 records created during this week and ordered by 'created_at' in descending order
        $entrys = Ministri::where('nip', $nipTrainee)
        ->where('week', $dapat_minggu)
        ->orderBy('created_at', 'DESC')
        ->take(4) // Limit to 4 records
        ->get();
        
        $noDataMessage = $entrys->isEmpty() ? 'No data found for this week' : null;
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        $weekly = Weekly::all();
        return view("Trainee.content.ministri.index", [
            "title" => "Summary Of Ministry",
            'entrys' => $entrys,
            'name_asisten' => $nama_asisten,
            'noDataMessage' => $noDataMessage, // Pass the no data message
            'weekly' => $weekly,
        ]);
    }


    public function create()
    {
        // kirim data ke form create
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        $semester = Session::get('semester');
        return view("Trainee.content.ministri.create", [
            "title" => "Summary Of Ministry",
            'nipTrainee' => $nipTrainee, // Mengirimkan nip trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan id asisten ke view
            'semester' => $semester, // Mengirimkan id asisten ke view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $today = now()->format('Y-m-d'); // Format tanggal saat ini
          // Mendapatkan tanggal mulai dan akhir minggu ini (Senin hingga Minggu)
        $startOfWeek = Carbon::now()->startOfWeek();  // Tanggal mulai minggu ini (Senin)
        $endOfWeek = Carbon::now()->endOfWeek();  // Tanggal akhir minggu ini (Minggu)
        $nipTrainee = Session::get('nip');
        // Menghitung jumlah entri yang dibuat dalam minggu ini
        $entryCount = Ministri::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                                ->where('nip', $nipTrainee)
                                ->count();

        // Memeriksa apakah sudah ada 2 entri dalam minggu ini
        if ($entryCount >= 2) {
            return redirect()->route('ministri.index')->with('error', 'You have already entered data 2 times this week');
        }
          // Pengecekan form input
          $request->validate([
              'nip' => 'required|string',
              'asisten' => 'required|string',
              'Book' => 'required|string',
              'News' => 'required|string',
              'frase' => 'required|string',
              'kategori' => 'required|string',
            
            
            ]);
            $weekly = Weekly::where('status', 'active')->first();
            $semester = Session::get('semester');
            $ambil_poin = Poindaily::where('semester', $semester)->first();
            $poin = $ambil_poin ? $ambil_poin->summary_of_ministry : null;
            if ($weekly) {
               Ministri::create([
              'nip' => $request->nip,
              'asisten_id' => $request->asisten,
              'book_title' => $request->Book,
              'news' => $request->News,
              'inspirasi' => $request->frase,
              'category' => $request->kategori,
              'semester' => $semester,
              'week' => $weekly->Week,
              'poin' => $poin,
            
            ]);
               return redirect()->route('ministri.index')->with('success', 'Input Summary Of Ministry successfully!');
            }else {
                // Handle the case where there's no active week
                return redirect()->route('ministri.index')->with('error', 'No active week found, cannot process input.');
                }
               
    }



    public function edit(string $id)
    {
          //Mengambil id untuk edit data
          $data = Ministri::findOrFail($id); // Menggunakan findOrFail untuk menangani ID yang tidak ditemukan
          // kembali ke view
          return view('Trainee.content.ministri.edit', [
            "title" => "Summary Of Ministry",
              "data" => $data // Kirim data ke view
          ]);
    }

 
    public function update(Request $request, string $id)
    {
        // Validasi input
       $request->validate([
        'kategori' => 'required|string',
        'Book' => 'required|string',
        'News' => 'required|string',
        'frase' => 'required|string',
    
    ]);

    // Temukan data berdasarkan ID
    $data = Ministri::findOrFail($id);
    $data->category = $request->kategori;
    $data->book_title = $request->Book;
    $data->news = $request->News;
    $data->inspirasi = $request->frase; // Menyimpan jenis kitab

    // Simpan perubahan
    $data->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('ministri.index')->with('success', 'Summary Of Ministry updated successfully!');
    }

    public function filterWeek(Request $request)
    {
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip');
        // Query dasar
        $query = Ministri::where('semester', $selectsemester)
                            ->where('nip', $nipTrainee);
    
        // Tambahkan kondisi untuk week jika ada nilai
        if (!empty($selectedWeek)) {
            $query->where('week', $selectedWeek);
        }
    
        // Ambil data sesuai filter
        $entrys = $query->orderBy('week', 'ASC')->get();
    
        // Pesan jika tidak ada data ditemukan
        $noDataMessage = $entrys->isEmpty() ? 'No data found for the selected week' : null;
        $weekly = Weekly::all();
        // Return view dengan hasil yang sudah difilter
        return view('Trainee.content.ministri.index', [
            "title" => "Summary Of Ministry",
            'entrys' => $entrys,
            'smt' => $selectsemester,
            'noDataMessage' => $noDataMessage,
            'weekly' => $weekly,
            'week' => $selectedWeek,
        ]);
    }
    
    
}
