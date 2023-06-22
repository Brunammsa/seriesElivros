<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <label class="mb-5">Editando livro '{{ $livro->nome }}'</label>
                <x-form :action="route( 'livros.update', $livro->id )" :nome="$livro->nome" :update="true"/>
            </div>
        </div>
    </div>

</x-app-layout>