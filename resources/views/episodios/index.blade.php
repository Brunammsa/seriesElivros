<x-app-layout>
    <div class="container d-flex justify-content-between">
        <h2 class="mt-5">Episódios</h2>
    </div>
    <form action="" method="post">
        @csrf
        <div class="container mt-5">
            <ul class="list-group list-group-flush">
                @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="me-auto p-2 bd-highlight">
                        Episódio {{ $episodio->numero }}
                    </div>
                    <input type="checkbox" class="checkbox" 
                        name="episodio[]" 
                        value="{{$episodio->id}}"
                        @if ($episodio->watched)
                            checked
                        @endif>
                </li>
                @endforeach
            </ul>
            <button class="btn btn-sm btn-outline-success mt-3" >Salvar</button>
        </div>
    </form>
</x-app-layout>