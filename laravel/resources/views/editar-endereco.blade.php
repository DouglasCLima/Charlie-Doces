<x-header title="Registro">
    <link rel="stylesheet" href="{{asset('styles/editar-endereco.css')}}">

    <form method="POST" action="{{ route('edit') }}">
        @csrf
        @method('PUT')



    <a class="possui-cadastro" href="{{ route('revisa.pedido') }}">
        {{ __('Manter entrega no endereço atual') }}
    </a>


        <input type="hidden" name="endereco_id" value="{{ $endereco->ENDERECO_ID }}">

        <div class="registro-endereco">
            <Label>Identificação do Endereço</Label>
            <div>

                <x-text-input id="nome-endereco" class="block mt-1 w-full" type="text" name="endereco_nome"
                    value="{{ $endereco->ENDERECO_NOME ?? old('endereco_nome') }}" required autofocus
                    autocomplete="nome-endereco" placeholder="Identificação do endereço" />
                <x-input-error :messages="$errors->get('endereco_nome')" class="mt-2" />
            </div>

            <!-- CEP -->
            <label for="endereco_cep">Cep</label>
            <div>

                <x-text-input id="cep" class="block mt-1 w-full" type="text" name="endereco_cep"
                    value="{{ $endereco->ENDERECO_CEP ?? old('endereco_cep') }}" required placeholder="CEP" />
                <x-input-error :messages="$errors->get('endereco_cep')" class="mt-2" />
            </div>

            <!-- Outros campos -->
            <label for="endereco_logradouro">Logradouro</label>
            <div>

                <x-text-input id="logradouro" class="block mt-1 w-full" type="text" name="endereco_logradouro" readonly
                    value="{{ $endereco->ENDERECO_LOGRADOURO ?? old('endereco_logradouro') }}"
                    placeholder="Logradouro" />
    </div>
    <label for="endereco_numero">Nº</label>
    <div>

                <x-text-input id="numero" class="block mt-1 w-full" type="text" name="endereco_numero"
                    value="{{ $endereco->ENDERECO_NUMERO ?? old('endereco_numero') }}" placeholder="Número" />
                    </div>
                    <label for="endereco_complemento'">Complemento</label>
<div>

                <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="endereco_complemento"
                    value="{{ $endereco->ENDERECO_COMPLEMENTO ?? old('endereco_complemento') }}"
                    placeholder="Complemento" />
</div>
<label for="endereco_cidade">Cidade</label>
<div>

                <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="endereco_cidade" readonly
                    value="{{ $endereco->ENDERECO_CIDADE ?? old('endereco_cidade') }}" placeholder="Cidade" />
                    </div>
                    <label for="endereco_estado">Estado</label>
<div>

                <x-text-input id="estado" class="block mt-1 w-full" type="text" name="endereco_estado" readonly
                    value="{{ $endereco->ENDERECO_ESTADO ?? old('endereco_estado') }}" placeholder="Estado"
                    maxlength="2" />
</div>
            <!-- Botão -->
            <div class="cadastrar">
                <button type="submit" class="btn-cadastrar">Salvar alterações</button>
            </div>
            </div>
    </form>

</x-header>

<script src="{{asset('javascript/editar.js')}}"></script>

