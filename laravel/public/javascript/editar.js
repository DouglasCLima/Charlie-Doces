window.onload = function () {
    let urlBase = "https://viacep.com.br/ws/";
    let codigoPostal = document.querySelector("[name='endereco_cep']");
    let logradouro = document.querySelector("[name='endereco_logradouro']");
    let cidade = document.querySelector("[name='endereco_cidade']");
    let estado = document.querySelector("[name='endereco_estado']");

    // Verifica se os elementos existem antes de adicionar eventos
    if (codigoPostal && logradouro && cidade && estado) {
        codigoPostal.onchange = function () {
            let cep = codigoPostal.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
                fetch(urlBase + cep + "/json/")
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erro ao buscar o CEP');
                        }
                        return response.json();
                    })
                    .then(resultado => {
                        if (resultado.erro) {
                            alert("CEP não encontrado!");
                            logradouro.value = "";
                            cidade.value = "";
                            estado.value = "";
                        } else {
                            logradouro.value = resultado.logradouro || "";
                            cidade.value = resultado.localidade || "";
                            estado.value = resultado.uf || "";
                        }
                    })
                    .catch(error => console.error('Erro:', error));
            } else {
                alert("Formato de CEP inválido. Insira um CEP com 8 dígitos.");
            }
        };
    }
};
