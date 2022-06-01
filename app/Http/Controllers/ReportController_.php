<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('dashboard.reports.index', [
            'author' => 'Dzaky Syahrizal',
            'title' => "Reports",
            'reports' => Report::latest()->get()
        ]);
    }

    public function show(Report $report)
    {
        return view('dashboard.reports.show', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Report",
            "report" => $report
        ]);
    }
}
