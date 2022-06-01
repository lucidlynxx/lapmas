<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (Gate::allows('admin')) {

            $dataUserAdmin = Report::get();

            return view('dashboard.index', [
                'author' => 'Dzaky Syahrizal',
                'title' => 'Dashboard',
                'pengaduan' => $dataUserAdmin->Where('classification_id', 1)->count(),
                'aspirasi' => $dataUserAdmin->Where('classification_id', 2)->count(),
                'permintaanInformasi' => $dataUserAdmin->Where('classification_id', 3)->count(),
                'anonim' => $dataUserAdmin->Where('user_id', 6)->count(),
                'totalLaporan' => $dataUserAdmin->count()
            ]);
        }

        $dataUser = Report::where('user_id', auth()->user()->id)->get();

        return view('dashboard.index', [
            'author' => 'Dzaky Syahrizal',
            'title' => 'Dashboard',
            'pengaduan' => $dataUser->where('classification_id', 1)->count(),
            'aspirasi' => $dataUser->where('classification_id', 2)->count(),
            'permintaanInformasi' => $dataUser->where('classification_id', 3)->count(),
            'totalLaporan' => $dataUser->count()
        ]);
    }
}
