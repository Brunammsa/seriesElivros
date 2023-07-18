<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodios;
use App\Models\Serie;
use App\Models\Temporadas;
use Illuminate\Contracts\View\View;

class SeriesController extends Controller
{
    public function index(): View
    {
        $series = Serie::all();
        $successMessage = session('success.message');

        return view('series.index')
            ->with('series', $series)
            ->with('successMessage', $successMessage);
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->only(['name']));
        $temporada = [];

        for ($i = 1; $i <= $request->qntTemp; $i++) {
            $temporada[] = [
                'series_id' => $serie->id,
                'numero' => $i,
            ];
        }
        
        Temporadas::insert($temporada);

        $episodios = [];

        foreach ($serie->temporadas as $temporada) {
            for ($j = 1; $j <= $request->qntEps; $j++) {

                $episodios[] = [
                    'temporadas_id' => $temporada->id,
                    'numero' => $j,
                ];
            }
        };

        Episodios::insert($episodios);

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->name}' foi adicionada com sucesso");
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->name}' foi removida com sucesso");
    }

    public function edit(Serie $serie): view
    {
        return view('series.edit')
            ->with('serie', $serie);
    }

    public function update(Serie $serie, SeriesFormRequest $request)
    {
        $serie->fill($request->all());
        $serie->save();

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->name}' foi editada com sucesso");
    }
}
