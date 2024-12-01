<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Http\Request;

class Batch_AController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch = Batch::all();
        return view('Admin.content.Batch.index', [
            "title" => "Batch",
            "batch" => $batch,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.content.Batch.create', [
            "title" => "Batch",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'batch' => 'required|string', 
        ]);

        Batch::create([
         'batch' => $request->batch
        ]);

        return redirect()->route('batch.index')->with('success', 'Input batch successfully!');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // Retrieve the announcement by ID
         $batch = Batch::findOrFail($id);
   
         return view('Admin.content.Batch.edit', [
             "title" => "Batch",
             "batch" => $batch,
   
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'batch' => 'required|string', 
        ]);

            // Find the existing announcement
        $batch = Batch::findOrFail($id);

        // Update the announcement data
        $batch->update([
            'batch' => $request->batch,
        ]);

    // Redirect back with success message
    return redirect()->route('batch.index')->with('success', 'Batch updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
