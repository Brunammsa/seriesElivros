<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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
        $serie = $this->reporitory->add($request);

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
        $serie = $this->reporitory->update($serie, $request);

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->name}' foi editada com sucesso");
    }
}
