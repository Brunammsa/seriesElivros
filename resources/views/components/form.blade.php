<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
    @method('PUT')
    @endif
    
    <div class="mb-4 col-5">
        <label for="name" class="form-label mt-4 mb-4">Novo nome:</label>
        <input type="text"
                autofocus  
                id="name" 
                name="name" 
                class="form-control col-5" 
                @isset($name) value="{{ $name }}"@endisset>
    </div>
    
    <button type="submit" class="btn btn-outline-light btn-sm" style="color: #DB005B; border-color: #B70404;">Salvar</button>
    <a role="button" class="btn btn-outline-light btn-sm" href="{{ route('dashboard') }}" style="color: #6a8020e7; border-color: #98a766e7; margin-left: 1em">Voltar</a>
</form>