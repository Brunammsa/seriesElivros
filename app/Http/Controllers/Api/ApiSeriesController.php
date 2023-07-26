<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;

class ApiSeriesController extends Controller
{
    public function index()
    {
        return Serie::all();
    }

    public function store(SeriesFormRequest $request)
    {
        return response()->json(Serie::create($request->all()), 201);
    }
}