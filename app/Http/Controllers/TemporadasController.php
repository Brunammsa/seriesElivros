<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class TemporadasController extends Controller
{
    public function index(int $series)
    {
        $temporadas = Serie::query()
        ->with('episodios')
        ->where('series_id', $series)
        ->get();

        return view('temporadas.index')->with('temporadas', $temporadas);
    }
}
