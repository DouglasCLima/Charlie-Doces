<x-header title="Login">
    <link rel="stylesheet" href="{{asset('styles/login.css')}}">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login">

    <img class="imagem-login" src="{{asset('images/brigadeirao.png')}}" alt="logo brigadeirão" width="200px">

    <div class="campos-login">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <img src="{{asset('images/Charlie_logo_ofc.png')}}" alt="">

        <!-- Email Address -->
        <div>
            <label for="email"></label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="E-mail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password"></label>
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Senha"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar de mim') }}</span>
            </label>
        </div>

        <div class="remember">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Esqueci minha senha') }}
                </a>
            @endif

            <x-primary-button class="btn-enviar">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
    <a class="registre-se" href="{{route('register')}}">Não tem login? Cadastre-se clicando aqui</a>
    </div>
</x-header>
</div>
<x-footer></x-footer>
