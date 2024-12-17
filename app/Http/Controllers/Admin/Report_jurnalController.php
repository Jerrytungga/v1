<?php

namespace App\Http\Controllers\Admin;

use Mpdf\Mpdf;
use App\Models\Batch;
use App\Models\Weekly;
use App\Models\Poinjurnal;
use Illuminate\Http\Request;
use App\Models\Report_weekly;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class Report_jurnalController extends Controller
{
    //
    public function index(Request $request){
        $weekly = Weekly::all();
        $batch = Batch::all();
        $angkatan = $request->angkatan;
        $week = $request->week;
        $report = Report_weekly::where('batch', $angkatan)
        ->where('week', $week)->get();
        return view('Admin.content.report.index', [
            "title" => "Report",
            "report" => $report,
            'weekly' => $weekly,
            "batch" => $batch,
            'request' => $request,
        ]);
    }

    public function filter_report_view(Request $request){
        $weekly = Weekly::all();
        $batch = Batch::all();
        $angkatan = $request->angkatan;
        $week = $request->week;
        $report = Report_weekly::where('batch', $angkatan)
        ->where('week', $week)->get();
        return view('Admin.content.report.index', [
            "title" => "Report",
            "report" => $report,
            'weekly' => $weekly,
            "batch" => $batch,
            'request' => $request,
        ]);

    }


 
    public function generatePDF(Request $request)
    {
        // Validate input
        $angkatan = $request->angkatan;
        $week = $request->week;

        // Fetch report data based on batch and week
        $report = Report_weekly::where('batch', $angkatan)
            ->where('week', $week)
            ->get();

        if ($report->isEmpty()) {
            return redirect()->back()->with('error', 'No data available to generate the PDF.');
        }

        // Fetch any additional data like standards if needed
      

        // Generate HTML for the report (using Blade view)
        $html = view('Admin.content.report.pdf', compact('report', 'angkatan', 'week'))->render();

        // Initialize mPDF instance
        $mpdf = new Mpdf();

        // Write the HTML content to mPDF
        $mpdf->WriteHTML($html);

        // Output the PDF for download
        return $mpdf->Output("Weekly_Report_Batch_{$angkatan}_Week_{$week}.pdf", 'D');
    }
    
}
