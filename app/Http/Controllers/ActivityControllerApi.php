<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Exception;

class ActivityControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Activity::where('user_id', Auth::user()->id)->orWhere('user_id', NULL)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:activities',
            'description' => 'required',
            'image' => 'required|file'
        ]);
        $file = $request->file('image');
        $fileName = uniqid().'_'.$file->getClientOriginalName();
        try {
            $path = Storage::disk('s3')->putFileAs('activityImages', $file, $fileName);
            if (!$path) {
                return response()->json([
                    'code' => 2,
                    'message' => 'Failed to upload file to S3',
                    'filename' => $fileName
                ], 500);
            }
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch (Exception $e) {
            return response()->json([
                'filename' => $fileName,
                'error' => $e->getMessage(),
                'code' => 2,
                'message' => 'Error in s3 file loading',
            ]);
        };
        $activity = new Activity([
            'name' => $validated['name'],
            'user_id' => Auth::user()->id,
            'description' => $validated['description'],
            'image_url' => $fileUrl
        ]);
        $activity->save();
        return response()->json([
            'code' => 0,
            'message' => 'Activity added!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return response(Activity::find($request->id));
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
