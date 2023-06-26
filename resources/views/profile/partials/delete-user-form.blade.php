<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Deletar conta') }}
        </h2>
    </header>

    <form action="{{route("profile.destroy")}}" method="POST">
        @csrf
        @method('DELETE')
        <x-danger-button>{{ __('Deletar conta') }}</x-danger-button>
    </form>


    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Tem certeza de que deseja excluir sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Digite sua senha para confirmar que deseja excluir permanentemente sua conta.') }}
            </p>

            <div class="col-6 mt-6">
                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control mt-2 block w-3/4"
                    placeholder="{{ __('Senha') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">

                <a href="{{route("dashboard")}}">
                    <x-secondary-button>
                        {{ __('Cancelar') }}
                    </x-secondary-button>
                </a>

                <form action="{{route("profile.destroy")}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <x-danger-button class="ml-3">
                        {{ __('Deletar conta') }}
                    </x-danger-button>
                </form>
            
            </div>

        </form>
    </x-modal>
</section>
