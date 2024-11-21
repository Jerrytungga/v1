<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Facades\Session;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
              // Jika tidak ada session 'role' atau role yang terdaftar bukan 'trainee', redirect ke halaman login (auth.index)
              if (!Session::has('role') || Session::get('role') !== 'admin') {
                return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses ke halaman ini.');
            }
            $Announcement = Announcement::all();
            return view('Admin.content.Announcement.index', [
                "title" => "Announcement",
                "Announcement" => $Announcement,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.content.Announcement.create', [
            "title" => "Announcement",
        ]);
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'angkatan' => 'required|string', // Batch is required
            'Announcement' => 'required|string', // Announcement content is required
            'date_mulai' => 'required|date', // Start date is required
            'jam_mulai' => 'required|date_format:H:i', // Start time is required in H:i format
            'date_akhir' => 'required|date', // End date is required
            'jam_akhir' => 'required|date_format:H:i', // End time is required in H:i format
            'status' => 'required|string|in:active,inactive', // Status can either be 'active' or 'inactive'
        ]);

        // Create a new announcement record
        Announcement::create([
            'batch' => $request->angkatan,
            'announcement' => $request->Announcement,
            'date_mulai' => $request->date_mulai,
            'jam_mulai' => $request->jam_mulai,
            'date_akhir' => $request->date_akhir,
            'jam_akhir' => $request->jam_akhir,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->route('Announcement.index')->with('success', 'Announcement created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the announcement by ID
        $announcement = Announcement::findOrFail($id);
   
           return view('Admin.content.Announcement.edit', [
               "title" => "Announcement",
               "announcement" => $announcement,
     
           ]);
    }
// In the AnnouncementController, update the validation rules:
public function update(Request $request, $id)
{
    // Validate the input data
    $request->validate([
        'angkatan' => 'required|string',
        'announcement' => 'required|string',
        'date_mulai' => 'required|date',
        'jam_mulai' => 'required|date_format:H:i', // Ensure H:i format
        'date_akhir' => 'required|date',
        'jam_akhir' => 'required|date_format:H:i', // Ensure H:i format
        'status' => 'required|string|in:active,inactive',
    ]);

    // Find the existing announcement
    $announcement = Announcement::findOrFail($id);

    // Update the announcement data
    $announcement->update([
        'batch' => $request->angkatan,
        'announcement' => $request->announcement,
        'date_mulai' => $request->date_mulai,
        'jam_mulai' => $request->jam_mulai,
        'date_akhir' => $request->date_akhir,
        'jam_akhir' => $request->jam_akhir,
        'status' => $request->status,
    ]);

    // Redirect back with success message
    return redirect()->route('Announcement.index')->with('success', 'Announcement updated successfully!');
}


}
