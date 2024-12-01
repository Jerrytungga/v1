<?php

namespace App\Http\Controllers\Asisten;

use App\Models\Trainee;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AtraineeController extends Controller
{
    public function strainee()
    {
        //
        $nipAsisten = Session::get('nip');
        $trainee = Trainee::where('asisten_id', $nipAsisten)->get();
        $dailyItems = MenuItem::where('status', 'active')
        ->where('type', 'daily')
        ->get();
        $weeklyItems = MenuItem::where('status', 'active')
        ->where('type', 'weekly')
        ->get();
        return view('Asisten.content.Trainee.index', [
            "title" => "myTrainee",
            "traines" => $trainee,
            "dailyItems" => $dailyItems,
            "weeklyItems" => $weeklyItems,
        ]);

    }

}
