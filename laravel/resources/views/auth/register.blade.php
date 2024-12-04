<x-header title="Registro">
    <link rel="stylesheet" href="{{asset('styles/registro.css')}}">

       <div class="registro-dados-pessoais">
            <div class="etapa">
                <h2 class="etapa-1">1</h2>
                <h4 class="etapa-2">2</h4>
            </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Dados do Usuário -->
            <h2>DADOS PESSOAIS</h2>
            <div>
                <!-- Nome -->
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" placeholder="Nome" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <!-- CPF -->
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" placeholder="CPF"
                    />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />

                <!-- E-mail -->
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="E-mail" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Senha -->
            <div class="mt-4">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" placeholder="Senha" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!-- Confirmar Senha -->
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirme a senha" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="avancar">
                    <button class="btn-avancar"type="button">Avançar</button>
            </div>
        </div>

            <!-- Dados do Endereço -->
            <div class="registro-endereco disable">
            <div class="etapa-endereco">
                <button><h4 class="etapa-1-endereco">1</h4></button>
                <h2 class="etapa-2-endereco">2</h2>
            </div>

            <h2>DADOS DE ENDEREÇO</h2>
            <!-- Identificação do Endereço -->
            <div>
            <x-text-input id="nome-endereco" class="block mt-1 w-full" type="text" name="endereco_nome"
                :value="old('nome-endereco')" required autofocus autocomplete="nome-endereco"
                placeholder="Identificação do endereço" />
            <x-input-error :messages="$errors->get('nome-endereco')" class="mt-2" />

            <!-- CEP -->
            <x-text-input id="cep" class="block mt-1 w-full" type="text" name="endereco_cep" placeholder="Cep"
             />
            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
            </div>

            <!-- Logradouro -->
            <div>
            <x-text-input id="logradouro" class="block mt-1 w-full" type="text" readonly name="endereco_logradouro"
                :value="old('logradouro')" required autocomplete="logradouro" placeholder="Logradouro" />
            <x-input-error :messages="$errors->get('logradouro')" class="mt-2" />

            <!-- Número -->

            <x-text-input id="numero" class="block mt-1 w-full" type="text" name="endereco_numero" required
                autocomplete="new-numero" placeholder="Número" />
            <x-input-error :messages="$errors->get('numero')" class="mt-2" />

            <!-- Complemento -->
            <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="endereco_complemento"
                autocomplete="complemento" placeholder="Complemento" />
            <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
            </div>

            <!-- Cidade -->
            <div>
            <x-text-input id="cidade" class="block mt-1 w-full" type="text" readonly name="endereco_cidade" required
                autocomplete="cidade" placeholder="Cidade" />
            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />

            <!-- Estado -->
            <x-text-input id="estado" class="block mt-1 w-full" type="text" readonly name="endereco_estado" required
                autocomplete="estado" placeholder="Estado" maxlength="2" />
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
            </div>


            <!-- Botão Cadastrar -->
            <div class="cadastrar">
                    <button type="submit" class="btn-cadastrar">Cadastrar</button>
                </div>
            </form>
        </div>
        <a class="possui-cadastro" href="{{ route('login') }}">
            {{ __('Já tenho cadastro!') }}
        </a>
        
</x-header>

<script src="{{asset('javascript/registro.js')}}"></script>

<x-footer></x-footer>

