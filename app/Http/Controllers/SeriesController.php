<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Http\Requests\SeriesFormRequest;
use App\Jobs\DeleteSerieCover;
use App\Models\Serie;
use App\Repositories\SeriesRepositoryInterface;
use Illuminate\Contracts\View\View;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepositoryInterface $reporitory)
    {
    }
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
        $coverPath = $request->hasFile('cover');

        if ($coverPath) {
            $coverPath = $request->file('cover')->store('series_cover', 'public');
        } else {
            $coverPath = null;
        }

        $request->coverPath = $coverPath;

        $serie = $this->reporitory->add($request);

        EventsSeriesCreated::dispatch(
            $serie->name,
            $serie->id,
            $request->qntTemp,
            $request->qntEps,
        );

        $user = auth()->user();
        $user->series()->attach($serie->id);

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->name}' foi adicionada com sucesso");
    }

    public function destroy(Serie $serie)
    {
        if (is_null($serie->cover)) {
            $serie->delete();
        } else {
            $serie->delete();
            DeleteSerieCover::dispatch($serie->cover);
        }

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
        $serie = $this->reporitory->update($serie, $request);

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->name}' foi editada com sucesso");
    }
}
