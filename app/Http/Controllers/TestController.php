<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jsa;

class TestController extends Controller
{
    public function testPDF()
    {
        try {
            $jsa = Jsa::with(['mahasiswas', 'dosens', 'workSteps', 'apds', 'inspections'])->first();
            
            if (!$jsa) {
                return response()->json(['error' => 'No JSA found'], 404);
            }
            
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.jsa-template', compact('jsa'));
            $pdf->setPaper('A4', 'portrait');
            return $pdf->download('test-JSA-' . $jsa->no_jsa . '.pdf');
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'PDF generation failed',
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }
}
