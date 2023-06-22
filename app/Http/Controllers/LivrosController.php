<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivrosFormRequest;
use App\Models\Livro;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index(): View
    {
        $livros = Livro::query()->orderBy('nome')->get();
        $successMessage = session('success.message');

        return view('livros.index')
            ->with('livros', $livros)
            ->with('successMessage', $successMessage);
    }

    public function create(): View
    {
        return view('livros.create');
    }

    public function store(LivrosFormRequest $request)
    {
        $livro = Livro::create($request->only(['nome']));

        return to_route('livros.index')
            ->with('success.message', "O livro '{$livro->nome}' foi adicionado com sucesso");
    }

    public function edit(Livro $livro): View
    {
        return view('livros.edit')
            ->with('livro', $livro);
    }

    public function update(Livro $livro, LivrosFormRequest $request)
    {
        $livro->fill($request->all());
        $livro->save();

        return to_route('livros.index')
            ->with('success.message', "O livro '{$livro->nome}' foi editado com sucesso");
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        
        return to_route('livros.index')
            ->with('success.message', "O livro '{$livro->nome}' foi removido com sucesso");
    }
}
