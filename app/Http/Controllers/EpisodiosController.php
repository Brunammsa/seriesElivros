<?php

namespace App\Http\Controllers;

use App\Models\Temporadas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::transaction(function() use ($episodioAssistido) {
            DB::table('episodios')->whereIn('id',$episodioAssistido)->update(['watched' => true]);
            DB::table('episodios')->whereNotIn('id',$episodioAssistido)->update(['watched' => false]);

        });

        // $temporada->episodios->each(function (Episodios $episodio) use ($episodioAssistido) {
        //     $episodio->watched = in_array($episodio->id, $episodioAssistido);
        // });

        // $temporada->push();

        return to_route('episodios.index', $temporada->id);
    }
}
