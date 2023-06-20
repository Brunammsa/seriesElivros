<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Meus livros</h5>
                <p class="card-text mt-3 mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{route("livros.index")}}" class="card-link">Card link</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Minhas séries</h5>
                <p class="card-text mt-3 mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{route("series.index")}}" class="card-link">Card link</a>
            </div>
        </div>
    </div>
    
</x-app-layout>
