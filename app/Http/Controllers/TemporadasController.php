<?php

namespace App\Http\Controllers;

use App\Models\Temporadas;

class TemporadasController extends Controller
{
    public function index(int $id)
    {
        $temporadas = Temporadas::with('episodios')->where('series_id', $id)->get();

        return view('temporadas.index')->with('temporadas', $temporadas);
    }
}
