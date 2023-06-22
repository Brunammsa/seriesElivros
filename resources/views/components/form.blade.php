<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
    @method('PUT')
    @endif
    
    <div class="mb-4">
        <label for="nome" class="form-label mt-4 mb-4">Nome:</label>
        <input type="text"  
                id="nome" 
                name="nome" 
                class="form-control" 
                @isset($nome) value="{{ $nome }}"@endisset>
    </div>
    
    <button type="submit" class="btn btn-outline-light btn-sm" style="color: #DB005B; border-color: #B70404;">Salvar</button>
    <a role="button" class="btn btn-outline-light btn-sm" href="{{ route('dashboard') }}" style="color: #6a8020e7; border-color: #98a766e7;">Voltar</a>
</form>