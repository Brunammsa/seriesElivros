<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <label>Novo livro</label>
                <x-form :action="route('livros.store')" :nome="old('nome')" :update="false" />
            </div>
        </div>
    </div>

</x-app-layout>