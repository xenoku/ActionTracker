<?php

namespace App\Http\Controllers;

use App\Models\MySession;
use Illuminate\Http\Request;

class MySessionControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(MySession::limit($request->perpage ?? 5)->offset(($request->perpage ?? 5) * ($request->page ?? 0))->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response (MySession::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
