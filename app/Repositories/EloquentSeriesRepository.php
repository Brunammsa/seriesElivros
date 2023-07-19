<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episodios;
use App\Models\Serie;
use App\Models\Temporadas;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepositoryInterface
{
    public function add(SeriesFormRequest $request): Serie
    {
        return DB::transaction(function () use ($request) {
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

            return $serie;
        });
    }

    public function update(Serie $serie, SeriesFormRequest $request): Serie
    {
        $serie = DB::transaction(function () use ($serie, $request) {
            $serie->fill($request->all());
            $serie->save();

            $serie->temporadas()->delete();

            $temporadas = [];

            for ($i = 1; $i <= $request->qntTemp; $i++) {
                $temporadas[] = [
                    'series_id' => $serie->id,
                    'numero' => $i,
                ];
            }

            Temporadas::insert($temporadas);
            $serie->refresh();

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

            return $serie;
        });

        return $serie;
    }
}
