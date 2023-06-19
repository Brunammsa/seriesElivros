<x-app-layout>
    <label>Novo livro</label>
    <x-form :action="route('livros.store')" :nome="old('nome')" :update="false" />
</x-app-layout>