<x-guest-layout>
    <div style="margin-top: 13em; margin-left: 42em;">
        <div class="col-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <!-- Name -->
                <div class="px-5 col-10">
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4 px-5 col-10">
                    <x-input-label for="email" :value="__('E-mail')" />
                    <x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="px-5 col-10 mt-4">
                    <x-input-label for="password" :value="__('Senha')" />
        
                    <x-text-input id="password" class="form-control block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="px-5 col-10 mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />
        
                    <x-text-input id="password_confirmation" class="form-control block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="px-5 col-10 d-flex align-items-center justify-end justify-content-around mt-4">
                    <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('login') }}">
                        {{ __('Já possui registro?') }}
                    </a>
                    
                    <a href="{{route("/")}}">
                        <x-primary-button class="ml-4" >
                            {{ __('Registrar') }}
                        </x-primary-button>
                    </a>

                </div>
            </form>
        </div>
        
    </div>

</x-guest-layout>
