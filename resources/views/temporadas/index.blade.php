<x-app-layout>
    <div class="container">
        <div>
            <h1>Temporadas de '{{$serie->name}}'</h1>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{asset('storage/' . $serie->cover )}}" 
                alt="capa da série" 
                class=" img-fluid" 
                style="height: 400px">
        </div>
    </div>
    <div class="container d-flex justify-content-between">
        <h3 class="mt-5">Temporadas</h3>
        <h3 class="mt-5">Episódios</h3>
    </div>
    <div class="container mt-5">
        <ul class="list-group list-group-flush">
            @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex align-items-center">
                <div class="me-auto p-2 bd-highlight">
                    <a href="{{route('episodios.index', $temporada->id)}}">
                        {{ $temporada->numero }}
                    </a>
                </div>
                <span class="badge bg-secondary">
                    {{ $temporada->numeroAssistidos()}}/{{ $temporada->episodios->count() }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>