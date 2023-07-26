<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiUploadController extends Controller
{
    public function upload(Request $request)
    {
        $path = $request;
        dd($path);
        $hasFile = $request->hasFile('file');

        if ($hasFile) {
            $coverPath = $request->file('file')->store($path, 'public');
        } else {
            $coverPath = null;
        }
        
        return response()->json($coverPath, 200);
    }
}