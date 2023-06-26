<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <div style="margin-left: 46em; margin-top: 15em">
        <div class="mb-4" style="margin-left: 10em">
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48">
                <path d="M489-120v-60h291v-600H489v-60h291q24 0 42 18t18 42v600q0 24-18 42t-42 18H489Zm-78-185-43-43 102-102H120v-60h348L366-612l43-43 176 176-174 174Z"/>
            </svg>
        </div>

        <div class="mb-3 col-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div class="mb-3 col-8">
                    <x-input-label for="email" :value="__('E-mail')" />
                    <x-text-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-4 col-8  ">
                    <x-input-label for="password" :value="__('Senha')" />
        
                    <x-text-input id="password" class="form-control block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Remember Me -->
                <div class="">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class=" mt-3 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembre-me') }}</span>
                    </label>
                </div>
    
                <div class="d-flex align-items-center mt-4">
                    <div>
                        @if (Route::has('password.request'))
                            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                    </div>

                    <div style="margin: 1em">
                        @if (Route::has('register'))
                            <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('register') }}">
                                {{ __('Registrar-me') }}
                            </a>
                        @endif  
                    </div>

                    <div>
                        <x-primary-button>
                            {{ __('Entrar') }}
                        </x-primary-button>
                    </div>

                </div>

            </form>
        </div>
    </div>
        
    
    
</x-guest-layout>
