<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create', [
            'author' => 'Dzaky Syahrizal',
            'title' => 'Form Report Anonymous'
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

        $validatedData['user_id'] = User::find(6)->id;

        Report::create($validatedData);

        alert()->success('Buat Laporan Sukses!', 'Data laporan telah dikirim.');

        return redirect('/lapor/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function makeSlug1(Request $request)
    {
        $slug = SlugService::createSlug(Report::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
