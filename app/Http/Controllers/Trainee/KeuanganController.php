<?php

namespace App\Http\Controllers\Trainee;

use Carbon\Carbon;
use App\Models\Weekly;
use App\Models\Asisten;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KeuanganController extends Controller
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
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the current week (Monday)
        $endOfWeek = Carbon::now()->endOfWeek(); // End of the current week (Sunday)
        
        $entrys = Keuangan::where('nip', $nipTrainee)
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at', 'DESC') // Order by created_at in ascending order
            ->get();
        
        $noDataMessage = $entrys->isEmpty() ? 'No data found for this week' : null;
        $id_asisten = Session::get('asisten');
        $asisten = Asisten::where('nip', $id_asisten)->first();
        $weekly = Weekly::all();
        $nama_asisten = $asisten ? $asisten->name : 'Asisten Not Found';
        return view('Trainee.content.keuangan.index', [
            "title" => "Financial Statements",
            'entrys' => $entrys,
            'name_asisten' => $nama_asisten,
            'noDataMessage' => $noDataMessage,
            'weekly' => $weekly,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nipTrainee = Session::get('nip');
        $id_asisten = Session::get('asisten');
        return view('Trainee.content.keuangan.create', [
            "title" => "Financial Statements",
            'nipTrainee' => $nipTrainee, // Mengirimkan NIP Trainee ke view
            'id_asisten' => $id_asisten, // Mengirimkan ID Asisten ke view
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nip' => 'required|string',
            'asisten' => 'required|string',
            'keterangan' => 'required|string',
            'Pemasukan' => 'required|string', 
            'pengeluaran' => 'required|string', 
        ]);

        $semester = Session::get('semester');     
        $pemasukan = preg_replace('/\D/', '', $request->input('Pemasukan')); // Remove any non-numeric characters
        $pengeluaran = preg_replace('/\D/', '', $request->input('pengeluaran')); // Same for pengeluaran
        $saldo = $pemasukan - $pengeluaran;

        // Ambil saldo terakhir dari database (misalnya saldo sebelumnya)
        $lastKeuangan = Keuangan::where('nip', $request->nip)
                                ->where('semester', $semester)
                                ->orderBy('created_at', 'desc')
                                ->first();

        $saldoSebelumnya = $lastKeuangan ? $lastKeuangan->saldo : 0; // Jika tidak ada saldo sebelumnya, set ke 0

        // Tambahkan saldo baru ke saldo sebelumnya
        $saldoTotal = $saldoSebelumnya + $saldo;  // Total saldo baru
                $weekly = Weekly::where('status', 'active')->first();
                if ($weekly) {
           Keuangan::create([
            'nip' => $request->nip,
            'asisten_id' => $request->asisten,
            'keterangan' => $request->keterangan,
            'debit' => $pemasukan,
            'credit' => $pengeluaran,
            'saldo' => $saldoTotal, // Menyimpan saldo dalam format Rupiah
            'semester' => $semester,
            'week' => $weekly->Week,
           
        ]);
        return redirect()->route('keuangan.index')->with('success', 'Input Financial successfully!');
    }else {
        // Handle the case where there's no active week
        return redirect()->route('keuangan.index')->with('error', 'No active week found, cannot process input.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Mengambil data keuangan berdasarkan ID yang diterima
        // Jika data tidak ditemukan, akan otomatis memunculkan halaman error 404
        $data = Keuangan::findOrFail($id); 
    

    
        // Menampilkan form edit dengan data keuangan yang ingin diedit
        return view('Trainee.content.keuangan.edit', [
            "title" => "Financial Statements",
            "data" => $data
        
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi inputan dari form
        $request->validate([
            'keterangan' => 'required',  // Validasi keterangan
            'Pemasukan' => 'required',   // Validasi Pemasukan (tidak perlu validasi numerik)
            'pengeluaran' => 'required', // Validasi Pengeluaran (tidak perlu validasi numerik)
        ]);
    
        // Ambil data keuangan berdasarkan ID
        $data = Keuangan::findOrFail($id);
    
        $pemasukan = preg_replace('/\D/', '', $request->input('Pemasukan')); // Remove any non-numeric characters
        $pengeluaran = preg_replace('/\D/', '', $request->input('pengeluaran')); // Same for pengeluaran
        $t_debit = (float)$pemasukan;
        $t_credit = (float)$pengeluaran;
        
        $semester = $data->semester;
        $nip = $data->nip;
        $minggu = $data->week;
          $dataBeforeLast = Keuangan::where('nip', $nip) // Kondisi untuk nip
          ->where('week', $minggu) // Kondisi untuk week
          ->where('semester', $semester) // Kondisi untuk semester
          ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at secara menurun
          ->skip(1) // Lewatkan 1 data pertama (data terbaru)
          ->take(1) // Ambil 1 data setelah itu
          ->first(); // Ambil data pertama (yang sebelum data terakhir)
        $t_saldo = $dataBeforeLast->saldo;
        $Pemasukan = $t_debit;
        $pengeluaran = $t_credit;


        // Update data keuangan
        $data->keterangan = $request->keterangan;
        $data->debit = $t_debit;  // Menyimpan Pemasukan
        $data->credit = $t_credit;  // Menyimpan Pengeluaran
    
        // Menghitung saldo baru setelah perubahan
        $saldoBaru = $t_saldo + $Pemasukan - $pengeluaran;

        // Simpan saldo baru yang sudah diformat
        $data->saldo = $saldoBaru;
    
        // Simpan perubahan ke database
        $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('keuangan.index')->with('success', 'Financial updated successfully!');
    }
    
    

    public function filterWeek(Request $request)
    {
        // Mengambil nilai minggu dan semester yang dipilih dari form filter
        $selectedWeek = $request->input('week');
        $selectsemester = $request->input('semester');
        $nipTrainee = Session::get('nip'); // Mengambil NIP Trainee dari session
    
        // Menyiapkan query dasar untuk mengambil agenda berdasarkan semester dan NIP Trainee
        $query = Keuangan::where('semester', $selectsemester)
                        ->where('nip', $nipTrainee);
    
        // Jika ada filter minggu yang dipilih, tambahkan kondisi untuk week
        if (!empty($selectedWeek)) {
            $query->where('week', $selectedWeek);
        }
    
        // Ambil data agenda yang sudah difilter dan urutkan berdasarkan minggu
        $entrys = $query->orderBy('week', 'ASC')->get();
    
        // Menyediakan pesan jika tidak ada data yang ditemukan setelah filter
        $noDataMessage = $entrys->isEmpty() ? 'No data found for the selected week' : null;
        $weekly = Weekly::all();
        // Menampilkan halaman index dengan data yang sudah difilter
        return view('Trainee.content.keuangan.index', [
           "title" => "Financial Statements",
            "entrys" => $entrys, // Data agenda yang sudah difilter
            "smt" => $selectsemester, // Semester yang dipilih
            "noDataMessage" => $noDataMessage, // Pesan jika tidak ada data
            'week' => $selectedWeek,
            'weekly' => $weekly,
        ]);
    }
}
