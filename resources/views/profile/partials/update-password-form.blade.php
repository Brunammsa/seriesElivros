<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Atualização de senha') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para se manter segura.') }}
        </p>
    </header>

    <div class="mb-3 col-6">
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
    
            <div class="mb-3 col-2>
                <x-input-label for="current_password" :value="__('Senha atual')" />
                <x-text-input id="current_password" name="current_password" type="password" class="form-control mt-3 block w-full" autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
    
            <div class="mb-3 col-2>
                <x-input-label for="password" :value="__('Nova senha')" />
                <x-text-input id="password" name="password" type="password" class="form-control mt-3 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
    
            <div class="mb-3 col-2>
                <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class=" form-control mt-3 block w-full" autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Salvar') }}</x-primary-button>
    
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400 mt-2"
                    >{{ __('Salvo!') }}</p>
                @endif
            </div>
        </form>
    </div>

</section>
