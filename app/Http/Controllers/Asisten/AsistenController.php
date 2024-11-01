<?php

namespace App\Http\Controllers\Asisten;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsistenController extends Controller
{
    //
    public function index()
    {

        return view('Asisten.content.home', [
            "title" => "Home",
        ]);

    }


}
