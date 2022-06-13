<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Report;
use App\Models\Message;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class DashboardReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('dashboard.reports.index', [
                'author' => 'Dzaky Syahrizal',
                'title' => "Reports",
                'reports' => Report::latest()->get(),
                'jmlPemberitahuan' => Message::get()->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.reports.index', [
            'author' => 'Dzaky Syahrizal',
            'title' => "Reports",
            'reports' => Report::where('user_id', auth()->user()->id)->latest()->get(),
            'jmlPemberitahuan' => Message::get()->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('admin')) {
            return view('dashboard.reports.create', [
                'author' => 'Dzaky Syahrizal',
                'title' => "Create New Report",
                'class' => Classification::all(),
                'jmlPemberitahuan' => Message::get()->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.404', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Not Found"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('admin')) {
            $validatedData = $request->validate([
                'classification_id' => 'required',
                'title' => 'required|max:255',
                'slug' => 'required|unique:reports',
                'Kategori' => 'required',
                'lokKejadian' => 'required',
                'tglKejadian' => 'required',
                'body' => 'required|min:25',
                'image' => 'image|file|max:2048'
            ]);

            if ($request->file('image')) {
                $validatedData['image'] = $request->file('image')->store('report-images');
            }

            $validatedData['user_id'] = auth()->user()->id;

            Report::create($validatedData);

            alert()->success('Buat Laporan Sukses!', 'Data laporan telah ditambahkan.');

            return redirect('/dashboard/reports');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        if (Gate::denies('view-report', $report)) {
            if (Gate::allows('admin')) {
                return view('dashboard.reports.show', [
                    'author' => 'Dzaky Syahrizal',
                    "title" => "Report",
                    "report" => $report,
                    'jmlPemberitahuan' => Message::get()->where('status', 'belum dibaca')->count()
                ]);
            }
            return view('dashboard.404', [
                'author' => 'Dzaky Syahrizal',
                "title" => "Not Found",
                'jmlPemberitahuan' => Message::get()->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.reports.show', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Report",
            "report" => $report,
            'jmlPemberitahuan' => Message::get()->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        if (Gate::denies('admin')) {
            return view('dashboard.reports.edit', [
                'author' => 'Dzaky Syahrizal',
                "title" => "Report",
                "report" => $report,
                'jmlPemberitahuan' => Message::get()->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.404', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Not Found"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        if (Gate::denies('admin')) {
            $rules = [
                'classification_id' => 'required',
                'title' => 'required|max:255',
                'Kategori' => 'required',
                'lokKejadian' => 'required',
                'tglKejadian' => 'required',
                'body' => 'required|min:25',
                'image' => 'image|file|max:2048'
            ];

            if ($request->slug != $report->slug) {
                $rules['slug'] = 'required|unique:reports';
            }

            $validatedData = $request->validate($rules);

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                $validatedData['image'] = $request->file('image')->store('report-images');
            }

            $validatedData['user_id'] = auth()->user()->id;

            Report::where('id', $report->id)->update($validatedData);

            alert()->success('Edit Laporan Sukses!', 'Data laporan telah diubah.');

            return redirect('/dashboard/reports');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Report $report)
    // {
    //     Report::destroy($report->id);

    //     return redirect('/dashboard/reports');
    // }

    public function makeSlug(Request $request)
    {
        if (Gate::denies('admin')) {
            $slug = SlugService::createSlug(Report::class, 'slug', $request->title);
            return response()->json(['slug' => $slug]);
        }
    }
}
