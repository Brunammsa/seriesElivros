<?php

namespace App\Http\Controllers;

use App\Models\Serie;

class TemporadasController extends Controller
{
    public function index(Serie $serie, int $id)
    {
        $temporadas = Serie::find($id)->temporadas;
        // $temporadas = $serie->temporadas()->with('episodios')->get();

        return view('temporadas.index')->with('temporadas', $temporadas)->with('serie', $serie);
    }
}
