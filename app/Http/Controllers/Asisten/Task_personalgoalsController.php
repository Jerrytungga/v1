<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Taskpersonalgoal;
use Illuminate\Support\Facades\Session;

class Task_personalgoalsController extends Controller
{
    public function index($nip)
    {
        $nipAsisten = Session::get('nip');
        $namaAsisten = Session::get('nama');
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        $ambil_trainee = Trainee::where('nip', $nip)->first();
        $ambil_tugas = Taskpersonalgoal::where('asisten_id', $nipAsisten)
        ->where('nip', $nip)
        ->where('week', $minggu)
        ->get();
        return view('Asisten.content.task_personalgoals.index', [
            "title" => "Assignment",
            "Week" => $minggu,
            "ambil_trainee" => $ambil_trainee,
            "ambil_tugas" => $ambil_tugas,
        ]);

    }

    public function Add_Assignment(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'asisten_id' => 'required|string',
            'semester' => 'required|string',
            'week' => 'required|string',
            'Assignment' => 'required|string',
            'status' => 'required|string',
            ]);

            Taskpersonalgoal::create([
                'nip' => $request->nip,
                'asisten_id' => $request->asisten_id,
                'semester' => $request->semester,
                'week' => $request->week,
                'Assignment' => $request->Assignment,
                'status' => $request->status,
            ]);

            return redirect()->route('Assignment-Asisten',$request->nip)->with('success', 'Input Assignment successfully!');
    
    }


    public function Inactive(Request $request, $id)
    {
        // Cari pesan berdasarkan ID
        $message = Taskpersonalgoal::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $message->status = 'inactive';
        $message->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('Assignment-Asisten', $message->nip)->with('success', 'Successfully deactivated!');
    }
    public function Active(Request $request, $id)
    {
        // Cari pesan berdasarkan ID
        $message = Taskpersonalgoal::findOrFail($id);

        // Perbarui status pesan menjadi 'inactive'
        $message->status = 'active';
        $message->save();  // Simpan perubahan

        // Redirect kembali dengan pesan sukses
        return redirect()->route('Assignment-Asisten', $message->nip)->with('success', 'Successfully activated!');
    }
}
