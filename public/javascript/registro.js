const registroDadosPessoais = document.querySelector('.registro-dados-pessoais');
const registroEndereco = document.querySelector('.registro-endereco');

const botaoAvancar = document.querySelector('.btn-avancar');

botaoAvancar.addEventListener('click', ()=> {
    registroEndereco.classList.remove('disable')
    registroDadosPessoais.classList.add('disable')
    return
});




