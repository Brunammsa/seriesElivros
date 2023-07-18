<x-app-layout title="Temporadas">
    <div class="container mt-5">
        <ul class="list-group list-group-flush">
            @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex align-items-center">
                <div class="me-auto p-2 bd-highlight">
                    {{ $temporada->numero }}
                </div>
                <span class="badge bg-secundary">
                   {{ $temporada->episodios->count() }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>