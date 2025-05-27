<?php

namespace App\Http\Controllers\Admin;

use App\Models\TravelLog;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class DepartureController extends Controller
{
    // public function index(){

    //     return view('admin.informasi_keberangkatan.index');
    // }

    //  public function download($id)
    // {
    //     $travelLog = TravelLog::findOrFail($id);

    //     $pdf = Pdf::loadView('pdf.invoice', compact('travel_type'));

    //     return $pdf->download("invoice-{$travelLog->id}.pdf");
    // }
}
