<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Endereco;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:USUARIO,USUARIO_CPF',
            'email' => 'required|email|max:255|unique:USUARIO,USUARIO_EMAIL',
            'password' => 'required|string|min:8|confirmed',
            'endereco_nome' => 'required|string|max:255',
            'endereco_cep' => 'required|digits:8',
            'endereco_logradouro' => 'required|string|max:255',
            'endereco_numero' => 'required|string|max:10',
            'endereco_complemento' => 'nullable|string|max:255',
            'endereco_cidade' => 'required|string|max:255',
            'endereco_estado' => 'required|string|max:2',
        ]);

        // Criação do usuário
        $user = User::create([
            'USUARIO_NOME' => $validatedData['name'],
            'USUARIO_CPF' => $validatedData['cpf'],
            'USUARIO_EMAIL' => $validatedData['email'],
            'USUARIO_SENHA' => Hash::make($validatedData['password']),
        ]);

        $user->endereco()->create([
    'ENDERECO_NOME' => $validatedData['endereco_nome'],
    'ENDERECO_CEP' => $validatedData['endereco_cep'],
    'ENDERECO_LOGRADOURO' => $validatedData['endereco_logradouro'],
    'ENDERECO_NUMERO' => $validatedData['endereco_numero'],
    'ENDERECO_COMPLEMENTO' => $validatedData['endereco_complemento'],
    'ENDERECO_CIDADE' => $validatedData['endereco_cidade'],
    'ENDERECO_ESTADO' => $validatedData['endereco_estado'],
]);


        // Redirecionar para a página de login ou dashboard
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }

public function editForm()
{
    // Recupera o endereço associado ao usuário autenticado
    $user = Auth::user();

    // Certifique-se de que o usuário tenha um endereço associado
    $endereco = $user->endereco()->first(); // Altere se o relacionamento for diferente

    // Verifique se o endereço existe antes de passá-lo para a view
    if (!$endereco) {
        return redirect()->route('endereco.create')->with('error', 'Endereço não encontrado.');
    }

    return view('editar-endereco', compact('endereco'));
}



public function update(Request $request)
{
    // Valide os dados do formulário
    $request->validate([
        'endereco_nome' => 'required|string|max:255',
        'endereco_logradouro' => 'required|string|max:255',
        'endereco_numero' => 'required|string|max:255',
        'endereco_complemento' => 'nullable|string|max:255',
        'endereco_cep' => 'required|string|max:10',
        'endereco_cidade' => 'required|string|max:255',
        'endereco_estado' => 'required|string|max:2',
    ]);

    // Encontre o endereço pelo ID passado
    $endereco = Endereco::findOrFail($request->endereco_id);

    // Verifique se o endereço pertence ao usuário autenticado
    if ($endereco->USUARIO_ID !== Auth::id()) {
        return redirect()->route('edit')->with('error', 'Você não tem permissão para atualizar este endereço.');
    }

    // Atualize os dados do endereço
    $endereco->update([
        'ENDERECO_NOME' => $request->endereco_nome,
        'ENDERECO_LOGRADOURO' => $request->endereco_logradouro,
        'ENDERECO_NUMERO' => $request->endereco_numero,
        'ENDERECO_COMPLEMENTO' => $request->endereco_complemento,
        'ENDERECO_CEP' => $request->endereco_cep,
        'ENDERECO_CIDADE' => $request->endereco_cidade,
        'ENDERECO_ESTADO' => $request->endereco_estado,
        'USUARIO_ID' => Auth::id(), // Garantir que o ID do usuário autenticado seja atualizado
    ]);

    // Redireciona de volta com uma mensagem de sucesso
    return redirect()->route('revisa.pedido')->with('success', 'Endereço atualizado com sucesso.');
}


}


