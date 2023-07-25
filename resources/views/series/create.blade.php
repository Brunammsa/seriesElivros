<x-app-layout>
    <div class="container">
        <h2 class="d-flex justify-content-center" style="background-color: #deeab6e7; color:#025464;">Nova série</h2>
    </div>

    <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-4" style="margin-left: 20em">
                <label for="name" class="form-label mt-4 mb-4">Nome:</label>
                <input type="text" 
                        autofocus 
                        id="name" 
                        name="name" 
                        class="form-control" 
                        value="{{ old('name') }}">
            </div>       
            <div class="col-1" >
                <label for="qntTemp" class="form-label mt-4 mb-4">N. Temporada:</label>
                 
                <input type="number" 
                        autofocus 
                        id='qntTemp' 
                        name='qntTemp' 
                        class="form-control" 
                        value="{{ old('qntTemp') }}">
            </div>
            <div class="col-1" >
                <label for="qntEps" class="form-label mt-4 mb-4">Episódio/Temporada</label>
                <input type="number" 
                        autofocus 
                        id='qntEps' 
                        name='qntEps' 
                        class="form-control" 
                        value="{{ old('qntEps') }}">
            </div>
        </div>
        <div class="container">
            <div class="row mb-3 mt-4">
                <div class="col-5">
                    <label for="cover" class="form-label">Capa</label>
                    <input type="file" id="cover" name="cover" class="form-control" accept="image/gif, image/jpeg, image/png">
                </div>
            </div>
        </div>
        <div class="container">
            <button type="submit" class="mt-4 btn btn-outline-light btn-sm" style="color: #DB005B; border-color: #B70404;">Salvar</button>
            <a role="button" class="mt-4 btn btn-outline-light btn-sm" href="{{ route('dashboard') }}" style="color: #6a8020e7; border-color: #98a766e7; margin-left: 1em">Voltar</a>
        </div>
    </form>
</x-app-layout>