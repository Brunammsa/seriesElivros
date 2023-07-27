<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episodios;
use App\Models\Serie;
use Illuminate\Http\Request;

class ApiEpisodiosController extends Controller
{
    public function show(Serie $serie)
    {
        return $serie->episodios;
    }

    public function update(Episodios $episodio, Request $request)
    {
        $episodio->watched = $request->watched;
        $episodio->save();

        return $episodio;
    }
}