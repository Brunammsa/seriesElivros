<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiUploadController extends Controller
{
    public function upload(Request $request)
    {
        $hasFile = $request->hasFile('file');

        if ($hasFile) {
            $coverPath = $request->file('file')->store('series_cover', 'public');
        } else {
            $coverPath = null;
        }
        
        return response()->json($coverPath, 200);
    }
}