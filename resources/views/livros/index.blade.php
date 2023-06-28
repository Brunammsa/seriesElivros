<x-app-layout>
    
    <div class="container">
        <h2 class="d-flex justify-content-center" style="background-color: #deeab6e7; color:#025464;">{{__('messages.app_name_livros')}}</h2>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="d-flex align-items-center">
                <div class="col-5">
                    <a class="btn btn-outline-light me-md-2" href="{{route('livros.create')}}" role="button" style="color: #DB005B; border-color: #B70404;">Adicionar</a>
                </div>
    
                <div class="col-7 d-flex justify-content-end mt-2">
                    <h6>Assistido - Atualizar - Excluir</h6>
                </div>
            </div>


            <div class="col-12">

                @isset($successMessage)
                <div class="alert alert-success mt-3" role="alert">
                    {{ $successMessage}}
                </div>
                @endisset

                <form action="/livros" method="get">
                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($livros as $livro)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $livro->name }}
                            <div class="d-flex align-items-center" style="gap: 45px">
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel">

                                <a href="{{route('livros.edit', $livro->id)}}" class="btn btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </a>    
            
                                <form action="{{route('livros.destroy', $livro->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-close" aria-label="Close"></button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>