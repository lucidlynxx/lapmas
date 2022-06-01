<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Report;

class PrintPDFController extends Controller
{
    public function index(Report $report)
    {
        $pdf = PDF::loadview('form.print_pdf', [
            'report' => $report
        ])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
