<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Temporadas;

class TemporadasController extends Controller
{
    public function index(int $id)
    {
        $temporadas = Temporadas::with('episodios')->where('series_id', $id)->get();
        $serie = Serie::where('id', $id)->select('name', 'cover')->first();

        return view('temporadas.index')->with('temporadas', $temporadas)->with('serie', $serie);
    }
}
