<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="d-flex justify-content-center" style="background-color: #deeab6e7; color:#025464;">
                    <label>Editando série '{!! $serie->name !!}'</label>
                </h2>
            </div>

            <x-form :action="route('series.update', $serie->id)" 
                :name="$serie->name" 
                :update="true"/>

        </div>
    </div>

</x-app-layout>