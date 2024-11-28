<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Weekly;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsistenController extends Controller
{
    //
    public function index()
    {
        $weekly = Weekly::where('status', 'active')->first();
        $minggu = $weekly ? $weekly->Week : null;
        return view('Asisten.content.home', [
            "title" => "Home",
            "Week" => $minggu,
        ]);

    }

    



}
