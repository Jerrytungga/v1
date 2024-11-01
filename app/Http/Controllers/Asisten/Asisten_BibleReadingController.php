<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Trainee;
use App\Models\BibleReading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Asisten_BibleReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $nip)
    {
        //
           // $nipTrainee = Session::get('nip');
         

                       // Ambil ID asisten dari sesi
    $id_asisten = Session::get('asisten');

    // Dapatkan data BibleReading berdasarkan NIP dan ID asisten
    $bibles = BibleReading::where('nip', $nip)
                          ->where('asisten_id', $id_asisten)
                          ->get();

    // Kirim data ke view
    return view('Asisten.content.BibleReading.index', [
        "title" => "Bible Reading",
        "bibles" => $bibles, // Kirim data ke view
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $id_asisten = Session::get('asisten');
        $entrys = Trainee::where('asisten_id', $id_asisten)->get();
        return view('Asisten.content.BibleReading.view', [
            "title" => "Bible Reading",
            'entrys' => $entrys,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
