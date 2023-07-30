<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Repositories\SeriesRepositoryInterface;
use Illuminate\Http\Request;

class ApiSeriesController extends Controller
{
    public function __construct(private SeriesRepositoryInterface $seriesRepository)
    {
    }
    public function index(Request $request)
    {
        $query = Serie::query();
        if ($request->has('name')) {
            $query->where('name', $request->name);
        }

        return $query->paginate(2);
    }

    public function store(SeriesFormRequest $request)
    {
        return response()
            ->json(
                $this->seriesRepository->add($request),
                201
            );
    }

    public function show(int $serie)
    {
        $serie = Serie::with('temporadas.episodios')->find($serie);

        if (is_null($serie)) {
            return response()->json(['série não encontrada'], 404);
        }

        return $serie;
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return response()->json(["série $series->name removida"], 200);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;
    }
}
