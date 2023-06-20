<x-app-layout>
    <x-slot name="header">

    </x-slot>    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <a class="btn btn-outline-success me-md-2" href="{{route('livros.create')}}" role="button">Adicionar</a>

                    @isset($successMessage)
                    <div class="alert alert-success mt-3" role="alert">
                        {{ $successMessage}}
                    </div>
                    @endisset
                
                    <form action="/livros" method="get">
                        <ul class="list-group list-group-flush mt-3">
                            @foreach ($livros as $livro)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $livro->nome }}
                                <div class="d-flex align-items-center">
                                    <a href="{{route('livros.edit', $livro->id)}}" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>    
                
                                    <form action="{{route('livros.destroy', $livro->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-close" aria-label="Close"></button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</x-app-layout>