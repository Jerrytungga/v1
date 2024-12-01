<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Viewreport;
use App\Models\Weekly;
use Illuminate\Support\Facades\Session;

class WeeklyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          // Jika tidak ada session 'role' atau role yang terdaftar bukan 'trainee', redirect ke halaman login (auth.index)
          if (!Session::has('role') || Session::get('role') !== 'admin') {
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
        $week = Weekly::all();
        return view('Admin.content.weekly.index', [
            "title" => "Week",
            "Week" => $week,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.content.weekly.create', [
            "title" => "Week",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

          // Validasi data input
          $request->validate([
            'name' => 'required|string', // Pastikan tabel users memiliki kolom nip
            'status' => 'required|string',
            
        ]);

        Weekly::create([
            'Week' => $request->name,
            'status' => $request->status,
          
          ]);

          return redirect()->route('weekly.index')->with('success', 'Input weekly successfully!');
    
    }

 
    public function edit(string $id)
    {
        //
         // Ambil data trainee berdasarkan ID
         $weekly = Weekly::findOrFail($id);
   
          return view('Admin.content.weekly.edit', [
              "title" => "Week",
              "weekly" => $weekly,
    
          ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string', 
            'status' => 'required|string',
        ]);
    
        $data = Weekly::findOrFail($id);
    
        // Mengupdate data fellowship
        $data->Week = $request->name;
        $data->status = $request->status; // Menyimpan tindakan
    
        // Menyimpan perubahan ke database
        $data->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('weekly.index')->with('success', 'Weekly updated successfully!');
    }

    public function reportw(){
        $Report = Viewreport::orderBy('created_at', 'desc')->first();
        return view('Admin.content.weekly.reportw', [
            "title" => "report",
            "viewreport" => $Report,
        ]);
    }

    public function set(Request $request)
    {
        //
        $request->validate([
            'hari' => 'required|string', 
            'waktu' => 'required|string',
        ]);

        $Report = Viewreport::orderBy('created_at', 'desc')->first();
        $si = $Report->id;
        $data = Viewreport::findOrFail($si);

        // Mengupdate data fellowship
        $data->setting_name = $request->hari;
        $data->input_time = $request->waktu; // Menyimpan tindakan

        // Menyimpan perubahan ke database
        $data->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('report.w')->with('success', 'Schedule has been successfully set!');

    }



}
