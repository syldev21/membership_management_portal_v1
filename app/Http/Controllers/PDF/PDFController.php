<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use PDF;


class PDFController extends Controller
{
    public function generatePDF()
    {
        // Get the HTML content of the dashboard
        $html = View::make('dashboard.main')->render();

        // Generate the PDF using Snappy


        $pdf = PDF::loadHTML($html); // Method 'loadHTML' not found in \Knp\Snappy\Pdf

        // Download the PDF
        return $pdf->download('dashboard.pdf');
    }
}
