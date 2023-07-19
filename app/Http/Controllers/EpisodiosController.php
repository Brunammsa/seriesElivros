<?php

namespace App\Http\Controllers;

use App\Models\Episodios;
use App\Models\Temporadas;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(int $id)
    {
        $temporadas = Temporadas::with('episodios')->find($id);

        return view('episodios.index', [
            'episodios' => $temporadas->episodios
        ]);
    }

    public function update(Request $request, Temporadas $temporada)
    {
        $episodioAssistido = $request->episodio;

        $temporada->episodios->each(function (Episodios $episodio) use ($episodioAssistido) {
            $episodio->watched = in_array($episodio->id, $episodioAssistido);
        });

        $temporada->push();

        return to_route('episodios.index', $temporada->id);
    }
}
