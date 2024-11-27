<?php

namespace App\Http\Controllers\Asisten;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trainee;
use Illuminate\Support\Facades\Session;

class AtraineeController extends Controller
{
    public function strainee()
    {
        //
        $nipAsisten = Session::get('nip');
        $trainee = Trainee::where('asisten_id', $nipAsisten)->get();
        return view('Asisten.content.Trainee.index', [
            "title" => "myTrainee",
            "traines" => $trainee,
        ]);

    }

}
