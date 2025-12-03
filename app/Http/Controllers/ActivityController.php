<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 5;
        return view('activities', [
            'activities' => Activity::where('user_id', Auth::user()->id)->orWhere('user_id', NULL)->paginate($perpage)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $activity = new Activity($validated);
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect('/main')->withErrors(['success' => 'Activity successfully created!']);
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
        if (!Gate::allows('edit-activity', Activity::all()->where('id', $id)->first())) {
            return redirect()->back()->withErrors(['error' => 'You need to have admin rights!']);
        }
        return view('activities_edit', [
            'activity' => Activity::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $activity= Activity::all()->where('id', $id)->first();
        $activity->name = $validated['name'];
        $activity->description = $validated['description'];
        $activity->save();
        return redirect('/activities')->withErrors(['success' => 'Activity successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('delete-activity', Activity::all()->where('id', $id)->first())) {
            return redirect()->back()->withErrors(['error' => 'You need to have admin rights!']);
        }
        Activity::destroy($id);
        return redirect()->back()->withErrors(['success' => 'Activity successfully deleted!']);
    }
}
