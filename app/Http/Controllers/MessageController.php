<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->get();

        if (Gate::allows('admin')) {
            return view('dashboard.messages.index', [
                'title' => 'Daftar Pemberitahuan',
                'author' => 'Dzaky Syahrizal',
                'messages' => $messages,
                'jmlPemberitahuan' => $messages->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.messages.index', [
            'title' => 'Daftar Pemberitahuan',
            'author' => 'Dzaky Syahrizal',
            'messages' => $messages->where('user_id', auth()->user()->id),
            'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $messages = Message::get();

        if (Gate::allows('admin')) {
            return view('dashboard.messages.create', [
                'title' => 'Buat Pemberitahuan',
                'author' => 'Dzaky Syahrizal',
                'users' => User::all()->whereNotIn('id', 6)->whereNotIn('IsAdmin', true),
                'jmlPemberitahuan' => $messages->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.404', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Not Found",
            'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
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
        if (Gate::allows('admin')) {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'title' => 'required|max:255',
                'slug' => 'required|unique:messages',
                'body' => 'required|min:25',
            ]);

            Message::create($validatedData);

            alert()->success('Buat Pemberitahuan Sukses!', 'Data Pemberitahuan telah dikirim.');

            return redirect('/dashboard/messages');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $messages = Message::get();

        if (Gate::denies('view-message', $message)) {
            if (Gate::allows('admin')) {
                return view('dashboard.messages.show', [
                    'author' => 'Dzaky Syahrizal',
                    "title" => "Detail Pemberitahuan",
                    "message" => $message,
                    'jmlPemberitahuan' => $messages->where('status', 'belum dibaca')->count()
                ]);
            }
            return view('dashboard.404', [
                'author' => 'Dzaky Syahrizal',
                "title" => "Not Found",
                'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
            ]);
        }

        $message['status'] = 'dibaca';
        $message->save();

        return view('dashboard.messages.show', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Detail Pemberitahuan",
            "message" => $message,
            'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $messages = Message::get();

        if (Gate::allows('admin')) {
            return view('dashboard.messages.edit', [
                'author' => 'Dzaky Syahrizal',
                "title" => "Report",
                'users' => User::all()->whereNotIn('id', 6)->whereNotIn('IsAdmin', true),
                "message" => $message,
                'jmlPemberitahuan' => $messages->where('status', 'belum dibaca')->count()
            ]);
        }

        return view('dashboard.404', [
            'author' => 'Dzaky Syahrizal',
            "title" => "Not Found",
            'jmlPemberitahuan' => $messages->where('user_id', auth()->user()->id)->where('status', 'belum dibaca')->count()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        if (Gate::allows('admin')) {
            $rules = [
                'user_id' => 'required',
                'title' => 'required|max:255',
                'body' => 'required|min:25',
            ];

            if ($request->slug != $message->slug) {
                $rules['slug'] = 'require|unique:messages';
            }

            $validatedData = $request->validate($rules);

            Message::where('id', $message->id)->update($validatedData);

            alert()->success('Edit Pemberitahuan Sukses!', 'Data pemberitahuan telah diubah.');

            return redirect('/dashboard/messages');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function makeSlug2(Request $request)
    {
        if (Gate::allows('admin')) {
            $slug = SlugService::createSlug(Message::class, 'slug', $request->title);
            return response()->json(['slug' => $slug]);
        }
    }
}
