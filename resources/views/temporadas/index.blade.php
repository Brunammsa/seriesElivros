<x-app-layout>
    <div class="container d-flex justify-content-between">
        <h2 class="mt-5">Temporadas</h2>
        <h2 class="mt-5">Episódios</h2>
    </div>
    <div class="container mt-5">
        <ul class="list-group list-group-flush">
            @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex align-items-center">
                <div class="me-auto p-2 bd-highlight">
                    {{ $temporada->numero }}
                </div>
                <span class="badge bg-secondary">
                    {{ $temporada->episodios->count() }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>
    
</x-app-layout>