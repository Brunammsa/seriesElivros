<x-app-layout>
    <label>Editando livro '{{ $livro->nome }}'</label>
    <x-form :action="route( 'livros.update', $livro->id )" :nome="$livro->nome" :update="true"/>
</x-app-layout>