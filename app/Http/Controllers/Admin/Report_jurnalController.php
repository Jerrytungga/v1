<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report_weekly;
use Illuminate\Http\Request;

class Report_jurnalController extends Controller
{
    //
    public function index(){
        $report = Report_weekly::all();
        return view('Admin.content.report.index', [
            "title" => "Report",
            "report" => $report,
        ]);
    }
}
