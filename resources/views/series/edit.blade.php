<x-app-layout>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <label class="mb-5">Editando série '{{ $serie->nome }}'</label>
                <x-form :action="route('series.update', $serie->id)" :nome="$serie->nome" :update="true"/>
            </div>
        </div>
    </div>

</x-app-layout>