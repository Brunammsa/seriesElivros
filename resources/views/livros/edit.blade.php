<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="container">
                    <h2 class="d-flex justify-content-center" style="background-color: #deeab6e7; color:#025464;">
                        <label>Editando livro '{!! $livro->name !!}'</label>
                    </h2>
                </div>
            </div>

            <x-form :action="route( 'livros.update', $livro->id )" 
                :name="$livro->name" 
                :update="true"/>

        </div>
    </div>

</x-app-layout>