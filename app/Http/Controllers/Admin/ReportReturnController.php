<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\TravelLog;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ReportReturnController extends Controller
{
     public function index()
    {
        $data = TravelLog::where('travel_type', 'return')
            ->with([
                'user.personalData',
                'user.userDetails',
                'user.userDocuments',
                'exam_score'
            ])
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.report_return.index', compact('data'));
    }

    public function show($id)
    {
        $user = User::with([
                'userDetails',
                'userDocuments',
                'personalData',
                'examScore'
            ])
            ->findOrFail($id);

        return view('admin.report_return.show', compact('user'));
    }

    public function print($id)
    {
        $user = User::with([
                'userDocuments',
                'userDetails',
                'personalData'
            ])
            ->findOrFail($id);

        $pdf = Pdf::loadView('admin.report_return.pdf', compact('user'));
        return $pdf->download('laporan_kepulangan_cpmi_' . $user->username . '.pdf');
    }   
}
