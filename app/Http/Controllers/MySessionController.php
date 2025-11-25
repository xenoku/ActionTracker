<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MySession;
use App\Models\User;
use App\Models\Activity;

class MySessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('sessions', [
            'sessions' => MySession::paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('session_create', [
            'users' => User::all(),
            'activities' => Activity::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'activity_id' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        $session= new MySession($validated);
        $session->save();
        return redirect('/sessions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('session_edit', [
            'session' => MySession::all()->where('id', $id)->first(),
            'users' => User::all(),
            'activities' => Activity::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'activity_id' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        $session= MySession::all()->where('id', $id)->first();
        $session->user_id = $validated['user_id'];
        $session->activity_id = $validated['activity_id'];
        $session->start_time = $validated['start_time'];
        $session->end_time = $validated['end_time'];
        $session->save();
        return redirect('/sessions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MySession::destroy($id);
        return redirect('/sessions');
    }
}
