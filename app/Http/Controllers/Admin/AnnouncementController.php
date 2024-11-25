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
            'status' => 'required|string|in:active,inactive', // Status can either be 'active' or 'inactive'
        ]);

        // Create a new announcement record
        Announcement::create([
            'batch' => $request->angkatan,
            'announcement' => $request->Announcement,
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
        'announcement' => 'required|string',// Ensure H:i format
        'status' => 'required|string|in:active,inactive',
    ]);

    // Find the existing announcement
    $announcement = Announcement::findOrFail($id);

    // Update the announcement data
    $announcement->update([
        'batch' => $request->angkatan,
        'announcement' => $request->announcement,
        'status' => $request->status,
    ]);

    // Redirect back with success message
    return redirect()->route('Announcement.index')->with('success', 'Announcement updated successfully!');
}


}
