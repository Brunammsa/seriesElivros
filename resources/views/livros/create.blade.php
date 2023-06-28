<x-app-layout>
    <div class="container">
        <h2 class="d-flex justify-content-center" style="background-color: #deeab6e7; color:#025464;">Novo livro</h2>
    </div>

    <form action="{{ route('livros.store') }}" method="post">
        @csrf

        <div class="mb-4 col-3" style="margin-left: 20em">
            <label for="name" class="form-label mt-5 mb-4">Nome:</label>
            <input type="text" 
                    autofocus 
                    id="name" 
                    name="name" 
                    class="form-control" 
                    value="{{ old('name') }}">

            <button type="submit" class="mt-4 btn btn-outline-light btn-sm" style="color: #DB005B; border-color: #B70404;">Salvar</button>
            <a role="button" class="mt-4 btn btn-outline-light btn-sm" href="{{ route('dashboard') }}" style="color: #6a8020e7; border-color: #98a766e7; margin-left: 1em">Voltar</a>
        </div>
        
    </form>
</x-app-layout>