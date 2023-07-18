<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivrosFormRequest;
use App\Models\Livro;
use Illuminate\Contracts\View\View;

class LivrosController extends Controller
{
    public function index(): View
    {
        $livros = Livro::all();
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
        $livro = Livro::create($request->only(['name']));

        return to_route('livros.index')
            ->with('success.message', "O livro '{$livro->name}' foi adicionado com sucesso");
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
            ->with('success.message', "O livro '{$livro->name}' foi atualizado com sucesso");
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        
        return to_route('livros.index')
            ->with('success.message', "O livro '{$livro->name}' foi removido com sucesso");
    }
}
