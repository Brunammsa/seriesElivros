<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(): View
    {
        $series = Serie::query()->orderBy('nome')->get();
        $successMessage = session('success.message');

        return view('series.index')
            ->with('series', $series)
            ->with('successMessage', $successMessage);
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->only(['nome']));

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->nome}' foi adicionada com sucesso");
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->nome}' foi removida com sucesso");
    }

    public function edit(Serie $serie): view
    {
        return view('series.edit')
            ->with('serie', $serie);
    }

    public function update(Serie $serie, Request $request)
    {
        $serie->fill($request->all());
        $serie->save();

        return to_route('series.index')
            ->with('success.message', "A série '{$serie->nome}' foi editada com sucesso");
    }
}
